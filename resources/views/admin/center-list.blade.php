@extends('layouts.admin')

@section('content')

    <div class="container mt-4">
        <div class="text-center my-4">
            <h2 class="text-secondary mt-2">Center</h2>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered table-striped w-80 mx-auto text-center shadow-sm rounded-4">
            <thead class="table-secondary">
                <tr>
                    <th class="fw-bold">Center Name</th>
                    <th class="fw-bold">Village</th>
                    <th class="fw-bold">Taluko</th>
                    <th class="fw-bold">District</th>
                    <th class="fw-bold">Phone Number</th>
                    <th class="fw-bold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($centers as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->village }}</td>
                        <td>{{ $item->taluko }}</td>
                        <td>{{ $item->district }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>
                            <a href="{{ route('view-center', $item->id) }}" class="text-primary me-3">
                                <i class="ti ti-eye fs-4"></i>
                            </a>

                            <a href="{{ route('editcenter-form', $item->id) }}" class="text-primary me-3">
                                <i class="ti ti-pencil fs-4"></i>
                            </a>

                            <a href="{{ route('delete-center', $item->id) }}"
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