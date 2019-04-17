@extends('layouts.app')

@section('title',($phoneModel->name))

@section('content')
    <h1><a href="{{route('mark.show', $phoneModel->mark->id)}}">{{$phoneModel->mark->name.' '}}</a>-{{$phoneModel->name}}</h1>
    <a class="bnt btn-primary" href="{{ route('phoneModel.edit', $phoneModel) }}">edit</a>
@endsection