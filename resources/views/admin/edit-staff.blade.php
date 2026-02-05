@extends('layouts.admin')

@section('content')

  <div class="card my-2">
    <div class="card-body">
      <div class="row">
        <div class="d-flex justify-content-center">
          <div class="auth-header">
            <h2 class="text-secondary mt-2">Edit Staff</h2>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form action="{{ route('update-staff',$data->id) }}" method="post" class="mt-4">
            @csrf
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" value="{{ old('name', $data->name) }}" name="name" placeholder="Staff Name" />
              <label for="name">Staff Name</label>
              @error('name')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="role" value="{{ old('name', $data->role) }}" name="role" placeholder="Staff Role" />
              <label for="role">Staff Role</label>
              @error('role')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
              <label for="floatingInput1">Password</label>
              @error('password')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="conpassword" name="password_confirmation"
                placeholder="Confirm Password" />
              <label for="conpassword">Confirm Password</label>
              @error('password_confirmation')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>

            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-secondary">Update</button>
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