@extends('layouts.admin')

@section('content')

    <div class="container mt-4">
        <div class="text-center my-4">
            <h2 class="text-secondary mt-2">MCQs</h2>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered table-striped w-80 mx-auto text-center shadow-sm rounded-4">
            <thead class="table-secondary">
                <tr>
                    <th class="fw-bold">Course</th>
                    <th class="fw-bold">Question</th>
                    <th class="fw-bold">Option A</th>
                    <th class="fw-bold">Option B</th>
                    <th class="fw-bold">Option C</th>
                    <th class="fw-bold">Option D</th>
                    <th class="fw-bold">Correct Option</th>
                    <th class="fw-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mcqs as $item)
                    <tr>
                        <td>{{ $item->course_name }}</td>
                        <td>{{ $item->question }}</td>
                        <td>{{ $item->option_a }}</td>
                        <td>{{ $item->option_b }}</td>
                        <td>{{ $item->option_c }}</td>
                        <td>{{ $item->option_d }}</td>
                        <td>{{ $item->correct_option }}</td>
                        <td>
                            <a href="{{ route('editmcq-form', $item->id) }}" class="text-primary me-3">
                                <i class="ti ti-pencil fs-4"></i>
                            </a>

                            <a href="{{ route('delete-mcq', $item->id) }}"
                                onclick="return confirm('Are you sure you want to permanently delete this Batch?')"
                                class="text-danger">
                            <i class="ti ti-trash fs-4"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
@endsection