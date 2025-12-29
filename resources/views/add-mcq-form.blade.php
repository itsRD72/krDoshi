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
    <title>Add MCQ</title>
</head>

<body>
    <div class="container my-4">

        <div class="card mb-3">
            <div class="card-header text-bg-secondary text-center">
                <h1 class="mb-0">Add Multiple Choice Questions</h1>
            </div>
        </div>

        <form action="" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-12">
                    <label class="form-label">Course</label>
                    <select class="form-select" name="course[]">
                        <option selected disabled>Select Course</option>
                        <option value="java">Java</option>
                        <option value="php">PHP</option>
                        <option value="angular">Angular</option>
                    </select>
                </div>
            </div>
            <div class="row g-3">
                <!-- Question Block Start -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card p-3 h-100">
                        <div class="row mb-2">
                            <div class="col-12">
                                <label class="form-label">Question</label>
                                <textarea class="form-control" placeholder="Enter Question here"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="form-label">Option A</label>
                                <input type="text" class="form-control" name="option_a[]" placeholder="Option A">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Option B</label>
                                <input type="text" class="form-control" name="option_b[]" placeholder="Option B">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="form-label">Option C</label>
                                <input type="text" class="form-control" name="option_c[]" placeholder="Option C">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Option D</label>
                                <input type="text" class="form-control" name="option_d[]" placeholder="Option D">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Correct Answer</label>
                                <select class="form-select" name="correct_answer[]">
                                    <option selected disabled>Select Answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Question Block End -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card p-3 h-100">
                        <div class="row mb-2">
                            <div class="col-12">
                                <label class="form-label">Question</label>
                                <textarea class="form-control" placeholder="Enter Question here"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="form-label">Option A</label>
                                <input type="text" class="form-control" name="option_a[]" placeholder="Option A">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Option B</label>
                                <input type="text" class="form-control" name="option_b[]" placeholder="Option B">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="form-label">Option C</label>
                                <input type="text" class="form-control" name="option_c[]" placeholder="Option C">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Option D</label>
                                <input type="text" class="form-control" name="option_d[]" placeholder="Option D">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Correct Answer</label>
                                <select class="form-select" name="correct_answer[]">
                                    <option selected disabled>Select Answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card p-3 h-100">
                        <div class="row mb-2">
                            <div class="col-12">
                                <label class="form-label">Question</label>
                                <textarea class="form-control" placeholder="Enter Question here"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="form-label">Option A</label>
                                <input type="text" class="form-control" name="option_a[]" placeholder="Option A">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Option B</label>
                                <input type="text" class="form-control" name="option_b[]" placeholder="Option B">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="form-label">Option C</label>
                                <input type="text" class="form-control" name="option_c[]" placeholder="Option C">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Option D</label>
                                <input type="text" class="form-control" name="option_d[]" placeholder="Option D">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Correct Answer</label>
                                <select class="form-select" name="correct_answer[]">
                                    <option selected disabled>Select Answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card p-3 h-100">
                        <div class="row mb-2">
                            <div class="col-12">
                                <label class="form-label">Question</label>
                                <textarea class="form-control" placeholder="Enter Question here"></textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="form-label">Option A</label>
                                <input type="text" class="form-control" name="option_a[]" placeholder="Option A">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Option B</label>
                                <input type="text" class="form-control" name="option_b[]" placeholder="Option B">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="form-label">Option C</label>
                                <input type="text" class="form-control" name="option_c[]" placeholder="Option C">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Option D</label>
                                <input type="text" class="form-control" name="option_d[]" placeholder="Option D">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Correct Answer</label>
                                <select class="form-select" name="correct_answer[]">
                                    <option selected disabled>Select Answer</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Duplicate the above block as many times as needed -->
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-secondary">Add Questions</button>
                <button type="reset" class="btn btn-danger">Clear All</button>
            </div>
        </form>
    </div>

</body>

</html>