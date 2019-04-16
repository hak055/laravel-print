@extends('layouts.app')

@section('content')
<div class="float">       
    <a href="{{ route('phoneModel.create') }}">Create</a>
</div>
<ul class="list-group">
  <h1><li class="list-group-item active">Модель телефонов</li></h1>
  @if($phoneModels->count())
	  @foreach($phoneModels as $phoneModel)
	  <div class="list-group-item">
	  <h2>{{$phoneModel->mark->name.' '}}-<a href="{{ route('phoneModel.show', $phoneModel) }}">{{$phoneModel->name}}</a></h2>
	  <a class="bnt btn-primary" href="{{ route('phoneModel.edit', $phoneModel) }}">edit</a>
	  </div>
	  @endforeach
   @else
      <div class="list-group-item">
	  	<h2>Пусто</h2>
	  </div>
   @endif	  
</ul>


@endsection