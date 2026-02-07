<!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper"><!-- [Mobile Media Block] start -->
    <div class="me-auto pc-mob-drp">
      <ul class="list-unstyled">
        <li class="pc-h-item header-mobile-collapse">
          <a href="#" class="pc-head-link head-link-secondary ms-0" id="sidebar-hide">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="pc-h-item pc-sidebar-popup">
          <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="dropdown pc-h-item d-inline-flex d-md-none">
          <a class="pc-head-link head-link-secondary dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
            role="button" aria-haspopup="false" aria-expanded="false">
            <i class="ti ti-search"></i>
          </a>
          <div class="dropdown-menu pc-h-dropdown drp-search">
            <form class="px-3">
              <div class="mb-0 d-flex align-items-center">
                <i data-feather="search"></i>
                <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . ." />
              </div>
            </form>
          </div>
        </li>
      </ul>
    </div>
    <!-- [Mobile Media Block end] -->
    <div class="ms-auto">
      <ul class="list-unstyled">


        <li class="dropdown pc-h-item header-user-profile">
          <a class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
            role="button" aria-haspopup="false" aria-expanded="false">
            <span>
              <i class="ti ti-settings"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header">
              <h4>
                Loged in As
                <span class="small text-muted">{{ Auth::user()->name }}</span>
              </h4>

              <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 280px)">
                <a href="" class="dropdown-item">
                  <i class="ti ti-user"></i>
                  <span>User Profile</span>
                </a>
                <a href="{{ route('logout') }}" class="dropdown-item">
                  <i class="ti ti-logout"></i>
                  <span>Logout</span>
                </a>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>
<!-- [ Header ] end -->