<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<!-- ✅ Navbar Section -->
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

<!-- ✅ Dashboard Content -->
<div class="container mt-5">
  <h1><?= session()->get('student_name') ?>, Welcome to Dashboard!</h1>
  <p class="text-muted">This is your dashboard page.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
