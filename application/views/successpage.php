<!DOCTYPE html>
<html>
<head>
    <title>Registry Success</title>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

    <!-- Back to login -->
    <a href="<?= base_url('login'); ?>" class="btn btn-outline-primary position-absolute top-0 start-0 m-3" title="Back to Login">
        <i class="fa fa-home"></i>
    </a>

    <div class="card shadow p-5 text-center" style="width: 30rem;">
        <!-- Title -->
        <h2 class="mb-4 text-success">✔ Registry Page</h2>

        <!-- Message -->
        <p class="fs-5 mb-3">Check your email for the verification link to activate your account.</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
