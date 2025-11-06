<style>
    .gradient-custom-3 {
        background: #84fab0;
        background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));
        background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
    }

    .gradient-custom-4 {
        background: #84fab0;
        background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
        background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
        margin: 30px 0px;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Student Login</h2>

                            <form method="post" id="loginForm">
                                <?= csrf_field() ?>


                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" name="email" id="email" id="form3Example3cg" class="form-control" />
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                    <small id="emailError" class="text-danger"></small>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" name="password" id="password" id="form3Example4cg" class="form-control" />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                    <small id="passwordError" class="text-danger"></small>
                                </div>


                                <div class="d-flex justify-content-center">
                                    <input type="submit" name="Login" value="Login" data-mdb-button-init
                                        data-mdb-ripple-init class="btn btn-success btn-block  gradient-custom-4 text-body">
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            let email = document.getElementById('email').value.trim();
            let password = document.getElementById('password').value.trim();
            let emailError = document.getElementById('emailError');
            let passwordError = document.getElementById('passwordError');

            let isValid = true;

            // Clear previous errors
            emailError.textContent = '';
            passwordError.textContent = '';

            // Email validation
            if (email === '') {
                emailError.textContent = 'Email is required.';
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                emailError.textContent = 'Please enter a valid email address.';
                isValid = false;
            }

            // Password validation
            if (password === '') {
                passwordError.textContent = 'Password is required.';
                isValid = false;
            } else if (password.length < 6) {
                passwordError.textContent = 'Password must be at least 6 characters long.';
                isValid = false;
            }

            // Stop form submission if invalid
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Login Successful!',
                text: '<?= session()->getFlashdata('success') ?>',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= base_url('dashboard') ?>"; // redirect to login page
                }
            });
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed!',
                text: '<?= session()->getFlashdata('error') ?>',
                confirmButtonText: 'Try Again'
            });
        </script>
    <?php endif; ?>

</section>