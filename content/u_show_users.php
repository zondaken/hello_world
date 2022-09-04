<?php

require_once __DIR__ . "/../php/config.php";
require_once __DIR__ . "/reusables/config.php";

$message = "";
$messageType = "";

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

if (isset($_SESSION['message_type'])) {
    $messageType = $_SESSION['message_type'];
    unset($_SESSION['message_type']);
}

$messageCssClass = "";

switch ($messageType) {
    case 'success':
        $messageCssClass = "success";
        break;
    case 'error':
        $messageCssClass = "danger";
        break;
}

$users = Config::$dbHandler->GetAllUsers();

?>
<!DOCTYPE html>
<html>
<head>
    <title>hello_world</title>
    <?= Reusables::$head; ?>
</head>

<body class="vh-100">

<div class="content container h-100 text-center">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-4">
            <div class="row">
                <div class="col alert alert-warning">
                    Action = <?= Config::$action; ?>
                </div>
            </div>
            <?php if (!empty($messageType)) : ?>
                <div class="row">
                    <div class="col alert alert-<?= $messageCssClass; ?>">
                        <?php echo $message; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row alert alert-secondary text-start">
                <div class="col">
                    <div class="row col">
                        <h1>All users</h1>
                    </div>
                    <div class="row fw-bold">
                        <div class="col">ID</div>
                        <div class="col">Name</div>
                    </div>
                    <?php foreach($users as $user): ?>
                    <div class="row">
                        <div class="col"><?= $user['id']; ?></div>
                        <div class="col"><?= $user['username']; ?></div>
                    </div>
                    <?php endforeach; ?>
                    <div class="row mt-3">
                        <div class="col">
                            <a href="." class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= Reusables::$bodyLower; ?>

</html>