@extends('layouts.app')

@section('title',($tovar->exists ? 'Editing' : 'Creating'))

@section('content')
  <div class="container">
    <div class="card card-default mb-3">
      <div class="card-header clearfix">
        <div class="float-right">
          @if($tovar->exists and Auth::user()->id === 1)
            <a class="text-danger" href="{{ route('tovar.destroy', $tovar) }}"
               onclick="event.preventDefault(); if(confirm('@lang('Delete')?')) document.getElementById('destroy-form').submit()"
            >@lang('Delete')</a>
            <form id="destroy-form" class="d-none" method="POST"
                  action="{{ route('tovar.destroy', $tovar) }}">
              @method('DELETE')
              @csrf
            </form>
          @endif
        </div>
        
        @if($tovar->exists)
          <a href="{{ route('tovar.show', $tovar) }}">{{ $tovar->name }}</a>
        @endif
       
      </div>
      <div class="card-body">

       <!-- form -->
      	@if($tovar->exists)
          <form method="post" action="{{ route('tovar.update', $tovar) }}">          
            @method('PUT')
        @else    
          <form method="post" action="{{ route('tovar.store') }}">
        @endif    
               {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Название товара:</label>
                    <input type="text" class="form-control" name="name" value="{{$tovar->exists ? $tovar->name : ''}}" placeholder="{{$tovar->name}}" required>
                </div>
                <div class="form-group">
                    <label for="name">Статус товара:</label>
                    <select class="form-control" name="status">
                        <option disabled selected>выберите статус</option>                     
                        <option value="1">Активный</option>
                        <option value="0">Неактивный</option> 
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Принт товара:</label>
                    <select class="form-control" name="print_id">
                        <option disabled selected>выберите принт</option>
                       @foreach($printts as $printt)
                        <option value="{{$printt->id}}">
                            {{$printt->name}}
                        </option>
                      @endforeach  
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Модель товара:</label>
                    <select class="form-control" name="phone_model_id">
                        <option disabled selected>выберите модель</option>
                       @foreach($phoneModels as $phoneModel)
                        <option value="{{$phoneModel->id}}">
                            {{$phoneModel->name}}
                        </option>
                      @endforeach  
                    </select>
                </div>
                
              
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="{{ URL('/') }}" type="button" class="btn btn-secondary">Отменить</a>
        </form>

      </div>
    </div>
  </div>
@endsection