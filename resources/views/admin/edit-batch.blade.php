@extends('layouts.admin')

@section('content')

    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="auth-header">
                        <h2 class="text-secondary mt-2">Update Batch</h2>
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
                    <form action="{{ route('update-batch', $batch->id) }}" method="post" class="mt-4">
                        @csrf
                        <div class="form-floating mb-3">
                            <select id="center_id" name="center_id" class="form-select">
                                <option value="" disabled {{ old('center_id') ? '' : 'selected' }}>
                                    -- Select Center --
                                </option>

                                @foreach($centers as $center)
                                    <option value="{{ $center->id }}" {{ old('center_id', $batch->center_id) == $center->id ? 'selected' : '' }}>
                                        {{ $center->name }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="center_id">Select Center</label>

                            @error('center_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select id="course_id" name="course_id" class="form-select">
                                <option value="">-- Select Course --</option>

                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id', $batch->course_id) == $course->id ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="course_id">Select Course</label>
                            @error('course_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" value="{{ old('name', $batch->name) }}"
                                name="name" placeholder="Staff Name" />
                            <label for="name">Batch Name</label>
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="startdate"
                                value="{{ old('start_date', $batch->start_date) }}" name="start_date"
                                placeholder="Start Date" />
                            <label for="startdate">Start Date</label>
                            @error('start_date')
                                <div class="text-danger">
                                    {{$message}}
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
  

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            let centerSelect = document.getElementById('center_id');
            let selectedCenter = centerSelect.value;
            let selectedCourse = "{{ $batch->course_id }}";

            if (selectedCenter) {
                loadCourses(selectedCenter, selectedCourse);
            }

            centerSelect.addEventListener('change', function () {
                loadCourses(this.value);
            });

            function loadCourses(centerId, selectedCourseId = null) {

                let courseDropdown = document.getElementById('course_id');
                courseDropdown.innerHTML = '<option value="">-- Select Course --</option>';

                if (centerId) {

                    let url = "{{ route('get-courses', ':id') }}";
                    url = url.replace(':id', centerId);

                    fetch(url)
                        .then(response => response.json())
                        .then(data => {

                            data.forEach(function (course) {
                                let option = document.createElement('option');
                                option.value = course.id;
                                option.text = course.name;

                                if (selectedCourseId == course.id) {
                                    option.selected = true;
                                }

                                courseDropdown.appendChild(option);
                            });

                        })
                        .catch(error => console.error('Error:', error));
                }
            }

        });

    </script>
@endsection