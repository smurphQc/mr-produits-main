<div class="mb-3">
  <label for="name" class="form-label">Nom de la catégorie</label>
  <input id="name" name="name" type="text" value="{{ old('name', $category->name) }}" class="form-control @error('name') is-invalid @enderror">

  @error('name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<input type="submit" value="sauvegarder" class="btn btn-primary">
<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Retour</a>