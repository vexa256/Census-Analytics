<?php

namespace App\Http\Controllers;

class MainController extends Controller
{

    public function AdminDashboard()
    {
        $data = [

            "Page" => "Dashboard.Dashboard",
            "Title" => "Welcome To the Census Analytics System",
            "Desc" => "Designed by Bwambale Jesse",
        ];

        return view('scrn', $data);
    }

}