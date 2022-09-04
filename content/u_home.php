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
            <div class="row">
                <div class="col alert alert-secondary">
                    <h1>hello_world</h1>
                    <div class="row m-2">
                        <div class="col-10 offset-1">
                            <a href="?action=u_show_users" class="w-100 btn btn-primary">Show users</a>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-10 offset-1">
                            <a href="?action=u_edit_profile" class="w-100 btn btn-primary">Edit profile</a>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-10 offset-1">
                            <a href="?action=u_logout" class="w-100 btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= Reusables::$bodyLower; ?>

</html>