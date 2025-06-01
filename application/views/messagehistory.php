<!DOCTYPE html>
<html>
<head>
    <title>Message History</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .message-card {
            cursor: pointer;
        }
        .message-text {
            display: none;
        }
    </style>
</head>
<body class="bg-light d-flex justify-content-center align-items-start pt-5">

    <!-- Logout Button -->
    <a href="<?= base_url('logout'); ?>" class="btn btn-outline-primary position-absolute top-0 start-0 m-3" title="Logout">
        <i class="fa fa-home"></i>
    </a>

    <div class="container mt-5">

        <!-- Title -->
        <h3 class="text-center mb-4">Message History</h3>

        <!-- Message 1 -->
        <div class="card shadow-sm mb-3 message-card" onclick="toggleMessage(1)">
            <div class="card-body d-flex justify-content-between align-items-center">
                <strong>Message 1</strong>
                <small class="text-muted"><?= $created_at; ?></small>
            </div>
            <div class="card-body message-text" id="messageBox1">
                <?= $message; ?>
            </div>
        </div>

        <!-- Message 2 -->
        <div class="card shadow-sm mb-3 message-card" onclick="toggleMessage(2)">
            <div class="card-body d-flex justify-content-between align-items-center">
                <strong>Message 2</strong>
                <small class="text-muted"><?= $created_at; ?></small>
            </div>
            <div class="card-body message-text" id="messageBox2">
                <?= $message2; ?>
            </div>
        </div>

        <!-- Message 3 -->
        <div class="card shadow-sm mb-3 message-card" onclick="toggleMessage(3)">
            <div class="card-body d-flex justify-content-between align-items-center">
                <strong>Message 3</strong>
                <small class="text-muted"><?= $created_at; ?></small>
            </div>
            <div class="card-body message-text" id="messageBox3">
                <?= $message3; ?>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success" onclick="window.location.href='<?= base_url('myprofile'); ?>'">My Profile</button>
            <button class="btn btn-info" onclick="window.location.href='<?= base_url('submitenewmessage'); ?>'">Submit New Message</button>
            <button class="btn btn-outline-dark disabled">Message History</button>
        </div>
    </div>

    <!-- JS -->
    <script>
        function toggleMessage(id) {
            const box = document.getElementById("messageBox" + id);
            box.style.display = box.style.display === "none" || box.style.display === "" ? "block" : "none";
        }
    </script>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
