@extends('layouts.admin')

@section('content')

    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="auth-header">
                        <h2 class="text-secondary mt-2">Add Course</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('add-course') }}" method="post" class="mt-4">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Course Name" />
                            <label for="name">Course Name</label>
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="maxstudent" name="max_student"
                                placeholder="Maximum Students" />
                            <label for="maxstudent">Maximum Students</label>
                            @error('max_student')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="lengthinweek" name="length_in_week"
                                placeholder="Length In Week" />
                            <label for="lengthinweek">Lenth In Week</label>
                            @error('length_in_week')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="isSunday" name="is_avail_sunday" value="1">

                            <label class="form-check-label" for="isSunday">
                                Is Available only on Sunday
                            </label>

                            @error('is_avail_sunday')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
@endsection