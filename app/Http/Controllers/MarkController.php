<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mark;
use App\PhoneModel;

class MarkController extends Controller
{
/*
* вывод всех моделей телефона
*/
    public function index()
    {
    	$marks = Mark::get();
    	return view('admin.marka.index', compact('marks'));
    }
/*
* вывод всех моделей
*/
    public function create()
    {
        $mark = new Mark();
        // $mark->PhoneModel()->associate(request('PhoneModel'));

        return $this->edit($mark);
    }

    public function store()
    {
        $mark = new Mark();

        return $this->update($mark);
    }

    public function show(Mark $mark)
    {
        return view('admin.marka.show', compact('mark'));
    }

    public function edit(Mark $mark)
    {
       
        return view('admin.marka.edit', compact('mark'));
    }
/*
* добавление редоктирование
*/
    public function update(Mark $mark)
    {
        
        $mark->fill($this->validateWith([
            
            'name' => 'required',
        ]))->save();

        return redirect()->route('mark.show', $mark);
    }
/*
* удаление
*/
    public function destroy(Mark $mark)
    {
        $mark->delete();

        return redirect()->route('mark.index');
    }
}
