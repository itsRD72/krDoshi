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


    <title>Add Course</title>
</head>

<body>
    <div class="container my-4">
        <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card">
                <div class="card-header text-bg-secondary">
                    <h3>To Add New Courses</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Course Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" placeholder="Enter Course name here" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">About Course</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Course Time</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id=""
                                    placeholder="Enter Course Time (in week) here" />
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <label class="col-form-label col-sm-3">Sunday</label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sunday" id="sunday_on"
                                        value="on">
                                    <label class="form-check-label" for="sunday_on">ON</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sunday" id="sunday_off"
                                        value="off">
                                    <label class="form-check-label" for="sunday_off">OFF</label>
                                </div>
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