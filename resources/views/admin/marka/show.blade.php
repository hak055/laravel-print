@extends('layouts.app')

@section('title',($mark->name))

@section('content')
	@if(Auth::user()->id === 1)
   		 <a href="{{route('phoneModel.create')}}">Добавить модел</a>
    @endif
   
    <h1>{{$mark->name}}</h1>

    		

    @if(Auth::user()->id === 1)
   		 <a class="bnt btn-primary" href="{{ route('mark.edit', $mark) }}">edit</a>
    @endif
<hr>

    @foreach($mark->PhoneModel as $phoneModel)
    		{{ $phoneModel->name }}<br>
    @endforeach 



@endsection