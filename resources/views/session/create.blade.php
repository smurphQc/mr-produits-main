@extends('layouts.app')

@section('content')
	<h1>Connexion</h1>

  <div class="row">
    <div class="col-6 col-lg-6">
    	@error('email')
		    <div class="alert alert-danger">{{ $message }}</div>
			@enderror

		<form method="POST" action="{{ route('login') }}">
			@csrf

			<div class="mb-3">
				<label class="form-label">Courriel</label>
				<input type="email" value="{{ old('email') }}" name="email" placeholder="Courriel" class="form-control">
			</div>

			<div class="mb-3">
				<label class="form-label">Mot de passe</label>
				<input type="password" name="password" placeholder="Mot de passe" class="form-control">
			</div>

			<input type="submit" value="Connexion" class="btn btn-primary">
		</form>
		</div>		
	</div>
@endsection