<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user());
            if (Auth::user()->hasRole('superadministrator')) {
                return view('dashboard');
            } elseif(Auth::user()->hasRole('administrator')) {

                return view('downloads');
                
            }
        }
    }
}
