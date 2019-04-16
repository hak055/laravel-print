@extends('layouts.app')

@section('title',($сollection->name))

@section('content')
    <h1>{{$сollection->name}}</h1>
    <a class="bnt btn-primary" href="{{ route('сollection.edit', $сollection) }}">edit</a>
@endsection