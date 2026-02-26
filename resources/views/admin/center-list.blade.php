@extends('layouts.admin')

@section('content')

    <div class="card my-2">

        <!-- CARD HEADER -->
        <div class="card-header text-center bg-light pb-0">
            <h3 class="mb-0 text-secondary">Centers</h3>

            <div class="row justify-content-center">
                <div class="d-flex justify-content-center my-3">
                    <form method="GET" action="{{ route('center.index') }}" class="w-50">

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
                            <th>Center Name</th>
                            <th>Village</th>
                            <th>Taluko</th>
                            <th>District</th>
                            <th>Phone Number</th>
                            <th colspan="3">Action</th>
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
                                    <a href="{{ route('center.show', $item->id) }}" class="text-info me-2">
                                        <i class="ti ti-eye fs-4"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('center.edit', $item->id) }}" class="text-primary me-2">
                                        <i class="ti ti-pencil fs-4"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('center.delete', $item->id) }}"
                                        onclick="return confirm('Delete this center?')" class="text-danger">
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
                {{ $centers->links() }}
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