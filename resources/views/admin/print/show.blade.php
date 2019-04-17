@extends('layouts.app')

@section('title',($print->name))

@section('content')

    <h1>{{$print->name}}</h1>
    <a class="bnt btn-primary" href="{{ route('print.edit', $print) }}">edit</a>
@endsection