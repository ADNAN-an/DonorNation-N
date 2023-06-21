<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('home') }}" class="logo me-auto"><img src="{{ asset('public/img/logoyy.png') }}" alt=""
                class="img-fluid"></a>
        <h1 class="logo me-auto"><a href="{{ route('home') }}">DONORNATION</a></h1>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link {{ Request::route()->getName() === 'home' ? 'active' : '' }}"
                        href="{{ route('home') }}">{{ __('site.home') }}</a></li>
                <li><a class="nav-link {{ Request::route()->getName() === 'donner' ? 'active' : '' }}"
                        href="{{ route('donner') }}">{{ __('site.donner') }}</a></li>
                <li><a class="nav-link {{ Request::is('donors*') ? 'active' : '' }}"
                        href="{{ route('donorsPage') }}">{{ __('site.rechercher_donateurs') }}</a></li>
                <li><a class="nav-link {{ Request::route()->getName() === 'blog' ? 'active' : '' }}"
                        href="{{ route('blog') }}">{{ __('site.blog') }}</a></li>
                <li><a class="nav-link {{ Request::route()->getName() === 'home' ? '' : 'inactive' }}"
                        href="{{ route('home') }}#contact-us">{{ __('site.contacts') }}</a></li>

                <li class="nav-item dropdown d-md-down-none">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                </li>

                @guest
                    <a href="{{ route('login') }}" class="appointment-btn scrollto">
                        <span class="d-none d-md-inline">{{ __('site.join_us') }}</span>
                    </a>
                @else
                    @if (auth()->user()->Admin())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a href="/admin" class="dropdown-item">
                                        <i class="fas fa-user me-2"></i>{{ __('site.admin') }} &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                                        &emsp;
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> {{ __('site.logout') }} &emsp; &emsp; &emsp;
                                        &emsp; &emsp; &emsp; &emsp;
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a href="{{ route('profile' , Auth::user()->name) }}" class="dropdown-item">
                                        <i class="fas fa-user me-2"></i> {{ __('site.my_account') }} &emsp; &emsp; &emsp; &emsp; &emsp;
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> {{ __('site.logout') }} &emsp; &emsp; &emsp;
                                        &emsp; &emsp; &emsp; &emsp;
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <i class="fa-regular fa-circle-user fa-2xl" style="color: #000048;"></i>
                @endguest


        </nav><!-- .navbar -->
</header>
