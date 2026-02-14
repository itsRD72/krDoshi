@extends('layouts.admin')

@section('content')
    <div class="container my-4">
        <div class="text-end mb-3">
            <button class="btn btn-primary" onclick="window.print()">Print Paper</button>
        </div>

        <div class="card shadow-sm p-4" id="exam-paper">
            <h2 class="text-center fw-bold mb-4">{{ $center->name ?? 'Institute Name' }}</h2>

            <div class="mb-4">
                <div class="row mb-2">
                    <div class="col-md-4">Student Name: ____________</div>
                    <div class="col-md-4">Roll No: ____________</div>
                    <div class="col-md-4">Course: {{ $course->name ?? 'Course Name' }}</div>
                </div>
            </div>

            <div class="mb-4">
                @foreach($mcqs as $index => $question)

                    <div class="question-block">

                        <p class="fw-bold">
                            Q{{ $index + 1 }}. {{ $question->question }}
                        </p>

                        <div class="options">
                            <div><input type="checkbox"> (A) {{ $question->option_a }}</div>
                            <div><input type="checkbox"> (B) {{ $question->option_b }}</div>
                            <div><input type="checkbox"> (C) {{ $question->option_c }}</div>
                            <div><input type="checkbox"> (D) {{ $question->option_d }}</div>
                        </div>

                    </div>

                @endforeach
            </div>

            <div class="mt-5 d-flex justify-content-between">
                <div>Examiner Signature: ____________</div>
                <div><strong>Good Luck!</strong></div>
            </div>
        </div>
    </div>

    <style>
    .question-block {
        margin-bottom: 40px;
    }

    .options {
        margin-left: 25px;
        margin-top: 10px;
    }
</style>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
@endsection