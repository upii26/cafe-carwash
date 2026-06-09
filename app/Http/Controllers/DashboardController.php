<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function cafe()
    {
        return view('dashboard-cafe');
    }

    public function carwash()
    {
        return view('dashboard-carwash');
    }
}
