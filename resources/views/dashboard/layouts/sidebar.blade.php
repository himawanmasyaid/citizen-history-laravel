<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/">Citizen History</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">CH</a>
      </div>

      <ul class="sidebar-menu">

        <li><a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            
        <li class="menu-header">Artikel</li>
        <li><a class="nav-link {{ Request::is('dashboard/articles') ? 'active' : '' }} " href="/dashboard/articles"><i class="fas fa-newspaper"></i> <span>Semua Artikel</span></a></li>
        <li><a class="nav-link {{ Request::is('dashboard/articles/create') ? 'active' : '' }}" href="/dashboard/articles/create"><i class="fas fa-newspaper"></i> <span>Tambah Artikel Baru</span></a></li>

        <li class="menu-header">Virtual Tour</li>
        <li><a class="nav-link {{ Request::is('dashboard/tours') ? 'active' : '' }} " href="/dashboard/tours"><i class="fas fa-eye"></i> <span>Semua Virtual Tour</span></a></li>
        <li><a class="nav-link {{ Request::is('dashboard/tours/create') ? 'active' : '' }}" href="/dashboard/tours/create"><i class="fas fa-eye"></i> <span>Tambah Virtual Tour Baru</span></a></li>
           
        <li class="menu-header">Entrepeneur</li>
        <li><a class="nav-link {{ Request::is('dashboard/entrepreneurs') ? 'active' : '' }} " href="/dashboard/entrepreneurs"><i class="fas fa-store"></i> <span>Semua Entrepeneur</span></a></li>
        <li><a class="nav-link {{ Request::is('dashboard/entrepreneurs/create') ? 'active' : '' }}" href="/dashboard/entrepreneurs/create"><i class="fas fa-store"></i> <span>Tambah Entrepreneur Baru</span></a></li>
           
        <li class="menu-header">User</li>
        <li><a class="nav-link {{ Request::is('dashboard/users') ? 'active' : '' }} " href="/dashboard/users"><i class="fas fa-user"></i> <span>Semua User</span></a></li>
        <li><a class="nav-link {{ Request::is('dashboard/users/create') ? 'active' : '' }} " href="/dashboard/users/create"><i class="fas fa-user-plus"></i> <span>Tambah User</span></a></li>
                            
    </aside>
  </div>