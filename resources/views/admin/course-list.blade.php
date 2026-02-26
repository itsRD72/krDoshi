@extends('layouts.admin')

@section('content')

    <div class="card my-2">

        <!-- CARD HEADER -->
        <div class="card-header text-center bg-light pb-0">
            <h3 class="mb-0 text-secondary">Courses</h3>

            <div class="row justify-content-center">
                <div class="d-flex justify-content-center my-3">
                    <form method="GET" action="{{ route('course.index') }}" class="w-50">

                        <div class="input-group search-box">

                            <span class="input-group-text bg-white">
                                <i class="ti ti-search"></i>
                            </span>

                            <input type="text" name="search" id="search-input"
                                class="form-control custom-input border-start-0" placeholder="Search Here"
                                value="{{ request('search') }}">
                            <a href="{{ route('staff.index') }}" class="btn btn-secondary">
                                Reset
                            </a>

                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- CARD BODY -->
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-striped text-center align-middle">

                    <thead class="table-secondary">
                        <tr>
                            <th>Course Name</th>
                            <th>Max Students</th>
                            <th>Length (Weeks)</th>
                            <th>Running Batches</th>
                            <th>Sunday Available</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($courses as $item)
                            <tr>

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->max_student }}</td>
                                <td>{{ $item->length_in_week }}</td>
                                <td>{{ $item->running_batches }}</td>

                                <td>
                                    @if($item->is_avail_sunday)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-danger">No</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('course.edit', $item->id) }}" class="text-primary me-2">
                                        <i class="ti ti-pencil fs-4"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('course.delete', $item->id) }}"
                                        onclick="return confirm('Delete this course?')" class="text-danger">
                                        <i class="ti ti-trash fs-4"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

            <!-- PAGINATION -->
            <div class="d-flex justify-content-center mt-3">
                {{ $courses->links() }}
            </div>

        </div>
    </div>

@endsection
@section('scripts')
    <script>
        let timer;

        document.getElementById('search-input').addEventListener('keyup', function () {

            clearTimeout(timer);

            timer = setTimeout(() => {
                this.form.submit();
            }, 500);

        });
    </script>
@endsection