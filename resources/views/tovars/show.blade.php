@extends('layouts.app')

@section('title',('Товар'))

@section('content')
<div class="container">
    <div class="card card-default mb-3">
    	<h2>Название товара:-{{ $tovar->name }}</h2>
        <div class="card-header clearfix">
            <div class="col-md-8">	
			    <div class="row">				
			     	<div class="col-sm-4">
					    <div class="product">							
					        <div class="product-img">
						   		 <a href="#"><img src="#" alt=""></a>
						    </div>
							<p class="product-title">
								<a href="">{{$tovar->PhoneModel->Mark->name.' '}}</a>
							</p>
							<p class="product-desc">{{$tovar->PhoneModel->name}}</p>
							<p class="product-price">Price: €10.00</p>	
						</div>						
					</div>
				</div>			   
			</div>
			<a href="{{route('tovar.edit', $tovar)}}" class="btn btn-secondary">Редактировать</a>
		</div>
	</div>
</div>
@endsection