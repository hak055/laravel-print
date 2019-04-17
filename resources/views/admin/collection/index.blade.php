@extends('layouts.app')

@section('content')
<div class="float">       
    <a href="{{ route('collection.create') }}">Create</a>
</div>
<ul class="list-group">
  <h1><li class="list-group-item active">Все Колекции</li></h1>
  @if($collections->count())
	  @foreach($collections as $collection)
	  <div class="list-group-item">
	  <h2><a href="{{ route('collection.show', $collection) }}">{{$collection->name}}</a></h2>
	  <a class="bnt btn-primary" href="{{ route('collection.edit', $collection) }}">edit</a>
	  </div>
	  @endforeach
   @else
    <h1>Пусто</h1>	
   @endif  
</ul>


@endsection