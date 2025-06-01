<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="<?= base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow p-4" style="width: 26rem;">
        <h2 class="text-center mb-4">Admin Login</h2>

        <!-- Display validation errors -->
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger"><?= validation_errors(); ?></div>
        <?php endif; ?>

        <!-- Display flash message -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <!-- Form -->
        <form method="post" action="<?= base_url('loginadmin/loginnow') ?>">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" placeholder="Email Address" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" placeholder="Password" name="password" id="password" class="form-control" required>
            </div>

            <!-- Lost Password Link -->
            <div class="mb-3 text-start">
                <a href="<?= base_url('lostmypassword'); ?>">Lost My Password</a>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>

        <!-- Back to customer -->
    <button class="btn btn-primary position-absolute" style="top: -90px; right: -350px; width: 180px; height: 60px;" onclick="window.location.href='<?= base_url('login'); ?>'">
        FOR CUSTOMER
    </button>
    </div>

    <script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
