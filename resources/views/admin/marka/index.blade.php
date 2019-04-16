@extends('layouts.app')

@section('content')
<div class="float">       
    <a href="{{ route('mark.create') }}">Create</a>
</div>
<ul class="list-group">
  <h1><li class="list-group-item active">Марки телефонов</li></h1>
  @foreach($marks as $mark)
  <div class="list-group-item">
  <h2><a href="{{ route('mark.show', $mark) }}">{{$mark->name}}</a></h2>
  <a class="bnt btn-primary" href="{{ route('mark.edit', $mark) }}">edit</a>
  </div>
  @endforeach
</ul>


@endsection