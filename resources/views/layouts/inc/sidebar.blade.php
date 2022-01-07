  <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="#" class="simple-text logo-normal">
              <img src="https://i.pinimg.com/originals/8f/d0/95/8fd095ac4e439e36e45a671ce0e77264.jpg" width="100"
                  style=" margin-bottom: 10px" alt="">
              <h4><b>Paws'n Claws</b></h4>
          </a></div>
      <div class="sidebar-wrapper">
          <ul class="nav">
              <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }} ">
                  <a class="nav-link" href="{{ url('dashboard') }}">
                      <i class="material-icons">dashboard</i>
                      <p>Dashboard</p>
                  </a>
              </li>
              <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('categories') }}">
                      <i class="material-icons">category</i>
                      <p>Categories</p>
                  </a>
              </li>

              {{-- <li class="nav-item {{ Request::is('add-category') ? 'active':'' }} ">
            <a class="nav-link" href="{{ url('add-category') }}">
              <i class="material-icons">add_circle</i>
              <p>Add Category</p>
            </a>
          </li> --}}

              <li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('products') }}">
                      <i class="material-icons">shopping_bag</i>
                      <p>Products</p>
                  </a>
              </li>

              <li class="nav-item {{ Request::is('orders*') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('orders') }}">
                      <i class="material-icons">shopping_cart</i>
                      <p>Orders</p>
                  </a>
              </li>



              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                      onclick="event.preventDefault();    document.getElementById('logout-form').submit();">
                      <i class="material-icons">logout</i>
                      <p>Logout</p>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>

              </li>













              {{-- <li class="nav-item {{ Request::is('orders') ? 'active' : '' }}">
                  <a class="nav-link" href="#">
                      <i class="material-icons">view_list</i>
                      <p>Orders</p>
                  </a>
              </li> --}}

              {{-- <li class="nav-item {{ Request::is('add-products') ? 'active':'' }} ">
            <a class="nav-link" href="{{ url('add-products') }}">
              <i class="material-icons">add_circle</i>
              <p>Add Product</p>
            </a>
          </li> --}}





              <li class="nav-item ">

          </ul>
      </div>
  </div>
