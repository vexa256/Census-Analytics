<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormEngine;
use DB;
use Illuminate\Http\Request;

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

    public function MgtUserRoles(Type $var = null)
    {
        $Users = DB::table('users')
            ->where('role', 'admin')
            ->get();

        $rem = [

            "id",
            "created_at",
            "updated_at",
            "EmpID",
            "uuid",
            "Title",
            "remember_token",
            "email_verified_at",
            "role",

        ];
        $FormEngine = new FormEngine;

        $data = [

            "Page" => "users.MgtAdmins",
            "Title" => "Manage All Authorized Admin Accounts",
            "Desc" => "Admin Settings",
            "Users" => $Users,
            "rem" => $rem,
            "Form" => $FormEngine->Form('users'),
            // "Units" => $Units,

        ];

        return view('scrn', $data);
    }

    public function ManageAgents(Type $var = null)
    {
        $Users = DB::table('users')
            ->where('role', 'agent')
            ->get();

        $rem = [

            "id",
            "created_at",
            "updated_at",
            "EmpID",
            "uuid",
            "Title",
            "remember_token",
            "email_verified_at",
            "role",

        ];
        $FormEngine = new FormEngine;

        $data = [

            "Page" => "users.MgtFieldAgents",
            "Title" => "Manage All Authorized Filed Agent Accounts",
            "Desc" => "Agent Account Settings",
            "Users" => $Users,
            "rem" => $rem,
            "Form" => $FormEngine->Form('users'),
            // "Units" => $Units,

        ];

        return view('scrn', $data);
    }
    public function UpdateAccount(Request $request)
    {
        $validated = $request->validate([
            '*' => 'required',
            'files' => 'nullable',
            'password' => 'confirmed',
        ]);

        \DB::table('users')->where('id', '=', $request->id)->update([

            "name" => $request->name,
            "email" => $request->email,
            "password" => \Hash::make($request->password),

        ]);

        return redirect()->route('AdminDashboard')->with('status', 'Account information updated successfully');
    }

}