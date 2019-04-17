@extends('layouts.app')

@php /** @var \App\Collection $collection */ @endphp

@section('title',($collection->exists ? 'Editing' : 'Creating'))

@section('content')
  <div class="container">
    <div class="card card-default mb-3">
      <div>Колекция</div>
      <div class="card-header clearfix">
        <div class="float-right">
          @if($collection->exists)
            <a class="text-danger" href="{{ route('collection.destroy', $collection) }}"
               onclick="event.preventDefault(); if(confirm('@lang('Удалить?')?')) document.getElementById('destroy-form').submit()"
            >Delete</a>
            <form id="destroy-form" class="d-none" method="POST"
                  action="{{ route('collection.destroy', $collection) }}">
              @method('DELETE')
              @csrf
            </form>
          @endif
        </div>
      </div>
      <div class="card-body">
        
        @if($collection->exists)
          <form method="post" action="{{ route('collection.update', $collection) }}">
            
            @method('PUT')

        @else    
          <form method="post" action="{{ route('collection.store') }}">
        @endif    
               {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Новая колекция:</label>
                    <input type="text" class="form-control" name="name" value="{{($collection->exists ? $collection->name : '')}}" placeholder="Введите название колекции" required>
                </div>
                <div class="form-group">
                    <label for="name">Выбрать Принт:</label>
                    <select class="form-control" name="printt_id">
                        <option value="empty">без принта</option>
                       @foreach($printts as $printt)
                        <option value="{{$printt->id}}">
                            {{$printt->name}}
                        </option>
                      @endforeach  
                    </select>
                </div>           
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="{{ URL('collection') }}" type="button" class="btn btn-secondary">Отменить</a>
        </form>
      </div>
    </div>
  </div>
@endsection