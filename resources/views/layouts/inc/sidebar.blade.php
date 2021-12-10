  <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo"><a href="#" class="simple-text logo-normal">
      <img src="assets/logo/logo.png"  width="100" 
                            style=" margin-bottom: 10px" 
                            alt="">
          <h4><b>Paws'n Claws</b></h4>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }} ">
            <a class="nav-link" href="{{ url('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('categories') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('categories') }}">
              <i class="material-icons">view_list</i>
              <p>Categories</p>
            </a>
          </li>
  
             {{-- <li class="nav-item {{ Request::is('add-category') ? 'active':'' }} ">
            <a class="nav-link" href="{{ url('add-category') }}">
              <i class="material-icons">add_circle</i>
              <p>Add Category</p>
            </a>
          </li> --}}

          <li class="nav-item {{ Request::is('products') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('products') }}">
              <i class="material-icons">view_list</i>
              <p>Products</p>
            </a>
          </li>

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