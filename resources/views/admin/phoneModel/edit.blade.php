@extends('layouts.app')

@php /** @var \App\PhoneModel $phoneModel */ @endphp

@section('title',($phoneModel->exists ? 'Editing' : 'Creating'))

@section('content')
    <div class="container">
        <div class="card card-default mb-3">
            <div class="card-header clearfix">
                <div class="float-right">
                <!-- @if($phoneModel->exists)
                    <a class="text-danger" href="{{ route('phoneModel.destroy', $phoneModel) }}"
               onclick="event.preventDefault(); if(confirm('@lang('Удалить?')?')) document.getElementById('destroy-form').submit()"
            >Delete</a>
            <form id="destroy-form" class="d-none" method="POST"
                  action="{{ route('phoneModel.destroy', $phoneModel) }}">
              @method('DELETE')
                    @csrf
                            </form>
@endif -->
                </div>
            </div>
            <div class="card-body">

                @if($phoneModel->exists)
                    <form method="post" action="{{ route('phoneModel.update', $phoneModel) }}">

                        @method('PUT')

                        @else
                            <form method="post" action="{{ route('phoneModel.store') }}">
                                @endif
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Модель телефона:</label>
                                    <input type="text" class="form-control" name="name" value=""
                                           placeholder="{{$phoneModel->name}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Марка телефона:</label>
                                    <!-- проверка , если марка пустая,сначала нужно создать марку,затем только модель телефона  -->
                                    @if($marks->count() == 0)
                                        <select class="form-control" name="mark_id"
                                                onchange="window.location.href=this.options[this.selectedIndex].value">
                                            <option disabled selected>Выберите Марку</option>
                                            <option value="{{route('mark.create')}}">Список пуст, создайте сначала
                                                Марку
                                            </option>
                                            @else
                                                <select class="form-control" name="mark_id">
                                                    <option disabled selected>Выберите Марку</option>
                                                    @foreach($marks as $key => $mark)
                                                        <option value="{{$mark->id}}">
                                                            {{$mark->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                    @endif
                                </div>


                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                <a href="{{ route('phoneModel.show', $phoneModel) }}" type="button"
                                   class="btn btn-secondary">Отменить</a>
                            </form>
            </div>
        </div>
    </div>
@endsection