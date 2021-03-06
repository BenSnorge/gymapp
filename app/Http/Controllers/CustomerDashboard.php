<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $plans = Plan::all();
        $user = Auth::user();
        return view('user-dashboard/welcome', compact('plans', 'user'));
    }
}
