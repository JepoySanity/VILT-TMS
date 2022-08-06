<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthRedirectAuthenticatedUsers extends Controller
{
    public function redirect_user(){
        switch (auth()->user()->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
                break;
            case 'user':
                return redirect()->route('user.dashboard');
                break;
            case 'agent':
                return redirect()->route('agent.dashboard');
                break;
            default:
                return auth()->logout();
                break;
        }
    }
}
