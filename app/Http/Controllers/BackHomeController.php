<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackHomeController extends Controller
{
    public function __invoke()
    {
        return view("back.home");
    }
}
