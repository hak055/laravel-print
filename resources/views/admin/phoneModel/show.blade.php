@extends('layouts.app')

@section('title',($phoneModel->name))

@section('content')
    <h1>{{$phoneModel->mark->name.' '}}-{{$phoneModel->name}}</h1>
    <a class="bnt btn-primary" href="{{ route('phoneModel.edit', $phoneModel) }}">edit</a>
@endsection