<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand me-4" href="/">
            <img src="https://elektra.vtexassets.com/assets/vtex/assets-builder/elektra.store-theme/0.1.369/icn-logo-elektra___be2d09c389ec7e53c29f15cc1c480853.svg" alt="Elektra">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('products') }}" :active="request()->routeIs('products')">
                    {{ __('Products') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('categories') }}" :active="request()->routeIs('categories')">
                    {{ __('Categories') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('deadline2pay') }}" :active="request()->routeIs('deadline2pay')">
                    {{ __('Deadlines to Pay') }}
                </x-jet-nav-link>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav align-items-baseline">
                @auth
                <div class="row">
                    <div class="col-md-7">{{ Auth::user()->name }}</div>
                    <div class="col-md-3">
                        <a href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt"></i>
                        </a>
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </div>
                </div>

                @endauth
            </ul>
        </div>
    </div>
</nav>