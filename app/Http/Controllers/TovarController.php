<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mark;
use App\Tovar;
use App\PhoneModel;
// use App\Print;


class TovarController extends Controller
{
    public function index()
    {
    	$tovars = Tovar::get();

    	return view('tovar', compact('tovars'));
    }
}
