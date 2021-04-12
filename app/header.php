<?php
$currentURL = ["index" => 0, "prodList" => 0, "login" => 0, "register" => 0, "admin" => 0, "490IconPic" => 0, "tracking" => 0];
$currentURL[pathinfo($_SERVER["REQUEST_URI"], PATHINFO_FILENAME)] = 1;

$prodPage = pathinfo(pathinfo($_SERVER["REQUEST_URI"], PATHINFO_DIRNAME), PATHINFO_FILENAME) == "products" ? 1 : 0;

$loggedIn = isset($_SESSION["user"]) ? 1 : 0;
$clientRole = $_SESSION["user"]["role"] == 'client' ? 1 : 0;
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
				<li class="nav-item <?php echo $currentURL['index'] ? 'active' : '' ?> ">
					<a class="nav-link" href="<?php echo $prodPage ? '../index.php' : 'index.php' ?>">Home</a>
				</li>
				<li class="nav-item <?php echo $currentURL['productlist'] ? 'active' : '' ?> ">
					<a class="nav-link" href="<?php echo $prodPage ? '../productlist.php' : 'productlist.php' ?>">Products</a>
				</li>
				<li class="nav-item <?php echo $currentURL['statistics'] ? 'active' : '' ?> ">
					<a class="nav-link" href="<?php echo $prodPage ? '../statistics.php' : 'statistics.php' ?>">Statistics</a>
				</li>
				<div class="nav-item dropdown ml-auto">
					<a href="#" class="nav-link dropdown-toggle <?php echo ($currentURL['login'] || $currentURL['register'] || $currentURL['admin']) ? 'active' : '' ?>" data-toggle="dropdown">Profile</a>
					<div class="dropdown-menu">
						<?php if ($loggedIn) : ?>
							<a href="#" class="dropdown-item">History</a>
						<?php endif; ?>
						<?php if ($loggedIn) : ?>
							<a href="#" class="dropdown-item">Logout</a>
						<?php endif; ?>
						<?php if (!$loggedIn) : ?>
							<a href="<?php echo $prodPage ? '../login.php' : 'login.php' ?>" class="dropdown-item <?php echo $currentURL['login'] ? 'active' : '' ?> ">Login</a>
						<?php endif; ?>
						<?php if (!$loggedIn) : ?>
							<a href="<?php echo $prodPage ? '../register.php' : 'register.php' ?>" class="dropdown-item <?php echo $currentURL['register'] ? 'active' : '' ?> ">Register</a>
						<?php endif; ?>
						<?php if ($loggedIn && !$clientRole) : ?>
							<a href="<?php echo $prodPage ? '../admin.php' : 'admin.php' ?>" class="dropdown-item <?php echo $currentURL['admin'] ? 'active' : '' ?> ">Admin</a>
						<?php endif; ?>
					</div>
				</div>
			</ul>
		</div>
	</div>
</nav>