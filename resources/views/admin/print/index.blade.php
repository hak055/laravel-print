@extends('layouts.app')

@section('content')
<div class="float">       
    <a href="{{ route('print.create') }}">Create</a>
</div>
<ul class="list-group">
  <h1><li class="list-group-item active">Все Принты</li></h1>
  @if($prints->count())
	  @foreach($prints as $print)
	  <div class="list-group-item">
	  <h2><a href="{{ route('print.show', $print) }}">{{$print->name}}</a></h2>
	  <a class="bnt btn-primary" href="{{ route('print.edit', $print) }}">edit</a>
	  </div>
	  @endforeach
   @else
    <h1>Пусто</h1>	
   @endif  
</ul>


@endsection