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


    <title>Add Batch</title>
</head>

<body>
    <div class="container my-4">
        <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card">
                <div class="card-header text-bg-secondary">
                    <h3>To Add New Batches</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Batch Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" placeholder="Enter Batch name here" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-form-label col-sm-3">Start Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="" />
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