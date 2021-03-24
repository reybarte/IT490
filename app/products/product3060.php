<?php
//require(__DIR__ . "../MQPublish.inc.php");
//require(__DIR__."/header.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../CSS/productpage.css">
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
            <a class="navbar-brand" href="../index.php">GPU Guru</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../productlist.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../register.php">Register</a>
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

    <!--Product Page-->
    <div class="container d-flex justify-content-center">
        <figure class="card card-product-grid card-lg"> <a href="#" class="img-wrap" data-abc="true"> <img src="../card.jpg"> </a>
            <figcaption class="info-wrap">
                <div class="row">
                    <div class="col-md-5 col-xs-5"> <a href="#" class="title" data-abc="true">RTX 3060</a> <span class="rated">ASIN</span> </div>
                    <div class="col-md-4 col-xs-4"> <a href="#" class="title" data-abc="true">$1,999</a> <span class="rated">Price</span> </div>
                    <div class="col-md-3 col-xs-3">
                        <div class="btn btn-secondary"> In Stock </div>
                    </div>
                </div>
            </figcaption>
            <div class="bottom-wrap-desc">
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-9 col-xs-9"> <a href="#" class="title" data-abc="true">Description</a> <span class="rated">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam accusantium exercitationem pariatur at. Blanditiis repudiandae eveniet assumenda praesentium reiciendis consequatur tenetur voluptatem velit soluta pariatur? Omnis a sunt quo ea.</span></div>
                    </div>
                </figcaption>
            </div>
            <div class="bottom-wrap buy"> <a href="../checkoutpage.php" class="btn btn-primary" data-abc="true"> Buy now </a>
        </figure>
    </div>

</body>

</html>