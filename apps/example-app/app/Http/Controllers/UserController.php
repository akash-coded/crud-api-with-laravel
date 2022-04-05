<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('greeting', ['name' => 'Akash']);
    }

    public function greetUser(Request $request, $name) {
        return view('greeting', ['name' => $name]);
    }
}
