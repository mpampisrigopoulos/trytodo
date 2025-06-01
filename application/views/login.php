<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

    <!-- Login Card -->
    <div class="card shadow p-4 position-relative" style="width: 28rem;">
        <h2 class="text-center mb-4">LOGIN INTO YOUR ACCOUNT</h2>

        <!-- Section Title -->
        <h4 class="text-center mb-3">CUSTOMER</h4>

        <!-- Validation Errors -->
        <?php if (validation_errors()): ?>
            <div class="alert alert-warning" role="alert">
                <?= validation_errors() ?>
            </div>
        <?php endif; ?>

        <!-- Flash Error Message -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form method="post" action="<?= base_url('login/loginnow') ?>">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>

        <!-- Back Links -->
        <div class="text-center mt-3">
            <!-- Lost Password -->
            <a href="<?= base_url('lostmypassword') ?>">Lost My Password</a>
        </div>

        <div class="text-center mt-2">
            <!-- Create Account -->
            <a href="<?= base_url('newaccount') ?>">Create New Account</a>
        </div>

        <!-- Back to admin -->
        <button class="btn btn-primary position-absolute" style="top: -90px; right: -350px; width: 180px; height: 60px;" onclick="window.location.href='<?= base_url('loginadmin') ?>'">
            FOR ADMIN
        </button>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
