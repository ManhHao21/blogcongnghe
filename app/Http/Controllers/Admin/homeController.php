<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        return view('layouts.backend');
    }
}
