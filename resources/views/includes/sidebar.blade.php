<aside class="left-sidebar my-custom" data-sidebarbg="skin6" style="position: fixed;top:0;left:0">
    <!-- Sidebar scroll-->
    <div class="navbar-header" data-logobg="skin6" style="display: flex;justify-content: center;align-items: center;height: 64px;">
        <a class="navbar-brand" href="/home">
            <b class="logo-icon">
                <img src="{{asset('plugins/images/logo-icon.png')}}" alt="homepage" />
            </b>
            <span class="logo-text">
                <img src="{{asset('plugins/images/logo-text.png')}}" alt="homepage" />
            </span>
        </a>
        <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
            href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
    </div>
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" >
            <ul id="sidebarnav">
                <!-- User Profile-->
                    @if (Auth::user()->role_id == 1)
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/user" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i><span class="hide-menu">User List</span></a>
                        </li>
                    @else
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/product" aria-expanded="false"><i class="fa fa-table"
                                aria-hidden="true"></i><span class="hide-menu">Products</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/order" aria-expanded="false"><i class="fas fa-archive"
                            aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
                    </li>
                    @endif
                    
                    
            </ul>

        </nav>  
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>