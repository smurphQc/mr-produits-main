@extends('layouts.admin.app')

@section('title', 'Ajouter une catégorie')

@section('content')
  <h1>Ajouter une catégorie</h1>

  <div class="row">
    <div class="col-6 col-lg-6">
      <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        @include('admin.categories.partials.form')
      </form>
    </div>
  </div>
@endsection