<?php
session_reset();
session_unset();
session_destroy();
require(__DIR__ . "/header.php");
flash("Logged Out", "Info");
die(header("Location:login.php"));
?>