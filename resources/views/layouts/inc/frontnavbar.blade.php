<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        {{-- <img src="https://i.pinimg.com/originals/8f/d0/95/8fd095ac4e439e36e45a671ce0e77264.jpg" width="50"
            style=" margin-bottom: 10px" alt=""> --}}
        <img src="{{ asset('assets/logo/logo.png') }}" alt="Category Image" width="50">
        <a class="navbar-brand" href="{{ url('/') }}">Paws'n Claws</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="{{ url('/my-dashboard') }}">Dashboard</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('category') }}">Category</a>
                </li> --}}

                <li class="nav-item dropdown active">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('category/pet-food-drink') }}">Food & Drink</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ url('category/pet-toy') }}">Toy</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/pet-accessories') }}">Accessories</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ url('category/pet-medicine') }}">Medicine</a></li>
                        <li><a class="dropdown-item" href="{{ url('category/pet-cage') }}">Cage</a></li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('product') }}">Product</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('cart') }}">Cart</a>

                </li>

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('my-orders') }}">
                                        My Orders
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
