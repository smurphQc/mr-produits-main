<div class="mb-3">
  <label for="name" class="form-label">Nom du produit</label>
  <input id="name" name="name" type="text" value="{{ old('name', $product->name) }}" class="form-control @error('name') is-invalid @enderror">

  @error('name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>

  @error('description')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<div class="mb-3">
  <label for="price" class="form-label">Prix</label>
  <input id="price" name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">

  @error('price')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<div class="mb-3">
  <label for="is_active" class="form-label">Disponibilité du produit</label>
  <select id="is_active" name="is_active" type="text" class="form-select @error('is_active') is-invalid @enderror">
    <option value="1" {{ old('is_active', $product->is_active) == 1 ? 'selected' : '' }}>Disponible</option>
    <option value="0" {{ old('is_active', $product->is_active) == 0 ? 'selected' : '' }}>Non-disponible</option>
  </select>

  @error('is_active')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>

<div class="mb-3">
  <label for="categories" class="form-label">Catégories</label>
  @foreach($categories as $category)
    <div class="form-check">
      <input id="category_{{ $category->id }}" class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}"
          {{--  En édition, 'old' contient la référence à la liste précédente s'il y a une erreur dans le formulaire
          lors de l'envoi. Sinon, $selected_categories est la valeur par défaut. Cette dernière est initialisée dans le contrôleur à un Array vide pour 'create' (nouveau produit) et Array contenant les id des catégories 
          sélectionnées à l'origine pour 'edit' --}}
          @if (is_array(old('categories', $selected_categories)) && in_array($category->id, old('categories', $selected_categories)))
            checked
          @endif
      >
      <label class="form-check-label" for="category_{{ $category->id }}">
        {{ $category->name }}
      </label>
    </div>
  @endforeach
</div>

<input type="submit" value="sauvegarder" class="btn btn-primary">
<a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Retour</a>