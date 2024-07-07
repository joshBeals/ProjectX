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
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $path = $request->file('file')->store('uploads');

        $import = new ExcelImport;
        Excel::import($import, $path);

        echo(json_encode(session('excel_data', [])));
    }
}
