@extends('layouts.app')

@section('title', __('Tovar'))

@section('content')

	<div class="container">
		@lang('Tovar')
		<div class="card card-default mb-3">
			<h2>@lang('TovarName')-{{ $tovar->name }}</h2>
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
				@if(Auth::id() === 1)
					<a href="{{route('tovar.edit', $tovar)}}" class="btn btn-secondary">@lang('Edit')</a>
				@endif
			</div>
		</div>
	</div>
@endsection