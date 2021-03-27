<?php
require(__DIR__ . "/MQPublish.inc.php");
//require(__DIR__."/header.php");
session_start();
ob_start();
$data = getCache()->data;
ob_end_clean();
foreach ($data as $key => $value) {
    $asinData[strval($value->asin)] = (array)$value;
}
//var_dump($asinData);
foreach ($asinData as $key => $value) {
    //echo $key . ":" . $value["current_price"]."\n";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/productlist.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Nav -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">GPU Guru</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="productlist.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Statistics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary btn-number">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <!-- Product List -->
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-body">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3090.php">RTX 3090</a></h6>
                            <p class="mb-1"><?php echo $asinData["B08J5F3G18"]["description"]; ?></p>
                            <div class="buttonsright">
                                <a href="#" type="button" class="btn btn-secondary mr-2"><?php echo "$" . $asinData["B08J5F3G18"]["current_price"]; ?></a>
                                <a href="#" type="button" class="btn btn-secondary mr-2">
                                    <?php if ($asinData["B08J5F3G18"]["out_of_stock"]) {
                                        echo "Out Of Stock";
                                    } else {
                                        echo "In Stock";
                                    } ?></a>
                                <a href="products/product3090.php" type="button" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3080.php">RTX 3080</a></h6>
                            <p class="mb-1"><?php echo $asinData["B08HH5WF97"]["description"]; ?></p>
                            <div class="buttonsright">
                                <a href="#" type="button" class="btn btn-secondary mr-2"><?php echo "$" . $asinData["B08HH5WF97"]["current_price"]; ?></a>
                                <a href="#" type="button" class="btn btn-secondary mr-2">
                                    <?php if ($asinData["B08HH5WF97"]["out_of_stock"]) {
                                        echo "Out Of Stock";
                                    } else {
                                        echo "In Stock";
                                    } ?></a>
                                <a href="products/product3080.php" type="button" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3070.php">RTX 3070</a></h6>
                            <p class="mb-1"><?php echo $asinData["B08L8L9TCZ"]["description"]; ?></p>
                            <div class="buttonsright">
                                <a href="#" type="button" class="btn btn-secondary mr-2"><?php echo "$" . $asinData["B08L8L9TCZ"]["current_price"]; ?></a>
                                <a href="#" type="button" class="btn btn-secondary mr-2">
                                    <?php if ($asinData["B08L8L9TCZ"]["out_of_stock"]) {
                                        echo "Out Of Stock";
                                    } else {
                                        echo "In Stock";
                                    } ?></a>
                                <a href="products/product3070.php" type="button" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3060ti.php">RTX 3060 Ti</a></h6>
                            <p class="mb-3"><?php echo $asinData["B08R876RTH"]["description"]; ?></p>
                            <div class="buttonsright">
                                <a href="#" type="button" class="btn btn-secondary mr-2"><?php echo "$" . $asinData["B08R876RTH"]["current_price"]; ?></a>
                                <a href="#" type="button" class="btn btn-secondary mr-2">
                                    <?php if ($asinData["B08R876RTH"]["out_of_stock"]) {
                                        echo "Out Of Stock";
                                    } else {
                                        echo "In Stock";
                                    } ?></a>
                                <a href="products/product3060ti.php" type="button" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3060.php">RTX 3060</a></h6>
                            <p class="mb-3"><?php echo $asinData["B08WHJPBFX"]["description"]; ?></p>
                            <div class="buttonsright">
                                <a href="#" type="button" class="btn btn-secondary mr-2"><?php echo "$" . $asinData["B08WHJPBFX"]["current_price"]; ?></a>
                                <a href="#" type="button" class="btn btn-secondary mr-2">
                                    <?php if ($asinData["B08WHJPBFX"]["out_of_stock"]) {
                                        echo "Out Of Stock";
                                    } else {
                                        echo "In Stock";
                                    } ?></a>
                                <a href="products/product3060.php" type="button" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>