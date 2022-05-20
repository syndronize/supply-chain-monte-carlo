<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('dist/img/logo.svg')}}" alt="AdminLTE Logo"
            class="brand-image elevation-2" style="opacity: .8">
        <span class="brand-text font-weight-light">Kasir Praziqmart</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/x.jpg')}}" class="img-circle elevation-3" style="height:50px; width:50px;" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                @if(session()->get('level_user') == 'admin')
                <li class="nav-item">
                    <a href="{{route('user')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Pengguna
                        </p>
                    </a>
                </li>
                @endif
                @if(session()->get('level_user') == 'admin')
                <li class="nav-item">
                    <a href="{{route('produk')}}" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Produk
                        </p>
                    </a>
                </li>
                @endif
                @if(session()->get('level_user') == 'admin' || session()->get('level_user') == 'manajer')
                <li class="nav-item">
                    <a href="{{route('sales')}}" class="nav-link">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>
                            Sales
                        </p>
                    </a>
                </li>
                @endif
                @if(session()->get('level_user') == 'manajer')
                <li class="nav-item">
                    <a href="{{route('analisa')}}" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Analisa
                        </p>
                    </a>
                </li>
                @endif
                @if(session()->get('level_user') == 'kasir' || session()->get('level_user') == 'manajer')
                <li class="nav-item">
                    <a href="{{route('transaksi')}}" class="nav-link">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>