@extends('layouts.admin')

@section('content')

    <div class="card my-2">
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="auth-header">
                        <h2 class="text-secondary mt-2">Add Center</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('add-center') }}" method="post" class="mt-4">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Center Name" />
                            <label for="name">Center Name</label>
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="village" name="village" placeholder="Village" />
                            <label for="village">Village</label>
                            @error('village')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="taluko" name="taluko" placeholder="Taluko" />
                            <label for="taluko">Taluko</label>
                            @error('taluko')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="district" name="district" placeholder="District" />
                            <label for="district">District</label>
                            @error('district')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="pincode" name="pin_code" placeholder="Pin code" />
                            <label for="district">Pin code</label>
                            @error('pin_code')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="phonenumber" name="phone_number"
                                placeholder="Phone Number" />
                            <label for="phone_number">Phone Number</label>
                            @error('phone_number')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                            <label for="email">Email</label>
                            @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="coordinatorname" name="coordinator_name"
                                placeholder="Coordinator Name" />
                            <label for="coordinator_name">Coordinator Name</label>
                            @error('coordinator_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="address" name="address" placeholder="Address"
                                style="height: 100px"></textarea>
                            <label for="address">Address</label>

                            @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-secondary">Add Center</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
@endsection