<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/">Smart History</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/">SH</a>
    </div>

    <ul class="sidebar-menu">

      <li><a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard"><i
            class="fas fa-fire"></i> <span>Dashboard</span></a></li>

      <li class="menu-header">Atno</li>
      <li><a class="nav-link {{ Request::is('dashboard/articles') ? 'active' : '' }} " href="/dashboard/articles"><i
            class="fas fa-newspaper"></i> <span>Semua Atno</span></a></li>
      <li><a class="nav-link {{ Request::is('dashboard/articles/create') ? 'active' : '' }}"
          href="/dashboard/articles/create"><i class="fas fa-newspaper"></i> <span>Tambah Atno Baru</span></a></li>

      <li class="menu-header">Virtual Tour</li>
      <li><a class="nav-link {{ Request::is('dashboard/tours') ? 'active' : '' }} " href="/dashboard/tours"><i
            class="fas fa-eye"></i> <span>Semua Virtual Tour</span></a></li>
      <li><a class="nav-link {{ Request::is('dashboard/tours/create') ? 'active' : '' }}"
          href="/dashboard/tours/create"><i class="fas fa-eye"></i> <span>Tambah Virtual Tour Baru</span></a></li>

      <li class="menu-header">Entrepeneur</li>
      <li><a class="nav-link {{ Request::is('dashboard/entrepreneurs') ? 'active' : '' }} "
          href="/dashboard/entrepreneurs"><i class="fas fa-store"></i> <span>Semua Entrepeneur</span></a></li>
      <li><a class="nav-link {{ Request::is('dashboard/entrepreneurs/create') ? 'active' : '' }}"
          href="/dashboard/entrepreneurs/create"><i class="fas fa-store"></i> <span>Tambah Entrepreneur Baru</span></a>
      </li>

      <li class="menu-header">Quizzes</li>
      <li><a class="nav-link {{ Request::is('dashboard/quizzes') ? 'active' : '' }} " href="/dashboard/quizzes"><i
            class="fas fa-file"></i> <span>Semua Quiz</span></a></li>
      <li><a class="nav-link {{ Request::is('dashboard/quizzes/create') ? 'active' : '' }}"
          href="/dashboard/quizzes/create"><i class="fas fa-file"></i> <span>Tambah Quiz Baru</span></a>
      </li>
      <li><a class="nav-link {{ Request::is('dashboard/categories') ? 'active' : '' }} " href="/dashboard/categories"><i
            class="fas fa-file"></i> <span>Semua Category</span></a></li>
      <li><a class="nav-link {{ Request::is('dashboard/categories/create') ? 'active' : '' }}"
          href="/dashboard/categories/create"><i class="fas fa-file"></i> <span>Tambah Category Baru</span></a>
      </li>

      <li class="menu-header">User</li>
      <li><a class="nav-link {{ Request::is('dashboard/users') ? 'active' : '' }} " href="/dashboard/users"><i
            class="fas fa-user"></i> <span>Semua User</span></a></li>
      <li><a class="nav-link {{ Request::is('dashboard/users/create') ? 'active' : '' }} "
          href="/dashboard/users/create"><i class="fas fa-user-plus"></i> <span>Tambah User</span></a></li>

  </aside>
</div>