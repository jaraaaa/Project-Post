<nav class="navbar navbar-expand-lg border-bottom border-body fixed-top navCust" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('homepage')}}">The Aulab Post</a>
      <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav text-center mb-lg-0 w-100">
          <li class="nav-item">
            <a class="nav-link active color-nav" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('article.index')}}">Articoli</a>
          </li>
          <x-search/>
<br>
            {{-- Bottone Prova da FileEsterni --Inizio --}}
            <div class="d-flex justify-content-center align-items-center">
              <input type="checkbox" class="checkbox" id="checkbox">
              <label for="checkbox" class="checkbox-label btnDark" id="btnMode">
                <i class="bi bi-brightness-high-fill text-light"></i>
                <i class="bi bi-moon-fill text-light"></i>
                <span class="ball"></span>
              </label>
            </div>
            {{-- Bottone Prova da FileEsterni --Fine --}}

          @auth
          @if(Auth::user()->is_writer)
            <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="{{route('article_create')}}">Inserisci articolo</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link active"  href="{{route('writer.dashboard')}}">Dashboard Redattore</a>
            </li>
            @endif
            @if (Auth::user()->is_admin)
              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="{{route('admin.dashboard')}}">Dashboard Admin</a>
              </li>
            @endif
            @if (Auth::user()->is_revisor)
              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="{{route('revisor.dashboard')}}">Dashboard Revisore</a>
              </li>
            @endif
            {{-- Search Components --}}


            <li class="nav-item dropdown ms-auto">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Benvenuto, {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu">
                <li class="nav-item">
                  <form action="{{route('logout')}}" method="POST">
                  @csrf
                  <button class="nav-link w-100 " type="submit" id="logout">Logout  <i class="bi bi-box-arrow-left ms-5"></i></i></button>
                  </form>
                </li>
                <li><hr class="dropdown-divider"></li>
              </ul>
            </li>
          @endauth



          @guest
          {{-- Search Components --}}


            <li class="nav-item dropdown ms-auto">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i>
                Accedi
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                <li><hr class="dropdown-divider"></li>
              </ul>
            </li>
          @endguest


        </ul>
      </div>
    </div>
  </nav>