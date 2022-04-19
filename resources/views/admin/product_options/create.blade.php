@extends('layouts.admin.app')

@section('title', 'Ajouter une option')

@section('content')
	<div class="row">
		<div class="col-6 col-lg-6">
			<h1>{{ $product->name }} - Ajouter une option</h1>
			<form method="post" action="{{ route('admin.products.product_options.store', ['product' => $product]) }}">
				@csrf

				<div class="mb-3">
					<label class="form-label">Name</label>
					<input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" />

					@error('name')
					    <span class="invalid-feedback" role="alert">
					        <strong>{{ $message }}</strong>
					    </span>
					@enderror
				</div>

				<input type="submit" value="Sauvegarder" class="btn btn-primary">
				<a href="{{ route('admin.products.show', ['product' => $product]) }}" class="btn btn-link">Retour</a>
			</form>
		</div>
	</div>
@endsection