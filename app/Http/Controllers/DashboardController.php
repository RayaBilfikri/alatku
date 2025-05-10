<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    Public function index()
    {
        $user = Auth::user();

        if ($user->role === 'superadmin') {
            return view('/dashboard');
        }

        return redirect('/');
    }
}
