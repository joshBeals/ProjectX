<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Models\Reports;

class ExcelController extends Controller
{

    public function uploadFile(Request $request)
    {
        $user = Auth::user();
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'nullable',
                'file' => 'required|mimes:csv,xlsx,xls,txt',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        // Upload file to Cloudinary
        $uploadedFileUrl = Cloudinary::uploadFile($request['file']->getRealPath(), ["folder" => "xanbra"])->getSecurePath();

        // Validate the headers
        $path = $request->file('file')->store('uploads'); // Temporary local storage to validate headers
        $import = new ExcelImport;
        try {
            Excel::import($import, $path);
        } catch (\Exception $e) {
            // Delete the uploaded file if headers are incorrect
            \Storage::delete($path);
            return redirect()->back()->withErrors(['file' => 'The file headers do not match the expected format.'])->withInput();
        }

        $report = Reports::where('user_id', $user->id)->where('title', $request->input('title'))->count();

        if($report > 0){
            return redirect()->back()->with('error', 'Title already in use!');
        }

        // Save file information to the database
        Reports::create([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'file' => $uploadedFileUrl,
        ]);

        return redirect()->back()->with('success', 'Report Generated Successfully!');
    }

    public function showReport($id)
    {
        try {
            $uploadedFile = Reports::findOrFail($id);
    
            // Download the file from Cloudinary
            $fileContent = file_get_contents($uploadedFile->file_path);
            $tempFilePath = tempnam(sys_get_temp_dir(), 'excel');
            file_put_contents($tempFilePath, $fileContent);
    
            // Process the file again if needed to generate the report
            $import = new ExcelImport;
            Excel::import($import, $tempFilePath);
    
            $data = session('excel_data', []);
            return view('report', compact('data'));
        } catch (\Exception $e) {
            return view('error');
        }
    }
}
