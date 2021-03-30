<?php

?>

<style>
    /*For NavBar hover effect on Profile dropdown*/
    .dropdown:hover .dropdown-menu {
        display: block !important;
        max-width: 100px;
        min-width: 100px;
    }

    .dropdown-menu {
        margin-top: 0 !important;
    }
</style>

<!-- NavBar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">GPU Guru</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productlist.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Statistics</a>
                </li>
                <div class="nav-item dropdown ml-auto">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profile</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="login.php" class="dropdown-item">Login</a>
                        <a href="#" class="dropdown-item">Logout</a>
                        <a href="register.php" class="dropdown-item">Register</a>
                        <a href="admin.php" class="dropdown-item">Admin</a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</nav>