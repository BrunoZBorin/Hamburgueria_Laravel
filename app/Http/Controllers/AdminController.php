<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function init()
    {
        return view('admin.initial_page');
    }
}
