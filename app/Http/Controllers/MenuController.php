<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view("menus.index");
    }

    public function viewadd()
    {
        return view("menus.add-menu");
    }
}
