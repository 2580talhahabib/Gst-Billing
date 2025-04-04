  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         @if (Auth::user()->image)
         <img src="{{ url('storage/uploads/'. Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
         @else
         <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
         @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link  {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          <li class="nav-item">
            <a href="{{ route('parties_type') }}" class="nav-link {{ request()->routeIs('parties_type') ? 'active' : '' }}">
              <i class="nav-icon far fa-user"></i>
              <p>
                Parties Type
              </p>
            </a>
            
          </li>
          
          <li class="nav-item">

            <a href="{{ route('parties.index') }}" class="nav-link  {{ request()->routeIs('parties.index') ? 'active' : '' }}">
              <i class="nav-icon far fa-user"></i>
              <p>
                Parties 
              </p>
            </a>
          </li>
          <li class="nav-item">

            <a href="{{ route('bills.index') }}" class="nav-link  {{ request()->routeIs('bills.index') ? 'active' : '' }}">
              <i class="nav-icon far fa-user"></i>
              <p>
                Gst Bills 
              </p>
            </a>
          </li>
          <li class="nav-item">

            <a href="{{ route('myaccount') }}" class="nav-link  {{ request()->routeIs('myaccount') ? 'active' : '' }}">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Account
              </p>
            </a>
          </li>
 {{-- @php
   dump(request())
 @endphp --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
