<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class ExcelController extends Controller
{

    public function uploadFile(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'nullable',
                'file' => 'required|mimes:xlsx,xls',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $path = $request->file('file')->store('uploads');

        $import = new ExcelImport;
        Excel::import($import, $path);

        echo(json_encode(session('excel_data', [])));
    }
}
