@extends('layouts.admin')

@section('content')

    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="auth-header">
                        <h2 class="text-secondary mt-2">Add Student</h2>
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
                    <form action="{{ route('add-student') }}" method="post" class="mt-4">
                        @csrf

                        <div class="form-floating mb-3">
                            <select id="course_id" name="course_id" class="form-select">
                                <option value="" disabled {{ old('course_id') ? '' : 'selected' }}>
                                    -- Select Course --
                                </option>

                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
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
                            <select id="batch_id" name="batch_id" class="form-select">
                                <option value="" disabled selected>
                                    -- Select Batch --
                                </option>
                            </select>

                            <label for="batch_id">Select Batch</label>

                            @error('batch_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                placeholder="First Name" />
                            <label for="first_name">First Name</label>
                            @error('first_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="middle_name" name="middle_name"
                                placeholder="Middle Name" />
                            <label for="middle_name">Middle Name</label>
                            @error('middle_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                placeholder="Last Name" />
                            <label for="last_name">Last Name</label>
                            @error('last_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="village" name="village" placeholder="Village" />
                            <label for="village">Village</label>
                            @error('village')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="taluko" name="taluko" placeholder="Taluko" />
                            <label for="taluko">Taluko</label>
                            @error('taluko')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="district" name="district" placeholder="District" />
                            <label for="district">District</label>
                            @error('district')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="phone_number" name="phone_number"
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
                                placeholder="Parent's Phone Number" />
                            <label for="parent_number">Parent's Phone Number</label>
                            @error('parent_number')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                            <label for="email">Email</label>
                            @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="parent_email" name="parent_email"
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
                                style="height: 100px"></textarea>
                            <label for="address">Address</label>

                            @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-secondary">Add Student</button>
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
        document.getElementById('course_id').addEventListener('change', function () {

            let courseId = this.value;
            let batchDropdown = document.getElementById('batch_id');

            // reset batch dropdown
            batchDropdown.innerHTML = '<option value="">-- Select Batch --</option>';

            if (courseId) {
                fetch('/get-batches/' + courseId)
                    .then(response => response.json())
                    .then(data => {

                        data.forEach(function (batch) {
                            let option = document.createElement('option');
                            option.value = batch.id;
                            option.text = batch.name;
                            batchDropdown.appendChild(option);
                        });

                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>

@endsection