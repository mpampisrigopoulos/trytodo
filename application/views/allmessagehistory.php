<!DOCTYPE html>
<html>
<head>
    <title>All Message History</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .message-text {
            display: none;
        }
        .message-card {
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-light pt-5">

    <!-- Logout Button -->
    <a href="<?= base_url('logout'); ?>" class="btn btn-outline-primary position-absolute top-0 start-0 m-3" title="Logout">
        <i class="fa fa-home"></i>
    </a>

    <div class="container mt-5">
        <h3 class="text-center mb-4">All Message History</h3>

        <!-- Repeat this block for each user -->
        <?php foreach ([$user1, $user2, $user3] as $i => $user): ?>
            <?php $index = $i + 1; ?>
            <div class="card shadow-sm mb-4">
                <div class="card-header d-flex justify-content-between align-items-center message-card" onclick="toggleContainer(<?= $index ?>)">
                    <strong>Customer:</strong> <?= $user->first_name ?><br>
                    <small><strong>Last Interaction:</strong> <?= ${'created_at' . $index} ?></small>
                </div>
                <div class="card-body message-text" id="container<?= $index ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>User Info</h5>
                            <p><strong>Name:</strong> <?= $user->first_name ?></p>
                            <p><strong>Last Name:</strong> <?= $user->last_name ?></p>
                            <p><strong>Email:</strong> <?= $user->email ?></p>
                        </div>
                        <div class="col-md-6">
                            <h5>Messages</h5>
                            <?php foreach ($user->messages as $message): ?>
                                <p><?= $message['message'] ?></p>
                                <p><?= $message['message2'] ?></p>
                                <p><?= $message['message3'] ?></p>
                                <hr>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Navigation Buttons -->
        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success" onclick="window.location.href='<?= base_url('adminprofile'); ?>'">My Profile</button>
            <button class="btn btn-info" onclick="window.location.href='<?= base_url('customers'); ?>'">Customers</button>
            <button class="btn btn-outline-dark disabled">All Message History</button>
        </div>
    </div>

    <script>
        function toggleContainer(id) {
            const box = document.getElementById("container" + id);
            box.style.display = box.style.display === "none" || box.style.display === "" ? "block" : "none";
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
