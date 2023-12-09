<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed">
    <!-- Brand Logo -->
    <a class="brand-link" href="{{ route('client.home') }}">
        <h2 class="brand-text font-weight-light text-center font-weight-bold ">Restaurant </h2>
        <h4 class="text-center">Management</h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class=" mt-5 p-3 mb-3 text-center">
            <div class="image">
                <img class="img-fluid" src="{{ asset('img/resto.png') }}" alt="User Image" height="100px">
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">

                        @if (Auth::user()->role == 'kasir')
                            <li class="nav-item pl-2 mr-2">
                                <a href="" class="nav-link ">
                                    <i class="fa fa-shopping-cart nav-icon"></i>
                                    <p>Order</p>
                                </a>
                            </li>
                        @elseif(Auth::user()->role == 'manager')
                            <li class="nav-item pl-2 mr-2">
                                <a href="{{ route('manager.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item pl-2 mr-2">
                                <a href="{{ route('manager.client.index') }}" class="nav-link ">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>Data Client</p>
                                </a>
                            </li>

                            <li class="nav-item pl-2 mr-2">
                                <a href="{{ route('order.index') }}" class="nav-link ">
                                    <i class="fa fa-shopping-cart nav-icon"></i>
                                    <p>Data Order</p>
                                </a>
                            </li>

                            <li class="nav-item pl-2 mr-2">
                                <a href="{{ route('produk.index') }}" class="nav-link">
                                    <i class="fa fa-utensils nav-icon"></i>
                                    <p>Data Produk</p>
                                </a>
                            </li>
                            <li class="nav-item pl-2 mr-2">
                                <a href="{{ route('rating.index') }}" class="nav-link">
                                    <i class="fa fa-star nav-icon"></i>
                                    <p>Data Rating</p>
                                </a>
                            </li>
                            
                        @else
                                    
                        @endif


                        {{-- <li class="nav-item pl-2 mr-2">
                            <a href="{{ route('client.index') }}" class="nav-link">
                                <i class="fa fa-solid fa-pager"></i>
                                <p> Landing Page</p>
                            </a>
                        </li> --}}

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
