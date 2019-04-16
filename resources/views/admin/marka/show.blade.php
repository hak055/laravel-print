@extends('layouts.app')

@section('title',($mark->name))

@section('content')
    <h1>{{$mark->name}}</h1>
    <a class="bnt btn-primary" href="{{ route('mark.edit', $mark) }}">edit</a>
@endsection