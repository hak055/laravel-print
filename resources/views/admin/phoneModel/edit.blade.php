@extends('layouts.app')

@php /** @var \App\PhoneModel $phoneModel */ @endphp

@section('title',($phoneModel->exists ? 'Editing' : 'Creating'))

@section('content')
  <div class="container">
    <div class="card card-default mb-3">
      <div class="card-header clearfix">
        <div class="float-right">
          @if($phoneModel->exists)
            <a class="text-danger" href="{{ route('phoneModel.destroy', $phoneModel) }}"
               onclick="event.preventDefault(); if(confirm('@lang('Удалить?')?')) document.getElementById('destroy-form').submit()"
            >Delete</a>
            <form id="destroy-form" class="d-none" method="POST"
                  action="{{ route('phoneModel.destroy', $phoneModel) }}">
              @method('DELETE')
              @csrf
            </form>
          @endif
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
                    <input type="text" class="form-control" name="name" value="" placeholder="{{$phoneModel->name}}" required>
                </div>
                <div class="form-group">
                    <label for="name">Марка телефона:</label>
                    <select class="form-control" name="mark_id" >
                      @foreach($marks as $key => $mark)
                        <option value="{{$mark->id}}">
                            {{$mark->name}}
                        </option>
                      @endforeach  
                    </select>  
                </div>
                
              
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="{{ route('phoneModel.show', $phoneModel) }}" type="button" class="btn btn-secondary">Отменить</a>
        </form>
      </div>
    </div>
  </div>
@endsection