@extends('layouts.admin')

@section('content')

<div class="card my-2">
    <div class="card-body">

        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="auth-header">
                    <h2 class="text-secondary mt-2">Member Details</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">

                <div class="mb-3">
                    <strong>Full Name:</strong>
                    {{ $staff->first_name }} 
                    {{ $staff->middle_name }} 
                    {{ $staff->last_name }}
                </div>

                <div class="mb-3">
                    <strong>Center:</strong>
                    {{ $staff->name }}
                </div>

                <hr>

                <div class="mb-3">
                    <strong>Village:</strong> {{ $staff->village }}
                </div>

                <div class="mb-3">
                    <strong>Taluko:</strong> {{ $staff->taluko }}
                </div>

                <div class="mb-3">
                    <strong>District:</strong> {{ $staff->district }}
                </div>

                <div class="mb-3">
                    <strong>Phone:</strong> {{ $staff->phone_number }}
                </div>

                <div class="mb-3">
                    <strong>Email:</strong> {{ $staff->email }}
                </div>

                <div class="mb-3">
                    <strong>Address:</strong><br>
                    {{ $staff->address }}
                </div>

                <div class="mt-4">
                    <a href="{{ route('staff.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
