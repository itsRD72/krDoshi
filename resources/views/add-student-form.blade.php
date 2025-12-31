<!-- Courses (admin only)
fields: name, max number of students, length (in weeks), is available on sunday? -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        .inline-label {
            width: 80px;
        }
    </style>


    <title>Add student</title>
</head>

<body>
    <div class="container my-4">
        <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card">
                <div class="card-header text-bg-secondary">
                    <h3>To Add New Student</h3>
                </div>
                <div class="card-body">
                    <form action="/students" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">First Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="first_name" id="" placeholder="Enter First name here" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Middle Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" name="middle_name" placeholder="Enter Middle name here" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" name="last_name" placeholder="Enter Last name here" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-form-label col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email here" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"  name="address"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-md-6 d-flex align-items-center mb-3 mb-md-0">
                                <label class="fw-semibold me-2 inline-label">Village</label>
                                <input type="text" class="form-control flex-grow-1" name="village" placeholder="Village">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <label class="fw-semibold me-2 inline-label">Taluka</label>
                                <input type="text" class="form-control flex-grow-1" name="taluko" placeholder="Taluka">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-md-6 d-flex align-items-center mb-3 mb-md-0">
                                <label class="fw-semibold me-2 inline-label">District</label>
                                <input type="text" class="form-control flex-grow-1" name="district" placeholder="District">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <label class="fw-semibold me-2 inline-label">Pin-code</label>
                                <input type="text" class="form-control flex-grow-1" name="pin_code" placeholder="Pin-code">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Mobile Number</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="" name="phone_number" placeholder="Enter Mobile Number" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-form-label col-sm-3">Parent's Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="parent_email" placeholder="Enter Email here" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Paresnt's Mobile Number</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="" name="parent_number" placeholder="Enter Mobile Number" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="batch" class="col-form-label col-sm-3">Batch</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="batch" name="batch_id">
                                    <option selected disabled>Select Batch</option>
                                    <option value="1">Morning</option>
                                    <option value="2">Afternoon</option>
                                    <option value="3">Evening</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-secondary">Add</button>
                            <button type="reset" class="btn btn-danger">Clear all</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>