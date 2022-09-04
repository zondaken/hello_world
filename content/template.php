<?php
require_once __DIR__ . "/reusables/config.php";
(isset($head) and isset($bodyUpper) and isset($layoutUpper) and isset($layoutLower) and isset($bodyLower)) or die('html templates not found in content/reusables/action.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>hello_world</title>
    <?= $head; ?>
</head>

<?= $bodyUpper; ?>
<?= $layoutUpper; ?>



<?= $layoutLower; ?>
<?= $bodyLower; ?>

</html>