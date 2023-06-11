<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(AdminLoginRequest $request)
    {
        if ($request->login === "admin" && $request->password === "admin11") {
            session()->flash('success');
            return back();
        }

        session()->flash('error', true);
        return back();
    }
}
