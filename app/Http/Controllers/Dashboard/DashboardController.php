<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index() 
    {
        session()->flash('flash.banner', 'Admin: Go back to ');
        return Inertia::render('AdminDashboard/Dashboard');
    }
}
