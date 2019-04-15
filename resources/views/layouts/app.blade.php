@extends('layouts.master')

@section('body')
<div id="app">
	  @include('layouts.header')

	  

	  <main class="py-4">   
	    @yield('content')
	  </main>
</div>

@endsection
