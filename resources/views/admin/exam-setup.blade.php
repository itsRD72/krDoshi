@extends('layouts.admin')

@section('content')

    <div class="card my-2">
        <div class="card-body">

            <div class="text-center mb-4">
                <h2 class="text-secondary">Exam Setup</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">

                    <form action="{{ route('exam-select') }}" method="GET">
                        <div class="form-floating mb-3">
                            <select name="center_id" class="form-select" required>
                                <option value="">-- Select Center --</option>
                                @foreach($centers as $center)
                                    <option value="{{ $center->id }}">
                                        {{ $center->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label>Select Center</label>

                            @error('center_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <select name="course_id" class="form-select" required>
                                <option value="">-- Select Course --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label>Select Course</label>

                            @error('course_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Total Questions --}}
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="number" min="1" step="1"
                                placeholder="Total Questions" required>
                            <label>Total Questions</label>

                            @error('number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Mode --}}
                        <div class="form-floating mb-3">
                            <select name="mode" class="form-select" required>
                                <option value="">-- Select Mode --</option>
                                <option value="staff">By Staff Selected Questions</option>
                                <option value="random">Random Questions</option>
                            </select>
                            <label>Select Mode</label>

                            @error('mode')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-secondary">
                                Continue
                            </button>
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