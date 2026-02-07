@extends('layouts.admin')

@section('content')

    <div class="container mt-4">
        <div class="text-center my-4">
            <h2 class="text-secondary mt-2">Courses</h2>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered table-striped w-75 mx-auto text-center shadow-sm rounded-4">
            <thead class="table-secondary">
                <tr>
                    <th class="fw-bold">Course Id</th>
                    <th class="fw-bold">Course Name</th>
                    <th class="fw-bold">Max Student</th>
                    <th class="fw-bold">Length(in week)</th>
                    <th class="fw-bold">Available on Sunday</th>
                    <th class="fw-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->max_student }}</td>
                        <td>{{ $item->length_in_week }}</td>
                        <td>
                            @if($item->is_avail_sunday)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-danger">No</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('edit-course', $item->id) }}" class="text-primary me-3">
                                <i class="ti ti-pencil fs-4"></i>
                            </a>

                            <a href="{{ route('delete-course', $item->id) }}"
                                onclick="return confirm('Are you sure you want to permanently delete this course?')"
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