<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function error($code = '500')
    {
       $view_path = 'admin.error.'.$code;

        if (view()->exists($view_path)) {
            return view($view_path);
        }

        return view('admin.error.500');
    }
    
}