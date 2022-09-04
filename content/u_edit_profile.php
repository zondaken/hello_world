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
        <div class="col-5">
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
            <div class="row alert alert-secondary">
                <div class="col">
                    <div class="row col">
                        <h1>Edit profile</h1>
                    </div>
                    <form method="post" action="?action=edit_profile" class="row col">
                        <div class="row mb-2">
                            <div class="col-4 text-start" class="w-100">Old password</div>
                            <div class="col">
                                <input type="password" name="passwordOld" required class="w-100">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 text-start" class="w-100">New password</div>
                            <div class="col">
                                <input type="password" name="passwordNew" required class="w-100">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 offset-4">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-4">
                                <a href="index.php" class="btn btn-danger w-100">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= Reusables::$bodyLower; ?>

</html>