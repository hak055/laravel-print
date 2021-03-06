<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PhoneModel;
use App\Mark;

class PhoneModelController extends Controller
{
    /*
    * вывод всех моделей телефона
    */
    public function index()
    {
        $phoneModels = PhoneModel::get();
        return view('admin.phoneModel.index', compact('phoneModels'));
    }

    /*
    *
    */
    public function create()
    {
        $phoneModel = new PhoneModel();
        $phoneModel->mark()->associate(request('mark'));

        return $this->edit($phoneModel);
    }

    /*
    *
    */
    public function store()
    {
        $phoneModel = new PhoneModel();

        return $this->update($phoneModel);
    }

    /*
    *
    */
    public function show(PhoneModel $phoneModel)
    {
        return view('admin.phoneModel.show', compact('phoneModel'));
    }

    public function edit(PhoneModel $phoneModel)
    {
        abort_unless(Auth::id() === 1, 403, 'Что-то пошло не так , вернитесь обратно.Для данной страницы нужен доступ администратора');
        
        $marks = Mark::get();

        return view('admin.phoneModel.edit', compact('phoneModel', 'marks'));
    }

    /*
    * добавление редоктирование
    */
    public function update(PhoneModel $phoneModel)
    {

        $phoneModel->fill($this->validateWith([

            'name' => ['required', 'unique:phone_models'],//Поле обязательное и проверка на уникальность
            'mark_id' => 'required|exists:marks,id'
        ]))->save();

        return redirect()->route('phoneModel.show', $phoneModel);
    }

    /*
    * удаление
    */
    public function destroy(PhoneModel $phoneModel)
    {
        $phoneModel->delete();

        return redirect()->route('phoneModel.index');
    }
}
