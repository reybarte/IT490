<?php
require(__DIR__ . "/MQPublish.inc.php");
require(__DIR__ . "/header.php");
?>
<?php
if (!is_logged_in()) {
    die(header("Location: login.php"));
}
?>
Welcome <?php echo $_SESSION["user"]["email"]; ?>
<?php require(__DIR__ . "/flash.php"); ?>