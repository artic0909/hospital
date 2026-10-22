<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the partner portal dashboard.
     */
    public function index(Request $request): View
    {
        $partner = Auth::guard('partner')->user();

        return view('partner.dashboard.index', compact('partner'));
    }
}
