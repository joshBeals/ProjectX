<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reports;

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
            $reports = Reports::where('user_id', $user->id)->get();
            return view('fileManager', ['user' => $user, 'reports' => $reports]);
        } catch (\Throwable $e) {
            return view('error');
        }
    }
}
