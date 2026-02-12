@extends('layouts.admin')

@section('content')

    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="auth-header">
                        <h2 class="text-secondary mt-2">Add MCQ</h2>
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
                    <form action="{{ route('add-mcq') }}" method="post" class="mt-4">
                        @csrf
                        <div class="form-floating mb-3">
                            <select name="course_id" class="form-control">
                                <option value="">-- Select Course --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('course_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="question" name="question" placeholder="Question" />
                            <label for="question">Question</label>
                            @error('question')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="option_a" name="option_a" placeholder="Option A" />
                            <label for="option_a">Option A</label>
                            @error('option_a')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="option_b" name="option_b" placeholder="Option B" />
                            <label for="option_b">Option B</label>
                            @error('option_b')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="option_c" name="option_c" placeholder="Option C" />
                            <label for="option_c">Option C</label>
                            @error('option_c')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="option_d" name="option_d" placeholder="Option D" />
                            <label for="option_d">Option D</label>
                            @error('option_d')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="correct_option" name="correct_option" placeholder="Correct Answer" />
                            <label for="correct_option">Correct Answer</label>
                            @error('correct_option')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-secondary">Add MCQ</button>
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