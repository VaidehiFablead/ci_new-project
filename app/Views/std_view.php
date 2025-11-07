<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('students') ?>">Create Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('students/indexview') ?>">All Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= base_url('/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Student</h2>

        <!-- 🧾 Student Form -->
        <!-- <form id="studentForm">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Address</label>
                    <input type="text" id="address" name="address" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Gender</label><br>
                    <input type="radio" name="gender" value="Male" checked> Male
                    <input type="radio" name="gender" value="Female"> Female
                </div>
            </div>
            <button type="submit" class="btn btn-success" >Save</button>
        </form> -->
        <div class="card-body p-4">
            <form id="studentForm">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <i class="fa-solid fa-user"></i>
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm" placeholder="Enter name">
                </div>

                <div class="form-group mb-3">
                    <i class="fa-solid fa-envelope"></i>
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control form-control-sm" placeholder="Enter email">
                </div>

                <div class="form-group mb-3">
                    <i class="fa-solid fa-phone"></i>
                    <label class="form-label">Phone <span class="text-danger">*</span></label>
                    <input type="number" id="phone" name="phone" class="form-control form-control-sm" placeholder="Enter phone">
                </div>

                <div class="mb-3">
                    <i class="fa-solid fa-location-dot"></i>
                    <label class="form-label">Address</label>
                    <input type="text" id="address" name="address" class="form-control form-control-sm" placeholder="Enter address">
                </div>

                <div class="mb-3">
                    <i class="fa-solid fa-person-half-dress"></i>
                    <label class="form-label">Gender</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Male" checked>
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" value="Female">
                        <label class="form-check-label">Female</label>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-sm w-25 align-middle">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <!-- <script>
        $(document).ready(function() {
                    $('#studentForm').validate({
                            rules: {
                                name: {
                                    required: true,
                                    minlength: 3
                                },
                                email: {
                                    required: true,
                                    email: true
                                },
                                phone: {
                                    required: true,
                                    digits: true,
                                    minlength: 10,
                                    maxlength: 10
                                },
                                address: {
                                    required: true
                                },
                                gender: {
                                    required: true
                                }
                            },
                            messages: {
                                name: {
                                    required: "Please enter your full name",
                                    minlength: "Name must be at least 3 characters long"
                                },
                                email: {
                                    required: "Please enter your email",
                                    email: "Please enter a valid email address"
                                },
                                phone: {
                                    required: "Please enter your phone number",
                                    digits: "Please enter only numbers",
                                    minlength: "Phone number must be 10 digits",
                                    maxlength: "Phone number must be 10 digits"
                                },
                                address: {
                                    required: "Please enter your address"
                                },
                                gender: {
                                    required: "Please select your gender"
                                }
                            },
                            errorElement: 'span',
                            errorPlacement: function(error, element) {
                                error.addClass('invalid-feedback');
                                element.closest('.form-group, .col').append(error);
                            },
                            highlight: function(element) {
                                $(element).addClass('is-invalid');
                            },
                            unhighlight: function(element) {
                                $(element).removeClass('is-invalid');
                            },

                            submitHandler: function(form) {
                                e.preventDefault();

                                let formData = new FormData(form);
                                $.ajax({
                                    url: "<?= base_url('students/store') ?>",
                                    type: "POST",
                                    data: formData,
                                    dataType: "json",
                                    success: function(response) {
                                        if (response.status === 'success') {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Student Added Successfully!',
                                                showConfirmButton: true,
                                                confirmButtonText: 'OK'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    // ✅ Redirect to the page that shows all students
                                                    window.location.href = "<?= base_url('students/fetch') ?>";
                                                }
                                            });
                                            // Optionally reset the form
                                            $('#studentForm')[0].reset();
                                        }
                                    },
                                    error: function() {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Something went wrong!',
                                            text: 'Please try again.'
                                        });
                                    }
                                });
                            });
                    });
    </script> -->

    <script>
        $(document).ready(function() {

            $('#studentForm').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                },
                messages: {
                    name: {
                        required: "Please enter your full name",
                        minlength: "Name must be at least 3 characters long"
                    },
                    email: {
                        required: "Please enter your email",
                        email: "Please enter a valid email address"
                    },
                    phone: {
                        required: "Please enter your phone number",
                        digits: "Please enter only numbers",
                        minlength: "Phone number must be 10 digits",
                        maxlength: "Phone number must be 10 digits"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group, .col, .mb-3').append(error);
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                },

                // ✅ Corrected submit handler
                submitHandler: function(form) {
                    let formData = new FormData(form);

                    $.ajax({
                        url: "<?= base_url('students/store') ?>",
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        processData: false, // required for FormData
                        contentType: false, // required for FormData
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Student Added Successfully!',
                                    showConfirmButton: true,
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "<?= base_url('students/indexview') ?>";
                                    }
                                });

                                $('#studentForm')[0].reset();
                                $('#studentForm').find('.is-invalid').removeClass('is-invalid');
                            } else if (response.status === 'error') {
                                // Display backend validation errors if any
                                $.each(response.errors, function(key, val) {
                                    let input = $('[name="' + key + '"]');
                                    input.addClass('is-invalid');
                                    input.closest('.form-group, .col, .mb-3')
                                        .append('<span class="invalid-feedback">' + val + '</span>');
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Something went wrong!',
                                text: 'Please try again.'
                            });
                        }
                    });
                }
            });

        });
    </script>

</body>

</html>