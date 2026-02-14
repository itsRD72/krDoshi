@extends('layouts.admin')

@section('content')

    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="auth-header">
                        <h2 class="text-secondary mt-2">Update Student</h2>
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
                    <form action="{{ route('update-student', $student->id) }}" method="post" class="mt-4">
                        @csrf

                        <div class="form-floating mb-3">
                            <select id="course_id" name="course_id" class="form-select">
                                <option value="" disabled>-- Select Course --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ (old('course_id', $student->course_id) == $course->id) ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="batch_id">Select Course</label>

                            @error('course_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <select id="batch_id" name="batch_id" class="form-select">
                                <option value="" disabled>-- Select Batch --</option>
                                @foreach($batches as $batch)
                                    <option value="{{ $batch->id }}" {{ (old('batch_id', $student->batch_id) == $batch->id) ? 'selected' : '' }}>
                                        {{ $batch->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="batch_id">Select Batch</label>

                            @error('batch_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="{{ old('first_name', $student->first_name ?? '') }}" placeholder="First Name" />
                            <label for="first_name">First Name</label>
                            @error('first_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="middle_name" name="middle_name"
                                value="{{ old('middle_name', $student->middle_name ?? '') }}" placeholder="Middle Name" />
                            <label for="middle_name">Middle Name</label>
                            @error('middle_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ old('last_name', $student->last_name ?? '') }}" placeholder="Last Name" />
                            <label for="last_name">Last Name</label>
                            @error('last_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="village" name="village"
                                value="{{ old('village', $student->village ?? '') }}" placeholder="Village" />
                            <label for="village">Village</label>
                            @error('village')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="taluko" name="taluko"
                                value="{{ old('taluko', $student->taluko ?? '') }}" placeholder="Taluko" />
                            <label for="taluko">Taluko</label>
                            @error('taluko')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="district" name="district"
                                value="{{ old('district', $student->district ?? '') }}" placeholder="District" />
                            <label for="district">District</label>
                            @error('district')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                value="{{ old('phone_number', $student->phone_number ?? '') }}"
                                placeholder="Phone Number" />
                            <label for="phone_number">Phone Number</label>
                            @error('phone_number')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="parent_number" name="parent_number"
                                value="{{ old('parent_number', $student->parent_number ?? '') }}"
                                placeholder="Parent's Phone Number" />
                            <label for="parent_number">Parent's Phone Number</label>
                            @error('parent_number')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $student->email ?? '') }}" placeholder="Email" />
                            <label for="email">Email</label>
                            @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="parent_email" name="parent_email"
                                value="{{ old('parent_email', $student->parent_email ?? '') }}"
                                placeholder="parent's Email" />
                            <label for="parent_email">Parent's Email</label>
                            @error('parent_email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="address" name="address" placeholder="Address"
                                style="height: 100px">{{ old('address', $student->address ?? '') }}</textarea>
                            <label for="address">Address</label>

                            @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-secondary">Update Student</button>
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

    <script>
        $(document).ready(function () {
            $('#course_id').change(function () {
                var courseId = $(this).val();
                var batchDropdown = $('#batch_id');
                batchDropdown.html('<option value="">-- Select Batch --</option>');

                if (courseId) {
                    $.ajax({
                        url: '/admin/get-batches/' + courseId,
                        type: 'GET',
                        success: function (data) {
                            data.forEach(function (batch) {
                                batchDropdown.append(
                                    '<option value="' + batch.id + '">' + batch.name + '</option>'
                                );
                            });
                        },
                        error: function () {
                            alert('Failed to fetch batches!');
                        }
                    });
                }
            });
        });
    </script>
@endsection