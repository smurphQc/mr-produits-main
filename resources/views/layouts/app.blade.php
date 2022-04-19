<html>
  
  @include('layouts.includes.head')

  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="">Mr. Produits</a>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="{{ route('admin.products.index') }}" class="nav-link">Admin</a>
            </li>
          </ul>
        </div>
      </nav> 

      <div class="container mt-5">
          @yield('content')
      </div>
  </body>
</html>