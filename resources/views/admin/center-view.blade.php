@extends('layouts.admin')

@section('content')

<div class="card my-2">
    <div class="card-body">

        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="auth-header">
                    <h2 class="text-secondary mt-2">Center Details</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">

                <div class="mb-3">
                    <strong>Center Name:</strong>
                    {{ $center->name }}
                </div>

                <hr>

                <div class="mb-3">
                    <strong>Village:</strong> {{ $center->village }}
                </div>

                <div class="mb-3">
                    <strong>Taluko:</strong> {{ $center->taluko }}
                </div>

                <div class="mb-3">
                    <strong>District:</strong> {{ $center->district }}
                </div>

                <div class="mb-3">
                    <strong>Pin Code:</strong> {{ $center->pin_code }}
                </div>

                <hr>

                <div class="mb-3">
                    <strong>Phone:</strong> {{ $center->phone_number }}
                </div>

                <div class="mb-3">
                    <strong>Email:</strong> {{ $center->email }}
                </div>

                <div class="mb-3">
                    <strong>Coordinator Name:</strong> {{ $center->coordinator_name }}
                </div>

                <div class="mb-3">
                    <strong>Address:</strong><br>
                    {{ $center->address }}
                </div>

                <div class="mt-4">
                    <a href="{{ route('center-list') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
