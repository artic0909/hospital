<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the admin central dashboard.
     */
    public function index(Request $request): View
    {
        $admin = Auth::guard('admin')->user() ?? Auth::user();

        return view('admin.dashboard.index', compact('admin'));
    }
}
