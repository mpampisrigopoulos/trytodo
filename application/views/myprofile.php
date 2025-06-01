<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <!-- Back Home Button -->
    <a href="<?= base_url('logout'); ?>" class="btn btn-outline-primary position-absolute top-0 start-0 m-3" title="Logout">
        <i class="fa fa-home"></i>
    </a>

    <div class="container">
        <!-- Notification Message -->
        <?php if ($this->session->flashdata('success_message')): ?>
            <div class="alert alert-success text-center" role="alert">
                <?= $this->session->flashdata('success_message'); ?>
            </div>
        <?php endif; ?>

        <!-- Form Card -->
        <div class="card mx-auto shadow-lg" style="max-width: 600px;">
            <div class="card-body">
                <!-- Page Title -->
                <h3 class="card-title text-center mb-4">My Profile</h3>

                <!-- Profile Update Form -->
                <form method="post" action="<?= base_url('myprofile/update_profile'); ?>">

                    <!-- First Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="First Name">
                    </div>

                    <!-- Last Name -->
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>

                    <!-- Update Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <!-- My Profile (disabled to indicate current page) -->
                    <button class="btn btn-outline-secondary disabled">My Profile</button>

                    <!-- Submit New Message -->
                    <button class="btn btn-success" onclick="window.location.href='<?= base_url('submitenewmessage'); ?>'">Submit New Message</button>

                    <!-- Message History -->
                    <button class="btn btn-info" onclick="window.location.href='<?= base_url('messagehistory'); ?>'">Message History</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JS for Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
