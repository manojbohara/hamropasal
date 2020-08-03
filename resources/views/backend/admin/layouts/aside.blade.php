<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/hamropasal/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">HamroPasal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/hamropasal/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('admin')}}" class="nav-link {{ (request()->is('hamropasal/admin/dashboard*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('merchants.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Merchants
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('products.index')}}" class="nav-link">
             <i class="fa fa-list-alt" aria-hidden="true"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ (request()->is('admin/products*')) ? 'active' : '' }}">
                <a href="{{route('products.index')}}" class="nav-link">
                  <i class="fa fa-list-alt" aria-hidden="true"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('admin/categories*')) ? 'active' : '' }}">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="fa fa-list-alt" aria-hidden="true"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('admin/subcategories*')) ? 'active' : '' }}">
                <a href="{{route('subcategories.index')}}" class="nav-link">
                  <i class="fa fa-list-alt" aria-hidden="true"></i>
                  <p>Subcategories</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('coupons.index')}}" class="nav-link {{ (request()->is('hamropasal/admin/coupons*')) ? 'active' : '' }}">
              <i class="fa fa-gift" aria-hidden="true"></i>
              <p>
                Coupons
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('banners.index')}}" class="nav-link {{ (request()->is('hamropasal/admin/banners*')) ? 'active' : '' }}">
              <i class="fa fa-picture-o" aria-hidden="true"></i>
              <p>
               Banners
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                 Product Attributes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sizes.index')}}" class="nav-link">
                 <i class='fas fa-ruler-combined'></i>
                  <p>Sizes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('colors.index')}}" class="nav-link">
                 <i class='fas fa-palette'></i>
                  <p>Colors</p>
                </a>
              </li>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('sliders.index')}}" class="nav-link">
              <i class="fa fa-picture-o" aria-hidden="true"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('blogs.index')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Blogs
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
          <a href="{{route('contacts.index')}}" class="nav-link"> 
           <i class="fa fa-address-card" aria-hidden="true"></i>
              <p>
                Contacts
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
          <a href="{{route('orders.index')}}" class="nav-link"> 
           <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <p>
                Order
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>