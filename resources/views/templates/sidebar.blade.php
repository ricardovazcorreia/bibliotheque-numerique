<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
        <i class="fas fa-book-reader"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Livrary</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tableau de bord</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if(Auth::user()->admin == 1)
        <!-- Nav Item - Livres-->
        <li class="nav-item">
            <a href="{{ route('livres') }}" class="nav-link">
            <i class="fas fa-book"></i>
            <span>Livres</span>
            </a>
        </li>

        <!-- Nav Item - Categories -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories') }}">
            <i class="fab fa-buffer"></i>
            <span>Catégories</span>
            </a>
        </li>

        <!-- Nav Item - Etudiants-->
        <li class="nav-item">
            <a href="{{ route('etudiants') }}" class="nav-link">
                <i class="fas fa-user-graduate"></i>
                <span>Etudiants</span>
            </a>
        </li>

        <!-- Nav Item - Paramatres -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
        </li>
    @endif

    <!-- Nav Item - Mes Livres -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('livrary') }}">
            <i class="fas fa-book"></i>
            <span>Mes livres</span>
        </a>
    </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>