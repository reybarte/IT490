<?php
require(__DIR__ . "/MQPublish.inc.php");
//require(__DIR__."/header.php");
session_start();
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
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3090.php" data-abc="true">RTX 3090</a> </h6>
                            <p class="mb-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda itaque ipsa praesentium. Consectetur quis voluptatem eius suscipit! Quia, enim! Reiciendis vel odio sed illum nesciunt magni nobis saepe ut sint!</p>
                        </div>

                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="#" type="button" class="btn btn-secondary mt-4">$3,999</a>
                        </div>

                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="#" type="button" class="btn btn-secondary mt-4">In Stock</a>
                        </div>

                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="products/product3090.php" type="button" class="btn btn-primary mt-4">View</a>
                        </div>
                    </div>
                </div>

                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3080.php" data-abc="true">RTX 3080</a> </h6>
                            <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut expedita repellendus numquam eum, quas unde velit amet laboriosam eos magni nulla architecto odio sint rem, quisquam neque atque non et!</p>
                        </div>
                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="#" type="button" class="btn btn-secondary mt-4">$69</a>
                        </div>

                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="#" type="button" class="btn btn-secondary mt-4">In Stock</a>
                        </div>

                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="products/product3080.php" type="button" class="btn btn-primary mt-4">View</a>
                        </div>
                    </div>
                </div>

                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3070.php" data-abc="true">RTX 3070</a> </h6>
                            <p class="mb-3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam nemo minus quam praesentium vero magnam similique sapiente consequatur dolorem quas quia debitis, corporis architecto, natus illum doloribus qui error fugiat.</p>
                        </div>
                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="#" type="button" class="btn btn-secondary mt-4">$420</a>
                        </div>

                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="#" type="button" class="btn btn-secondary mt-4">In Stock</a>
                        </div>

                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="products/product3070.php" type="button" class="btn btn-primary mt-4">View</a>
                        </div>
                    </div>
                </div>

                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3060ti.php" data-abc="true">RTX 3060 Ti</a> </h6>
                            <p class="mb-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam tempora quis distinctio deleniti a aut soluta itaque, id rem sequi harum dicta hic explicabo repellendus, eveniet omnis saepe. Ipsam, nemo?</p>
                        </div>
                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="#" type="button" class="btn btn-secondary mt-4">$6,999</a>
                        </div>

                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="#" type="button" class="btn btn-secondary mt-4">In Stock</a>
                        </div>

                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="products/product3060ti.php" type="button" class="btn btn-primary mt-4">View</a>
                        </div>
                    </div>
                </div>

                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3060.php" data-abc="true">RTX 3060</a> </h6>
                            <p class="mb-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos in dolor sint beatae aspernatur sed distinctio doloremque enim voluptatibus vel officia illo at nihil voluptatum corrupti, odio ratione, iure labore.</p>
                        </div>
                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="#" type="button" class="btn btn-secondary mt-4">$1,999</a>
                        </div>

                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="#" type="button" class="btn btn-secondary mt-4">In Stock</a>
                        </div>

                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="products/product3060.php" type="button" class="btn btn-primary mt-4">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>