@extends('layouts.admin')

@section('content')

    <div class="container mt-4">
        <div class="text-center my-4">
            <h2 class="text-secondary mt-2">Select Questions Here</h2>
        </div>
        <form action="{{ route('exam-print') }}" method="POST">
            @csrf
            @if($errors->has('selected_questions'))
                <div class="alert alert-danger">
                    Please select at least one question.
                </div>
            @endif
            <table class="table table-bordered table-striped w-80 mx-auto text-center shadow-sm rounded-4">
                <thead class="table-secondary">
                    <tr>
                        <th class="fw-bold">Select</th>
                        <th class="fw-bold">Question</th>
                        <th class="fw-bold">Option A</th>
                        <th class="fw-bold">Option B</th>
                        <th class="fw-bold">Option C</th>
                        <th class="fw-bold">Option D</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mcqs as $item)
                        <tr>
                            <td><input type="checkbox" class="form-check-input" name="selected_questions[]"
                                    value="{{ $item->id }}" />
                            </td>
                            <td>{{ $item->question }}</td>
                            <td>{{ $item->option_a }}</td>
                            <td>{{ $item->option_b }}</td>
                            <td>{{ $item->option_c }}</td>
                            <td>{{ $item->option_d }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <input type="hidden" name="center_id" value="{{ $center->id }}">
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-secondary">
                    Continue
                </button>
            </div>
        </form>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
@endsection