@extends('layouts.app')

@php /** @var \App\Printt $print */ @endphp

@section('title',($print->exists ? 'Editing' : 'Creating'))

@section('content')
  <div class="container">
    <div class="card card-default mb-3">
      <div>Принт</div>
      <div class="card-header clearfix">
        <div class="float-right">
          @if($print->exists)
            <a class="text-danger" href="{{ route('print.destroy', $print) }}"
               onclick="event.preventDefault(); if(confirm('@lang('Удалить?')?')) document.getElementById('destroy-form').submit()"
            >Delete</a>
            <form id="destroy-form" class="d-none" method="POST"
                  action="{{ route('print.destroy', $print) }}">
              @method('DELETE')
              @csrf
            </form>
          @endif
        </div>
      </div>
      <div class="card-body">
        
        @if($print->exists)
          <form method="post" action="{{ route('print.update', $print) }}">
            
            @method('PUT')

        @else    
          <form method="post" action="{{ route('print.store') }}">
        @endif    
               {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Новый принт:</label>
                    <input type="text" class="form-control" name="name" value="{{($print->exists ? $print->name : '')}}" placeholder="Введите название принта" required>
                </div>
                <div class="form-group">
                    <label for="name">Выбрать колекцию:</label>
                    <select class="form-control" name="collection_id">
                        <option value="empty">без коллекции</option>
                       @foreach($collections as $collection)
                        <option value="{{$collection->id}}">
                            {{$collection->name}}
                        </option>
                      @endforeach  
                    </select>
                </div>
                
              
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="{{ URL('print') }}" type="button" class="btn btn-secondary">Отменить</a>
        </form>
      </div>
    </div>
  </div>
@endsection