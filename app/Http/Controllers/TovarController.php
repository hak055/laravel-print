<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
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
    	$tovars = Tovar::when(request('status'), function (Builder $builder, $status) {
                        return $builder->where('status', '=', $status ?? 0);
                        
            })->get();

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
    	return view('tovars.show', compact('tovar'));
    }

    public function edit(Tovar $tovar)
    {
    	$printts = Printt::get();
    	$phoneModels = PhoneModel::get();

    	return view('tovars.edit', compact('printts', 'phoneModels', 'tovar'));
    }

    public function update(Tovar $tovar)
    {
    	// echo '<pre>';
    	// dd($tovar);
    	// echo '</pre>';
    	$tovar->fill($this->validateWith([
            'name' => 'required',
            'status' => 'required',
            'print_id' => 'required|exists:prints,id',
            'phone_model_id' => 'required|exists:phone_models,id'
            
        ]))->save();

        return redirect()->route('tovar.show', $tovar); 
    }

    public function destroy(Tovar $tovar)
    {
        $tovar->delete();

        return redirect()->route('mark.index');
    } 
}
