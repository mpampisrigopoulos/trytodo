<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .form-control {
            margin-bottom: 1rem;
        }
        .notification {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #28a745;
            color: white;
            padding: 15px 25px;
            border-radius: 5px;
            display: none;
            z-index: 1000;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Logout Button -->
    <a href="<?= base_url('logout'); ?>" class="btn btn-outline-primary position-absolute top-0 start-0 m-3" title="Logout">
        <i class="fa fa-home"></i>
    </a>

    <div class="container d-flex flex-column align-items-center justify-content-center vh-100">
        <!-- Card -->
        <div class="card shadow p-4 w-100" style="max-width: 500px;">
            <h4 class="mb-4 text-center">Edit User</h4>
            <form method="post" action="<?= base_url('edituser/update_user_info'); ?>">
                <input type="hidden" name="user_id" value="<?= $user->id; ?>">

                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="<?= $user->first_name; ?>">

                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="<?= $user->last_name; ?>">

                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= $user->email; ?>">

                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" value="<?= $user->password; ?>">

                <div class="d-flex justify-content-end">
                    <input type="submit" class="btn btn-primary" value="Update User">
                </div>
            </form>
             <!-- Navigation Buttons -->
        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success" onclick="window.location.href='<?= base_url('adminprofile'); ?>'">My Profile</button>
            <button class="btn btn-info" onclick="window.location.href='<?= base_url('customers'); ?>'">Customers</button>
            <button class="btn btn-info text-white" onclick="window.location.href='<?= base_url('allmessagehistory'); ?>'">All Message History</button>
        </div>
        </div>

       
    </div>

    <!-- Notification -->
    <?php if ($this->session->flashdata('success_message')): ?>
        <div class="notification" id="notification">
            <?= $this->session->flashdata('success_message'); ?>
        </div>
    <?php endif; ?>

    <!-- JS -->
    <script>
        // Show notification
        window.addEventListener('load', function() {
            var notification = document.getElementById('notification');
            if (notification) {
                notification.style.display = 'block';
                setTimeout(function() {
                    notification.style.display = 'none';
                }, 3000);
            }
        });
    </script>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
