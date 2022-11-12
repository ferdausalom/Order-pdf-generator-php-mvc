<?php

namespace App\Controllers;

class DashboardController
{
    // Show admin page 
    public function index()
    {
        return view('adminIndex');
    }

    // Show 404 page if route is not found 
    public function notFound()
    {
        return view('404');
    }
}
