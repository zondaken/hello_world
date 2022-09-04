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

$username = "";

if (isset($_SESSION['form_username'])) {
    $username = $_SESSION['form_username'];
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
            <div class="row">
                <div class="col alert alert-secondary">
                    <form method="post" action="?action=register" class="col-12">
                        <h1>Register</h1>
                        <div class="row mb-2">
                            <div class="col-5 text-start">
                                Username
                            </div>
                            <div class="col">
                                <input type="text" name="username" value="<?= $username; ?>" required class="w-100">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 text-start" class="w-100">
                                Password
                            </div>
                            <div class="col">
                                <input type="password" name="password" required class="w-100">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-5 text-start">
                                Repeat password
                            </div>
                            <div class="col">
                                <input type="password" name="passwordRepeat" required class="w-100">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4 offset-5">
                                <button type="submit" class="btn btn-primary w-100">Register</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 offset-5">
                                <a href="." class="btn btn-danger w-100">Back</a>
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