<!DOCTYPE html>
<html>
<head>
    <title>Submit New Message</title>
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
        <div class="card mx-auto shadow-lg" style="max-width: 800px;">
            <div class="card-body">
                <!-- Page Title -->
                <h3 class="card-title text-center mb-4">Submit New Message</h3>

                <!-- Message Form -->
                <form method="post" action="<?= base_url('submitenewmessage/submit_message'); ?>">

                    <!-- Message Textarea -->
                    <div class="mb-4">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="10" placeholder="Type your message here..." required></textarea>
                    </div>

                    <!-- Upload Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>

                <!-- Navigation Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-success" onclick="window.location.href='<?= base_url('myprofile'); ?>'">My Profile</button>
                    <button class="btn btn-outline-dark disabled">Submit New Message</button>
                    <button class="btn btn-info" onclick="window.location.href='<?= base_url('messagehistory'); ?>'">Message History</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
