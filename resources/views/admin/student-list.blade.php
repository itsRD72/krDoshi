@extends('layouts.admin')

@section('content')

    <div class="container mt-4">
        <div class="text-center my-4">
            <h2 class="text-secondary mt-2">Student</h2>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered table-striped w-75 mx-auto text-center shadow-sm rounded-4">
            <thead class="table-secondary">
                <tr>
                    <th class="fw-bold">Course</th>
                    <th class="fw-bold">Batch</th>
                    <th class="fw-bold">Student Name</th>
                    <th class="fw-bold">Email</th>
                    <th class="fw-bold">Phone Number</th>
                    <th class="fw-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $item)
                    <tr>
                        <td>{{ $item->course_name }}</td>
                        <td>{{ $item->batch_name }}</td>
                        <td>{{ $item->first_name . ' ' . $item->last_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>
                        <a href="{{ route('view-student', $item->id) }}" class="text-primary me-3">
                                <i class="ti ti-eye fs-4"></i>
                            </a>
                            <a href="{{ route('editstudent-form', $item->id) }}" class="text-primary me-3">
                                <i class="ti ti-pencil fs-4"></i>
                            </a>

                            <a href="{{ route('delete-student', $item->id) }}"
                                onclick="return confirm('Are you sure you want to permanently delete this Staff?')"
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