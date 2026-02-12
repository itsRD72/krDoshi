<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="{{ route('dashboard') }}" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="../assets/images/logo-dark.svg" alt="" class="logo logo-lg" />
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item">
          <a href="{{ route('add-staff-form') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
            <span class="pc-mtext">Add Staff</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('staff-list-page') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user"></i></i></span>
            <span class="pc-mtext">Staff Members</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('add-batch-page') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-zoom-in"></i></span>
            <span class="pc-mtext">Add Batch</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('batch-list') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-stack"></i></i></span>
            <span class="pc-mtext">Batches</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('add-center-page') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-zoom-in"></i></i></span>
            <span class="pc-mtext">Add Center</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('center-list') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-map-pins"></i></i></span>
            <span class="pc-mtext">Centers</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('add-course-page') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-zoom-in"></i></span>
            <span class="pc-mtext">Add Course</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('course-list-page') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-apps"></i></span>
            <span class="pc-mtext">Courses</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('add-student-page') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
            <span class="pc-mtext">Add Student</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('student-list-page') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user"></i></i></span>
            <span class="pc-mtext">Students</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('add-mcq-page') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plus"></i></span>
            <span class="pc-mtext">Add MCQ</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('mcq-list-page') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-notes"></i></span>
            <span class="pc-mtext">MCQs</span>
          </a>
        </li>
      </ul>
      <div class="w-100 text-center">
        <div class="badge theme-version badge rounded-pill bg-light text-dark f-12"></div>
      </div>
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end -->