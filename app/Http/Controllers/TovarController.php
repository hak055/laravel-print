<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tovar;
use App\Mark;
use App\Printt;
use App\PhoneModel;
use App\User;


class TovarController extends Controller
{
    public function index()
    {
    	$marks = Mark::get();
    	$tovars = Tovar::get();

    	return view('tovars.tovar', compact('tovars', 'marks'));
    }

    public function create()
    {
    	$tovar = new Tovar();

    	return $this->edit($tovar);
    }

    public function store()
    {
    	$tovar = new Tovar();

    	return $this->update($tovar);
    }

    public function show(Tovar $tovar)
    {
    	return view('tovars.tovar', compact('tovar'));
    }

    public function edit(Tovar $tovar)
    {
    	$printts = Printt::get();
    	$phoneModels = PhoneModel::get();

    	return view('tovars.edit', compact('printts', 'phoneModels', 'tovar'));
    }

    public function update(Tovar $tovar)
    {
    	$tovar->fill($this->validateWith([
            'name' => 'required',
            'status' => 'required|boolean',
            'print_id' => 'required',
            'phone_model_id' => 'required'
            
        ]))->save();

        return redirect()->route('show', $tovar); 
    }
}
