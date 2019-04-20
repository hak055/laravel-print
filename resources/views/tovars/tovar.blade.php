@extends('layouts.app')

@section('title',('Главная страница'))

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-md-4" style="background-color: darkseagreen;">
        	<h2>Каталог</h2>
		    <div class="list-group">
		    	@if($marks->count())
			    	@foreach($marks as $mark)
					    <h3><a href="{{ route('mark.show', $mark) }}" class="list-group-item">{{$mark->name}}</a></h3>
					@endforeach 
				@else
					<h5>Каталог пуст</h5>
				@endif		   			
		    </div>
        </div>
        
	    <div class="col-md-8">	    	
	        <div class="row">
	            @foreach($tovars as $tovar)
	                <div class="col-sm-4">
	                    <div class="product">                           
	                        <div class="product-img">
	                            <a href=""><img src="#" alt=""></a>
	                        </div>
	                        <p class="product-title">
	                            <a href="{{route('tovar.show', $tovar)}}">{{$tovar->PhoneModel->Mark->name.' '}}</a>
	                        </p>
	                        <p class="product-desc">{{$tovar->PhoneModel->name}}</p>
	                        <!-- <p class="product-price">Price: €10.00</p> -->
	                        <a href="{{route('tovar.show', $tovar)}}">{{$tovar->name}}</a>                  
	                    </div>
	                </div>
	            @endforeach
	        </div>
	    </div>
	</div>		 
</div>
@endsection