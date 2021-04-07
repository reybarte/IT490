<?php

function logout() {
    session_reset();
    session_unset();
    session_destroy();
    echo "<script>alert('Logout Success')</script>";
    echo "<script>window.location = 'login.php'; </script>";
}
?>