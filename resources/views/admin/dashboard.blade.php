@extends('layouts.admin')

@section('content')

  <div class="row g-4">

    <!-- Centers -->
    <div class="col-xl-3 col-md-6">
      <div class="card bg-secondary-dark dashnum-card text-white h-100 overflow-hidden">
        <span class="round small"></span>
        <span class="round big"></span>
        <div class="card-body">
          <span class="d-block f-34 f-w-500 my-2">
            {{ $totalCenters }}
          </span>
          <p class="mb-0 opacity-50">Total Centers</p>
        </div>
      </div>
    </div>

    <!-- Courses -->
    <div class="col-xl-3 col-md-6">
      <div class="card bg-primary-dark dashnum-card text-white h-100 overflow-hidden">
        <span class="round small"></span>
        <span class="round big"></span>
        <div class="card-body">
          <span class="d-block f-34 f-w-500 my-2">
            {{ $totalCourses }}
          </span>
          <p class="mb-0 opacity-50">Total Courses</p>
        </div>
      </div>
    </div>

    <!-- Students -->
    <div class="col-xl-3 col-md-6">
      <div class="card bg-success dashnum-card text-white h-100 overflow-hidden">
        <span class="round small"></span>
        <span class="round big"></span>
        <div class="card-body">
          <span class="d-block f-34 f-w-500 my-2">
            {{ $totalStudents }}
          </span>
          <p class="mb-0 opacity-50">Total Students</p>
        </div>
      </div>
    </div>

    <!-- Batches -->
    <div class="col-xl-3 col-md-6">
      <div class="card bg-warning dashnum-card text-white h-100 overflow-hidden">
        <span class="round small"></span>
        <span class="round big"></span>
        <div class="card-body">
          <span class="d-block f-34 f-w-500 my-2">
            {{ $totalBatches }}
          </span>
          <p class="mb-0 opacity-50">Total Batches</p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center mt-5">
      @if (session('error'))
        <div class="col-md-6">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            You are not allowed to access the page.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      @endif
    </div>
  </div>

@endsection