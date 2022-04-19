<html>
  
  @include('layouts.admin.includes.head')

  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('admin.products.index') }}">Mr. Produits - Admin</a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="{{ route('admin.products.index') }}" class="nav-link">Produits</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.categories.index') }}" class="nav-link">Catégories</a>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="/" class="nav-link">← Retour au site</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link">Déconnexion</a>
            </li>
          </ul>
        </div>
      </nav> 

      <div class="container mt-5">
          @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
          @endif
          
          @yield('content')
      </div>
  </body>
</html>