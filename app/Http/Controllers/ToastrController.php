<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToastrController extends Controller
{
    public function toastr(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        session()->flash('success', 'This is a success message!');
        session()->flash('info', 'This is an info message!');
        session()->flash('warning', 'This is a warning message!');
        session()->flash('error', 'This is an error message!');

        return view('toastr');
    }
}
