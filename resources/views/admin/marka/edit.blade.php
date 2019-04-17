@extends('layouts.app')

@php /** @var \App\Mark $mark */ @endphp

@section('title',($mark->exists ? 'Editing' : 'Creating'))

@section('content')
  <div class="container">
    <div class="card card-default mb-3">
      <div class="card-header clearfix">
        <div class="float-right">
          @if($mark->exists and Auth::user()->id === 1)
            <a class="text-danger" href="{{ route('mark.destroy', $mark) }}"
               onclick="event.preventDefault(); if(confirm('@lang('Удалить? будут удалены все модели этой Марки')?')) document.getElementById('destroy-form').submit()"
            >Delete</a>
            <form id="destroy-form" class="d-none" method="POST"
                  action="{{ route('mark.destroy', $mark) }}">
              @method('DELETE')
              @csrf
            </form>
          @endif
        </div>
      </div>
      <div class="card-body">
        
        @if($mark->exists)
          <form method="post" action="{{ route('mark.update', $mark) }}">
            
            @method('PUT')

        @else    
          <form method="post" action="{{ route('mark.store') }}">
        @endif    
               {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Название Марки телефона:</label>
                    <input type="text" class="form-control" name="name" value="{{$mark->exists ? $mark->name : ''}}" placeholder="{{$mark->name}}" required>
                </div>
                
              
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="{{ URL('mark') }}" type="button" class="btn btn-secondary">Отменить</a>
        </form>
      </div>
    </div>
  </div>
@endsection