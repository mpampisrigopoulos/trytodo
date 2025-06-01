<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <!-- Κουμπί Logout -->
    <a href="<?= base_url('logout'); ?>" class="btn btn-outline-primary position-absolute top-0 start-0 m-3" title="Logout">
        <i class="fa fa-home"></i>
    </a>

    <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
        <div class="card-body text-center">
            <h4 class="card-title mb-4">
                You are about to delete customer:
                <span class="text-danger d-block"><?= $user1->first_name; ?></span>
            </h4>
            <p class="mb-4">Are you sure you want to proceed?</p>

            <div class="d-flex justify-content-around">
                <a href="<?= base_url('deleteuser/delete/'.$user_id); ?>" class="btn btn-danger">Yes, Delete</a>
                <a href="<?= base_url('customers'); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
