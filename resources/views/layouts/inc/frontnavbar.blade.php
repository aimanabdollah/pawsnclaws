<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Paws'n Claws</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('category') }}">Category</a>
                </li> --}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('category/food-drink') }}">Food & Drink</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/pet-toy') }}">Toy</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/accessories') }}">Accessories</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/pet-medicine') }}">Medicine</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/shelter') }}">Shelter</a></li>

                    </ul>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('product') }}">Product</a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('cart') }}">Cart</a>
                </li>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">
                                        My Profile
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </ul>
        </div>
    </div>
</nav>
