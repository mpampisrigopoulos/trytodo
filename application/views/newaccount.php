<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="<?= base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- icons -->
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

     <!-- Back to login -->
    <a href="<?= base_url('login'); ?>" class="btn btn-outline-primary position-absolute top-0 start-0 m-3" title="Back to Login">
        <i class="fa fa-home"></i>
    </a>

    <div class="card shadow p-4" style="width: 30rem;">
        <h2 class="text-center mb-4">Registry Page</h2>

        <!-- Form -->
        <form method="post" action="#">
            <div class="mb-3">
                <label for="name" class="form-label">First Name:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="First Name" required>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name:</label>
                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirm" class="form-label">Confirm Password:</label>
                <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="Confirm Password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>

    <script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
