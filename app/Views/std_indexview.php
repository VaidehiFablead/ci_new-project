<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-4">
        <h2 class="text-center mb-4">Student List</h2>

        <a href="<?= base_url('students') ?>" class="btn btn-success mb-3">Add New Student</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th hidden>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="studentTableBody">
                <!-- Data will load here using AJAX -->
            </tbody>
        </table>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    <script>
        // Load student data when page loads
        $(document).ready(function() {
            fetchStudents();
        });

        // Function to fetch and display all students
        function fetchStudents() {
            $.ajax({
                url: "<?= base_url('students/fetch') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let tableBody = '';
                    if (data.length > 0) {
                        $.each(data, function(index, student) {
                            tableBody += `
                            <tr>
                                <td hidden>${student.id}</td>
                                <td>${student.name}</td>
                                <td>${student.email}</td>
                                <td>${student.phone}</td>
                                <td>${student.address}</td>
                                <td>${student.gender}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm editStudent" data-id="${student.id}">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm deleteStudent" data-id="${student.id}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                        });
                    } else {
                        tableBody = '<tr><td colspan="6" class="text-center">No Records Found</td></tr>';
                    }
                    $('#studentTableBody').html(tableBody);
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to fetch student data.'
                    });
                }
            });
        }


        // Delete Student
        $(document).on('click', '.deleteStudent', function() {
            let studentId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('students/delete') ?>",
                        type: "POST",
                        data: {
                            id: studentId
                        },
                        success: function(response) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Student has been deleted.'
                            });
                            fetchStudents(); // refresh table
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Unable to delete student. Please try again.'
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>