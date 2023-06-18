<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{route('home')}}" class="logo me-auto"><img src="{{ asset('public/img/logoyy.png')}}" alt="" class="img-fluid"></a>
      <h1 class="logo me-auto"><a href="{{ route('home') }}">DONORNATION</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link {{ Request::route()->getName() === 'home' ? 'active' : '' }}" href="{{ route('home') }}">Accueil</a></li>
          <li><a class="nav-link {{ Request::route()->getName() === 'donner_sang' ? 'active' : '' }}" href="{{ route('donner_sang') }}">Donner & Map</a></li>
          @if (Auth::check())
            <li><a class="nav-link {{ Request::route()->getName() === 'home' ? 'active' : '' }}" href="{{ route('home') }}">Donner du sang</a></li>
          @else
          <li><a class="nav-link scrollto {{ Request::is('blood-donation-process') ? 'active' : '' }}" href="{{ url('/blood-donation-process') }}">Donner du sang</a></li>
          @endif
          <li><a class="nav-link {{ Request::is('donors*') ? 'active' : '' }}" href="{{ route('donorsPage') }}">Rechercher des donneurs</a></li>
          <li><a class="nav-link {{ Request::route()->getName() === 'blog' ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a></li>
          <li><a class="nav-link {{ Request::route()->getName() === 'home' ? '' : 'inactive' }}" href="{{ route('home') }}#contact-us">Contacts</a></li>
          @guest
            <a href="{{ route('login') }}" class="appointment-btn scrollto">
                <span class="d-none d-md-inline">Nous</span> Rejoindre
            </a>
            @else

               @if(auth()->user()->Admin())
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a href="/admin" class="dropdown-item">
                                <i class="fas fa-user me-2"></i>Admin Dashboard&emsp; &emsp; &emsp; &emsp; &emsp;
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i> {{ __('Logout') }} &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a href="/admin/profile" class="dropdown-item">
                                <i class="fas fa-user me-2"></i> Mon compte &emsp; &emsp; &emsp; &emsp; &emsp;
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i> {{ __('Logout') }} &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @endif
            @endguest


      </nav><!-- .navbar -->
  </header>