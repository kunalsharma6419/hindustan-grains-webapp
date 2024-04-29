<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/Rectangle 1.png') }}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/Rectangle 1.png') }}" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">{{ Auth::user()->name }}</span>
                </h1>
                <h3 class="welcome-sub-text">Your performance summary this week </h3>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img class="img-xs rounded-circle" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}">
                    @else
                        <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img class="img-md rounded-circle" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}">
                        @else
                            <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                        @endif
                        <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item" x-data>
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>{{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
