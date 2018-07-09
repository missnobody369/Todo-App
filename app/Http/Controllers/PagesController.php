<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function new() {

        // echo "some echo data"; 

        return view('new');
    }
}

// todos (table) - Todo (model)

