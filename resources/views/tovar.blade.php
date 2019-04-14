<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<!-- Styles -->
    <link href="{{ asset('css/tovar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
</html>