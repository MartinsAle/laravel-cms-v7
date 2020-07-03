<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Index Function
     *
     * @return view
     */
    public function index()
    {
        return view('admin.index');
    }
}
