<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Printt;
use App\Collection;

class PrintController extends Controller
{
/*
* вывод всех моделей телефона
*/
    public function index()
    {
    	$prints = Printt::get();
    	return view('admin.print.index', compact('prints'));
    }
/*
* 
*/
    public function create()
    {
        $print = new Printt();
        
        if(request('collection')) {
            $print->collection()->associate(request('collection'));           
        };

        return $this->edit($print);
    }
/*
* 
*/
    public function store()
    {
        $print = new Printt();

        return $this->update($print);
    }
/*
* 
*/
    public function show(Printt $print)
    {
        return view('admin.print.show', compact('print'));
    }

    public function edit(Printt $print)
    {
    	$collections = Collection::get();
       
        return view('admin.print.edit', compact('print', 'collections'));
    }
/*
* добавление редоктирование
*/
    public function update(Printt $print)
    {
        
        $print->fill($this->validateWith([
            
            'name' => 'required',
            'collection_id' => ['nullable', Rule::exists('collection', 'id')]
            
        ]))->save();

        return redirect()->route('print.show', $print);
    }
/*
* удаление
*/
    public function destroy(Printt $print)
    {
        $print->delete();

        return redirect()->route('print.index');
    }
}
