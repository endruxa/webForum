<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Thread;

class CountThreadController extends Controller
{
    public function countThread()
    {
        $countthreads = Thread::count();

        return view('layouts.front', compact('countthreads'));
    }
}
