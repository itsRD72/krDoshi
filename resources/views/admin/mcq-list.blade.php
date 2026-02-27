@extends('layouts.admin')

@section('content')

    <div class="card my-2">

        <!-- CARD HEADER -->
        <div class="card-header bg-light text-center pb-0">

            <!-- HEADING -->
            <h3 class="mb-3 text-secondary">
                MCQ List
            </h3>

            <!-- COURSE FILTER -->
            <form method="GET" action="{{ route('mcq.index') }}" class="d-flex justify-content-center">

                <select name="course_id" class="form-select w-25 mb-1" onchange="this.form.submit()">

                    <option value="">Select Course</option>

                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach

                </select>


            </form>

        </div>

        <!-- CARD BODY -->
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(request('course_id'))

                @if($mcqs->count() > 0)

                    <form method="POST" action="{{ route('mcq.paper') }}" target="_blank">

                        @csrf

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped text-center align-middle">

                                <thead class="table-secondary">
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="selectAll">
                                        </th>
                                        <th>Question</th>
                                        <th>A</th>
                                        <th>B</th>
                                        <th>C</th>
                                        <th>D</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($mcqs as $item)
                                        <tr>

                                            <td>
                                                <input type="checkbox" class="mcqCheckbox" name="selected_mcqs[]"
                                                    value="{{ $item->id }}">
                                            </td>

                                            <td>{{ $item->question }}</td>

                                            <td class="{{ $item->correct_option == 'A' ? 'table-success fw-bold' : '' }}">
                                                {{ $item->option_a }}
                                            </td>

                                            <td class="{{ $item->correct_option == 'B' ? 'table-success fw-bold' : '' }}">
                                                {{ $item->option_b }}
                                            </td>

                                            <td class="{{ $item->correct_option == 'C' ? 'table-success fw-bold' : '' }}">
                                                {{ $item->option_c }}
                                            </td>

                                            <td class="{{ $item->correct_option == 'D' ? 'table-success fw-bold' : '' }}">
                                                {{ $item->option_d }}
                                            </td>

                                            <td>
                                                <a href="{{ route('mcq.edit', $item->id) }}" class="text-primary me-2">
                                                    <i class="ti ti-pencil fs-4"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('mcq.delete', $item->id) }}"
                                                    onclick="return confirm('Delete this MCQ?')" class="text-danger">
                                                    <i class="ti ti-trash fs-4"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>

                        <!-- CREATE PAPER BUTTON -->
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-secondary btn-sm">
                                Create Paper
                            </button>
                        </div>

                    </form>

                @else

                    <div class="alert alert-warning text-center">
                        No MCQs found for this course.
                    </div>

                @endif

            @else

                <div class="alert alert-info text-center">
                    Please select a course to view MCQs.
                </div>

            @endif

        </div>

    </div>

@endsection
@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const selectAll = document.getElementById("selectAll");
        const checkboxes = document.querySelectorAll(".mcqCheckbox");
        const selectedCount = document.getElementById("selectedCount");

        if (!selectedCount) return; // Stop if not on MCQ page

        function updateCount() {
            let count = 0;
            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) count++;
            });
            selectedCount.textContent = count;
        }

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener("change", updateCount);
        });

        if (selectAll) {
            selectAll.addEventListener("change", function () {
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = selectAll.checked;
                });
                updateCount();
            });
        }

    });
</script>
@endsection