<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar">

    <ul class="navbar-nav mr-auto">

      <li class="nav-item {{ $current == 'homepage' ? 'active': '' }}">
        <a class="nav-link" href="{{ route('homepage') }}">Home</a>
      </li>     

      <li class="nav-item {{ $current == 'produto' ? 'active':'' }}">
        <a class="nav-link" href="{{ route('listar.produto') }}">Produtos</a>
      </li>
      
      <li class="nav-item {{ $current == 'categoria' ? 'active':'' }}">
        <a class="nav-link" href="{{ route('listar.categoria') }}">Categoria</a>
      </li>
     
    </ul>
  </div>
</nav>