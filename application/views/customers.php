<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .card-toggle {
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Top Bar with Logout -->
    <a href="<?= base_url('logout'); ?>" class="btn btn-outline-primary position-absolute top-0 start-0 m-3" title="Logout">
        <i class="fa fa-home"></i>
    </a>

    <div class="container py-5">
        <h2 class="text-center mb-5">Customers</h2>

        <?php for ($i = 1; $i <= 3; $i++): 
            $user = ${"user$i"};
            $created_at = ${"created_at$i"};
        ?>
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center card-toggle" onclick="toggleContainer(<?= $i ?>)">
                <div>
                    <strong>Customer:</strong> <?= htmlspecialchars($user->first_name); ?>
                </div>
                <div class="text-muted text-end">
                    <small>Submitted:<br><?= htmlspecialchars($created_at); ?></small>
                </div>
            </div>
            <div class="card-body" id="container<?= $i ?>" style="display: none;">
                <div class="row">
                    <div class="col-md-6">
                        <h5>User Info</h5>
                        <p><strong>Name:</strong> <?= htmlspecialchars($user->first_name); ?></p>
                        <p><strong>Last Name:</strong> <?= htmlspecialchars($user->last_name); ?></p>
                        <p><strong>Email:</strong> <?= htmlspecialchars($user->email); ?></p>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-center gap-2">
                        <a href="<?= base_url('deleteuser/index/' . $user->id); ?>" class="btn btn-danger w-100">Delete User</a>
                        <a href="<?= base_url('edituser/index/' . $user->id); ?>" class="btn btn-warning w-100">Edit User</a>
                        <a href="<?= base_url('usermessages/show_user_messages/' . $user->id); ?>" class="btn btn-info w-100 text-white">Show User Messages</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endfor; ?>

        <!-- Navigation Buttons -->
        <div class="d-flex justify-content-between mt-5">
            <a href="<?= base_url('adminprofile'); ?>" class="btn btn-success">My Profile</a>
            <button class="btn btn-outline-secondary disabled">Customers</button>
            <a href="<?= base_url('allmessagehistory'); ?>" class="btn btn-info">All Message History</a>
        </div>
    </div>

    <!-- Bootstrap + Toggle Script -->
    <script>
        function toggleContainer(id) {
            const container = document.getElementById('container' + id);
            container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
