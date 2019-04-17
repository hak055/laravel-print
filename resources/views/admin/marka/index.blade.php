@extends('layouts.app')

@section('content')
<div class="float">     
@if(Auth::user()->id === 1)  
    <a href="{{ route('mark.create') }}">Create</a>
@endif    
</div>
<ul class="list-group">
  <h1><li class="list-group-item active">Марки телефонов</li></h1>
  @foreach($marks as $mark)
  <div class="list-group-item">
  <h2><a href="{{ route('mark.show', $mark) }}">{{$mark->name}}</a></h2>
  @if(Auth::user()->id === 1)
  <a class="bnt btn-primary" href="{{ route('mark.edit', $mark) }}">edit</a>
  @endif
  </div>
  @endforeach
</ul>


@endsection