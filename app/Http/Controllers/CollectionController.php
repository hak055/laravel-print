<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Collection;
use App\Printt;

use App\User;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::get();

        return view('admin.collection.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection = new Collection();

        return $this->edit($collection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $collection = new Collection();

        return $this->update($collection);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return view('admin.collection.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        abort_unless(Auth::id() === 1, 403, 'Что-то пошло не так , вернитесь обратно.Для данной страницы нужен доступ администратора');
        $printts = Printt::get();

        return view('admin.collection.edit', compact('printts', 'collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Collection $collection)
    {
        $collection->fill($this->validateWith([

            'name' => 'required',

        ]))->save();
//если выбран принт без колекции 
//при выборе колекции создаем таблицу связи и проверяем на уникальность        
        if ($_POST['printt_id'] != 'empty') {
            $printt = Printt::find($_POST['printt_id']);
            if ($collection->printt->contains($printt)) {
                return redirect()->route('collection.show', $collection);//значит есть такая запись в таблице collection_printt
            } else {
                $collection->printt()->save($printt);

                return redirect()->route('collection.show', $collection);
            }

        }
        return redirect()->route('collection.show', $collection);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();

        return redirect()->route('collection.index');
    }
}
