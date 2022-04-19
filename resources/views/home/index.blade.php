@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
	<div class="row">
		@foreach($products as $product)
			<div class="col-lg-4 col-xl-3 col-md-4 col-6 mb-4">
				<div class="card" style="height: 100%;">
					<img src="https://via.placeholder.com/400x300" class="card-img-top">

					  <div class="card-body">
					    <h5 class="card-title">{{ $product->name }}</h5>
					    <p class="card-text">{{ $product->description }}</p>
					  </div>
				</div>
			</div>
		@endforeach
	</div>
@endsection