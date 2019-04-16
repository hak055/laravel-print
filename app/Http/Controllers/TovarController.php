<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mark;
use App\Tovar;
use App\PhoneModel;
use App\User;


class TovarController extends Controller
{
    public function index()
    {
    	$marks = Mark::get();
    	$tovars = Tovar::get();

    	return view('tovar', compact('tovars', 'marks'));
    }
}
