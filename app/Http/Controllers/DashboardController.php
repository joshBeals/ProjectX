<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        try {
            $user = Auth::user();
            return view('dashboard', ['user' => $user]);
        } catch (\Throwable $e) {
            return view('error');
        }
    }

    public function file_manager(){
        try {
            $user = Auth::user();
            return view('fileManager', ['user' => $user]);
        } catch (\Throwable $e) {
            return view('error');
        }
    }
}
