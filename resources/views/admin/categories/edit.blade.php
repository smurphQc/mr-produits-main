@extends('layouts.admin.app')

@section('title', 'Ajouter une catégorie')

@section('content')
  <h1>Modifier une catégorie</h1>

  <div class="row">
    <div class="col-6 col-lg-6">
      <form method="POST" action="{{ route('admin.categories.update', ['category' => $category]) }}">
        @csrf
        @method('put')

        @include('admin.categories.partials.form')
      </form>
    </div>
  </div>
@endsection