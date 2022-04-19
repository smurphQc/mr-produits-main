@extends('layouts.admin.app')

@section('title', 'Modifier un produit')

@section('content')
  <h1>Modifier {{ $product->name }}</h1>

  <div class="row">
    <div class="col-6 col-lg-6">
      <form method="POST" action="{{ route('admin.products.update', ['product' => $product]) }}">
        @csrf
        @method('PUT')
     
        @include('admin.products.partials.form')

      </form>
    </div>
  </div>
@endsection