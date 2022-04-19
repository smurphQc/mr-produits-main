@extends('layouts.admin.app')

@section('title', 'Produits')

@section('content')
	<h1>Produits</h1>

	@if($products->count() > 0)
	    <table class="table">
	      <thead>
	        <th>Nom</th>
	        <th>Description</th>
	        <th>Prix</th>
	        <th>Disponibilité</th>
	        <th>Options</th>
	      </thead>
	      <tbdoy>
	        @foreach ($products as $product)
	          <tr>
	            <td><a href="{{ route('admin.products.show', ['product' => $product]) }}">{{ $product->name }}</a></td>
	            <td>{{ $product->description }}</td>
	            <td>{{ $product->price }}</td>
	            <td>@if($product->is_active) Disponible @else Non-disponible @endif</td>
	            <td>
	            	<a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="btn btn-link">Modifier</a>

	            	<form method="POST" action="{{ route('admin.products.destroy', ['product' => $product]) }}" class="mb-0">
	            		@csrf
	            		@method('DELETE')

	            		<input type="submit" value="Supprimer" class="btn btn-link link-danger" data-confirm="Êtes-vous certain de vouloir supprimer ce produit?" />
	            	</form>
	            </td>
	        @endforeach
	      </tbdoy>
	    </table>
	@else
		<p>Aucun produit à afficher pour le moment.</p>
	@endif

	<a href="{{ route('admin.products.create') }}">Ajouter un produit</a>
@endsection