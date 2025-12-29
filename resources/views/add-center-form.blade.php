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


    <title>Add Center</title>
</head>

<body>
    <div class="container my-4">
        <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card">
                <div class="card-header text-bg-secondary">
                    <h3>To Add New Centers</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Center Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" placeholder="Enter Center name here" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-md-6 d-flex align-items-center mb-3 mb-md-0">
                                <label class="fw-semibold me-2 inline-label">Village</label>
                                <input type="text" class="form-control flex-grow-1" placeholder="Village">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <label class="fw-semibold me-2 inline-label">Taluka</label>
                                <input type="text" class="form-control flex-grow-1" placeholder="Taluka">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-md-6 d-flex align-items-center mb-3 mb-md-0">
                                <label class="fw-semibold me-2 inline-label">District</label>
                                <input type="text" class="form-control flex-grow-1" placeholder="District">
                            </div>
                            <div class="col-12 col-md-6 d-flex align-items-center">
                                <label class="fw-semibold me-2 inline-label">Pin-code</label>
                                <input type="text" class="form-control flex-grow-1" placeholder="Pin-code">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Mobile Number</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="" placeholder="Enter Mobile Number" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-form-label col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Coordinator Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" placeholder="Enter Coordinator Name" />
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