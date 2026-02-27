@extends('layouts.admin')

@section('content')

  <div class="card my-2">
    <div class="card-body">
      <div class="row">
        <div class="d-flex justify-content-center">
          <div class="auth-header">
            <h2 class="text-secondary mt-2">Add Member</h2>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <form action="{{ route('staff.store') }}" method="post" class="mt-4">
            @csrf
            <div class="form-floating mb-3">
              <select name="role" id="role" class="form-select" required @if(auth()->user()->role === 'coordinator')
              disabled @endif>
                <option value="">-- Select Role --</option>
                @if(auth()->user()->role === 'admin')
                  <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                  <option value="coordinator" {{ old('role') == 'coordinator' ? 'selected' : '' }}>Coordinator</option>
                @endif
                <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }} {{ auth()->user()->role == 'coordinator' ? 'selected' : '' }}>Staff</option>
              </select>
              @if(auth()->user()->role === 'coordinator')
                <input type="hidden" name="role" value="staff">
              @endif
              <label for="role">Select Role</label>

              @error('role')
                <div class="text-danger">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <select name="center_id" id="center_id" class="form-select" required
                @if(auth()->user()->role === 'coordinator') disabled @endif>
                <option value="">-- Select Center --</option>
                @foreach ($allCenters as $center)
                            <option value="{{ $center->id  }}" {{ (auth()->user()->role == 'coordinator' and
                  auth()->user()->center_id == $center->id) ? 'selected' : '' }}>{{ $center->name }}</option>
                @endforeach
              </select>

              @if(auth()->user()->role === 'coordinator')
                <input type="hidden" name="center_id" value="{{ auth()->user()->center_id }}">
              @endif
              <label>Select Center</label>
              @error('center_id')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3 admin-hide">
              <input type="text" class="form-control" id="first_name" value="{{ old('first_name') }}" name="first_name"
                placeholder="First Name" />
              <label for="first_name">First Name</label>
              @error('first_name')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3 admin-hide">
              <input type="text" class="form-control" id="middle_name" value="{{ old('middle_name') }}" name="middle_name"
                placeholder="Middle Name" />
              <label for="middle_name">Middle Name</label>
              @error('middle_name')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3 admin-hide">
              <input type="text" class="form-control" id="last_name" value="{{ old('last_name') }}" name="last_name"
                placeholder="Last Name" />
              <label for="last_name">Last Name</label>
              @error('last_name')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3 admin-hide">
              <input type="text" class="form-control" id="village" value="{{ old('village') }}" name="village"
                placeholder="Village" />
              <label for="village">Village</label>
              @error('village')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3 admin-hide">
              <input type="text" class="form-control" id="taluko" value="{{ old('taluko') }}" name="taluko"
                placeholder="Taluko" />
              <label for="taluko">Taluko</label>
              @error('taluko')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3 admin-hide">
              <input type="text" class="form-control" id="district" value="{{ old('district') }}" name="district"
                placeholder="District" />
              <label for="district">District</label>
              @error('district')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email"
                placeholder="Email" />
              <label for="email">Email</label>
              @error('email')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="tel" class="form-control" id="phone_number" value="{{ old('phone_number') }}"
                name="phone_number" placeholder="Phone Number" />
              <label for="phone_number">Phone Number</label>
              @error('phone_number')
                <div class="text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>
            <div class="form-floating mb-3 admin-hide">
              <textarea class="form-control" id="address" name="address" placeholder="Address"
                style="height: 100px">{{ old('address') }}</textarea>
              <label for="address">Address</label>

              @error('address')
                <div class="text-danger">
                  {{ $message }}
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
              <button type="submit" class="btn btn-secondary">Add Member</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

<script>
  document.addEventListener('DOMContentLoaded', function () {

    let roleSelect = document.getElementById('role');
    let centerSelect = document.getElementById('center_id');
    const allCenters = @json($allCenters);
    const centersWithoutCoordinator = @json($centersWithoutCoordinator);

    function loadCenters(role) {
      centerSelect.innerHTML = '<option value="">-- Select Center --</option>';

      let centers = role === 'coordinator'
        ? centersWithoutCoordinator
        : allCenters;

      centers.forEach(center => {
        centerSelect.innerHTML +=
          `<option value="${center.id}">${center.name}</option>`;
      });
    }
    let centerDiv = centerSelect.closest('.form-floating');
    let adminHideFields = document.querySelectorAll('.admin-hide');

    function toggleFields() {
      if (roleSelect.disabled) return;

      loadCenters(roleSelect.value);

      if (roleSelect.value === 'admin') {
        centerDiv.classList.add('d-none');
        centerSelect.value = '';
        centerSelect.removeAttribute('required');

        adminHideFields.forEach(el => {
          el.classList.add('d-none');
          let input = el.querySelector('input, textarea, select');
          if (input) input.removeAttribute('required');
        });
      } else {
        centerDiv.classList.remove('d-none');
        centerSelect.setAttribute('required', 'required');

        adminHideFields.forEach(el => {
          el.classList.remove('d-none');
          let input = el.querySelector('input, textarea, select');
          if (input) input.setAttribute('required', 'required');
        });
      }
    }

    roleSelect.addEventListener('change', toggleFields);
    toggleFields();
  });
</script>