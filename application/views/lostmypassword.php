<!DOCTYPE html>
<html>
<head>
    <title>Lost Password</title>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome for home icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

    <!-- Back to home -->
    <a href="<?= base_url('login'); ?>" class="btn btn-outline-primary position-absolute top-0 start-0 m-3" title="Back to Login">
        <i class="fa fa-home"></i>
    </a>

    <div class="card shadow p-4" style="width: 32rem;">
        <!-- Title -->
        <h3 class="text-center mb-2">Lost Password?</h3>
        <p class="text-center text-muted mb-4">Enter your email and we will send you a reset link.</p>

        <!-- Display validation errors -->
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger"><?= validation_errors(); ?></div>
        <?php endif; ?>

        <!-- Display flash message -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php elseif ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <!-- Form -->
        <form method="post" action="<?= base_url('lostmypassword#'); ?>">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Remind Me</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
