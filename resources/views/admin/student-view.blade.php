@extends('layouts.admin')

@section('content')

<div class="card my-2">
    <div class="card-body">

        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="auth-header">
                    <h2 class="text-secondary mt-2">Student Details</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">

                <div class="mb-3">
                    <strong>Full Name:</strong>
                    {{ $student->first_name }} 
                    {{ $student->middle_name }} 
                    {{ $student->last_name }}
                </div>

                <div class="mb-3">
                    <strong>Course:</strong>
                    {{ $student->course_name }}
                </div>

                <div class="mb-3">
                    <strong>Batch:</strong>
                    {{ $student->batch_name }}
                </div>

                <hr>

                <div class="mb-3">
                    <strong>Village:</strong> {{ $student->village }}
                </div>

                <div class="mb-3">
                    <strong>Taluko:</strong> {{ $student->taluko }}
                </div>

                <div class="mb-3">
                    <strong>District:</strong> {{ $student->district }}
                </div>

                <div class="mb-3">
                    <strong>Phone:</strong> {{ $student->phone_number }}
                </div>

                <div class="mb-3">
                    <strong>Parent Phone:</strong> {{ $student->parent_number }}
                </div>

                <div class="mb-3">
                    <strong>Email:</strong> {{ $student->email }}
                </div>

                <div class="mb-3">
                    <strong>Parent Email:</strong> {{ $student->parent_email }}
                </div>

                <div class="mb-3">
                    <strong>Address:</strong><br>
                    {{ $student->address }}
                </div>

                <div class="mt-4">
                    <a href="{{ route('student-list-page') }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
