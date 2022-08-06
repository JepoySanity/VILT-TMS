<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class AgentPagesController extends Controller
{
    public function index(){
        return Inertia::render('Agent/Dashboard',[
            'auth' =>auth()->user()
        ]);
    }
}
