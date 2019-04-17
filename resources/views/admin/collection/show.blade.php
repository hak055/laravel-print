@extends('layouts.app')

@section('title',($collection->name))

@section('content')

    <h1>{{$collection->name}}</h1>
    <a class="bnt btn-primary" href="{{ route('collection.edit', $collection) }}">edit</a>
@endsection