<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{asset('melody/images/faces/face16.jpg')}}" alt="image" />
                </div>
                <div class="profile-name">
                    <p class="name">

                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">

        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-chart-line menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('reports.day')}}">Reportes por día</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reports.date')}}">Reportes por fecha</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('purchases.index')}}">
                <i class="fas fa-cart-plus menu-icon"></i>
                <span class="menu-title">Entrada de inventario</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('sales.index')}}">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Salida de inventario</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('categories.index')}}">
                <i class="fas fa-tags menu-icon"></i>
                <span class="menu-title">Categorías</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('products.index')}}">
                <i class="fas fa-boxes menu-icon"></i>
                <span class="menu-title">Productos</span>
            </a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('reserve.index')}}">
                <i class="fas fa-boxes menu-icon"></i>
                <span class="menu-title">Reservas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('clients.index')}}">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">Clientes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('providers.index')}}">
                <i class="fas fa-shipping-fast menu-icon"></i>
                <span class="menu-title">Proveedores</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="fas fa-user-tag menu-icon"></i>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('roles.index')}}">
                <i class="fas fa-user-cog menu-icon"></i>
                <span class="menu-title">Roles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="fas fa-user-cog menu-icon"></i>
                <span class="menu-title">Catálogo</span>
            </a>
        </li>
    </ul>
</nav>
