<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="{{ route('dashboard') }}" class="b-brand text-primary">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height:120px; width:180px;">
        <!-- <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo logo-lg" /> -->
      </a>
    </div>
    <div class="navbar-content">
      @if(auth()->user()->role == 'admin')
        <ul class="pc-navbar">
          <li class="pc-item">
            <a href="{{ route('staff.create') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
              <span class="pc-mtext">Add Staff</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('staff.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user"></i></i></span>
              <span class="pc-mtext">Staff Members</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('center.create') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-zoom-in"></i></i></span>
              <span class="pc-mtext">Add Center</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('center.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-map-pins"></i></i></span>
              <span class="pc-mtext">Centers</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('course.create') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-plus"></i></span>
              <span class="pc-mtext">Add Course</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('course.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-apps"></i></span>
              <span class="pc-mtext">Courses</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('batch.create') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-plus"></i></span>
              <span class="pc-mtext">Add Batch</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('batch.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-stack"></i></i></span>
              <span class="pc-mtext">Batches</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('student.create') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
              <span class="pc-mtext">Add Student</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('student.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user"></i></i></span>
              <span class="pc-mtext">Students</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('mcq.create') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-plus"></i></span>
              <span class="pc-mtext">Add MCQ</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('mcq.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-notes"></i></span>
              <span class="pc-mtext">MCQs</span>
            </a>
          </li>
        </ul>
      @endif
      @if(auth()->user()->role == 'coordinator')
        <ul class="pc-navbar">
          <li class="pc-item">
            <a href="{{ route('staff.create') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
              <span class="pc-mtext">Add Staff</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('staff.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user"></i></i></span>
              <span class="pc-mtext">Staff Members</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('course.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-apps"></i></span>
              <span class="pc-mtext">Courses</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('batch.create') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-plus"></i></span>
              <span class="pc-mtext">Add Batch</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('batch.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-stack"></i></i></span>
              <span class="pc-mtext">Batches</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('student.create') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
              <span class="pc-mtext">Add Student</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('student.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user"></i></i></span>
              <span class="pc-mtext">Students</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('mcq.create') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-plus"></i></span>
              <span class="pc-mtext">Add MCQ</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('mcq.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-notes"></i></span>
              <span class="pc-mtext">MCQs</span>
            </a>
          </li>
        </ul>
      @endif
@if(auth()->user()->role == 'staff')
        <ul class="pc-navbar">
          <li class="pc-item">
            <a href="{{ route('batch.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-stack"></i></i></span>
              <span class="pc-mtext">Batches</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('student.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-user"></i></i></span>
              <span class="pc-mtext">Students</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('mcq.create') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-plus"></i></span>
              <span class="pc-mtext">Add MCQ</span>
            </a>
          </li>
          <li class="pc-item">
            <a href="{{ route('mcq.index') }}" class="pc-link">
              <span class="pc-micon"><i class="ti ti-notes"></i></span>
              <span class="pc-mtext">MCQs</span>
            </a>
          </li>
        </ul>
      @endif
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end -->