<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class UserPagesController extends Controller
{
    public function index(){
        return Inertia::render('User/Dashboard');
    }
}
