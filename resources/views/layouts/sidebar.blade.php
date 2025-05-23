<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-magic"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Product <sup>Kecantikan</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="nav-item {{ Request::is('product*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('product.index') }}">
        <i class="fas fa-fw fa-folder"></i>
        <span>Daftar Product</span>
    </a>
</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>