<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Printt;
use App\Collection;

class CollectionController extends Controller
{
/*
* вывод всех моделей телефона
*/
    public function index()
    {
        $сollections = Printt::get();
        return view('admin.сollection.index', compact('сollections'));
    }
/*
* 
*/
    public function create()
    {
        $сollection = new Printt();
        
        if(request('collection')) {
            $сollection->collection()->associate(request('collection'));           
        };

        return $this->edit($сollection);
    }
/*
* 
*/
    public function store()
    {
        $сollection = new Printt();

        return $this->update($сollection);
    }
/*
* 
*/
    public function show(Printt $сollection)
    {
        return view('admin.сollection.show', compact('сollection'));
    }

    public function edit(Printt $сollection)
    {
        $collections = Collection::get();
       
        return view('admin.сollection.edit', compact('print', 'collections'));
    }
/*
* добавление редоктирование
*/
    public function update(Printt $сollection)
    {
        
        $сollection->fill($this->validateWith([
            
            'name' => 'required',
            'collection_id' => ['nullable', Rule::exists('print', 'id')]
            
        ]))->save();

        return redirect()->route('сollection.show', $сollection);
    }
/*
* удаление
*/
    public function destroy(Printt $сollection)
    {
        $сollection->delete();

        return redirect()->route('сollection.index');
    }
}

