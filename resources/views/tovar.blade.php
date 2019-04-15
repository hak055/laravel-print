@extends('layouts.app')
@section('content')
<div class="container content">
    <div class="row">
        <div class="col-md-4">
        	<h2>Каталог</h2>
		    <div class="list-group">
		    	@foreach($marks as $mark)
				    <h3><a href="#" class="list-group-item">{{$mark->name}}</a></h3>
				@endforeach    			
		    </div>
        </div>
        
        
        <div class="col-md-8">
			<div class="row">
				@foreach($tovars as $tovar)
				    <div class="col-sm-4">
						<div class="product">
							
					            <div class="product-img">
									<a href="#"><img src="img/goods1.jpg" alt=""></a>
								</div>
									<p class="product-title">
										<a href="#">{{$tovar->PhoneModel->Mark->name.' '}}</a>
								    </p>
								<p class="product-desc">{{$tovar->PhoneModel->name}}</p>
								<p class="product-price">Price: €10.00</p>
							
						</div>
				    </div>
			    @endforeach
			</div>
		</div>
		

	</div>		 

</div>
@endsection