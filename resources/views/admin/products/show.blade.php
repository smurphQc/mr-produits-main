@extends('layouts.admin.app')

@section('title', 'Modifier un produit')

@section('content')
  <h1>{{ $product->name }}</h1>
  <p>{{ $product->description }}</p>
  <p>{{ $product->price }}</p>

  <div class="mt-5">
    <h3>Options</h3>
    @if($product_options->count() > 0)
      @foreach($product_options as $product_option)
        <div>
          {{ $product_option->name }}

          <form method="POST" action="{{ route('admin.products.product_options.destroy', ['product' => $product, 'product_option' => $product_option]) }}" class="mb-0 d-inline">
            @csrf
            @method('DELETE')

            <input type="submit" value="Supprimer" class="btn btn-link link-danger" data-confirm="Êtes-vous certain de vouloir supprimer cette option?" />
          </form>
        </div>
      @endforeach
    @else
      Aucune option à afficher
    @endif
  </div>

  <div class="mt-5">
    <a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="btn btn-primary">Modifier</a>
    <a href="{{ route('admin.products.product_options.create', ['product' => $product]) }}" class="btn btn-secondary">Ajouter une option</a>
    <a href="{{ route('admin.products.index') }}" class="btn btn-link">Retour à la lsite</a>
  </div>
@endsection