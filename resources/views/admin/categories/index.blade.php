@extends('layouts.admin.app')

@section('title', 'Catégories')

@section('content')
	<h1>Catégories</h1>

	@if($categories->count() > 0)
	    <table class="table">
	      <thead>
	        <th>Nom</th>
	        <th>Options</th>
	      </thead>
	      <tbdoy>
	        @foreach ($categories as $category)
	          <tr>
	            <td>{{ $category->name }}</td>
	            <td>
	            	<a href="{{ route('admin.categories.edit', ['category' => $category]) }}" class="btn btn-link">Modifier</a>

	            	<form method="POST" action="{{ route('admin.categories.destroy', ['category' => $category]) }}" class="d-inline mb-0">
	            		@csrf
	            		@method('DELETE')

	            		<input type="submit" value="Supprimer" class="btn btn-link link-danger" data-confirm="Êtes-vous certain de vouloir supprimer cette catégorie?" />
	            	</form>
	            </td>

	        @endforeach
	      </tbdoy>
	    </table>
	@else
		<p>Aucune catégorie à afficher pour le moment.</p>
	@endif

	<a href="{{ route('admin.categories.create') }}">Ajouter une catégorie</a>
@endsection