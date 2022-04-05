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

    public function showRequestDetails(Request $request) {
        print_r($request->all());

        $responseStr = "";
        $responseStr .= "IP:: ".$request->ip()."<br/>";
        $responseStr .= "Method:: ".$request->method()."<br/>";
        $responseStr .= "Path:: ".$request->path()."<br/>";
        $responseStr .= "URL:: ".$request->url()."<br/>";
        $responseStr .= "Full URL:: ".$request->fullUrl()."<br/>";
        $responseStr .= "Accepts:: "."[".implode(", ",$request->getAcceptableContentTypes())."]"."<br/>";
        return $responseStr;
    }

    public function showQueryParams(Request $request) {
        return json_encode($request->query());
    }

    public function showFullName(Request $request) {
        $name = "Full Name:: ";

        $name .= $request->query('firstName') . " ";
        $name .= $request->query("lastName");

        return $name;
    }
}
