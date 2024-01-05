<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('Dashboard') ? 'active' : '' }}" aria-current="page" href="/Dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          @can('admin')
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/post*') ? 'active' : '' }}" href="/dashboard/post">
              <span data-feather="file" class="align-text-bottom"></span>
              Daftar Kamar
            </a>
          </li>
          @endcan
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/booking*') ? 'active' : '' }}" href="/dashboard/booking">
              <span data-feather="file" class="align-text-bottom"></span>
              Daftar Booking
            </a>
          </li>
        </ul>
      </div>
    </nav>