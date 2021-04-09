<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
require(__DIR__ . "/header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/helpers.esm.min.js"></script>
    <title>Statistics</title>
</head>


<body>
    <!-- Statistics List and Options -->
    <h1>Welcome, <?php $_SESSION["user"]["user_name"]; ?>!</h1>
    <div class="container d-flex justify-content-center mt-50 mb-50"></div>
    <div class="row justify-content-center"></div>
    <div class="col-md-10"></div>
    <div class="card"></div>
    <h2 class="card-title text-center p-3 mb-0">Product Data, Tracking, and more!</h2>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Graph for Total Trackers over Time -->
                <div class="card card-body">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3090.php" data-abc="true">Visual Data for Total Product Trackers over Time</a> </h6>
                            <p class="mb-3">With all of the different products and series of GPU's to choose from, here is a linear, graphical representation of the progression of users tracking products over linear intervals of time.</p>
                        </div>
                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="products/product3090.php" type="button" class="btn btn-primary mt-4">View Total User Tracking Data</a>
                        </div>
                    </div>
                </div>

                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3080.php" data-abc="true">Graph Displaying the Number of your Puchases over Time </a> </h6>
                            <p class="mb-3">Here you can find statistics of your aggregate purchases of products and GPU's over specific intervals of time since the creation of your account!</p>
                        </div>
                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="products/product3080.php" type="button" class="btn btn-primary mt-4">View Personal Purchase Data</a>
                        </div>
                    </div>
                </div>

                <div class="card card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"> <a href="products/product3070.php" data-abc="true">Visual Data Showcasing Popularity Ranking for GPU families and Standalone Products</a> </h6>
                            <p class="mb-3">Here you will find listings of the most popular GPU(s) on the website in order, based on how many individual users are tracking at GPU at any given time (#1 product having the highest number of tracks and the lowest having the least).</p>
                        </div>
                        <div class="mt-3 mt-lg-3 ml-lg-3 text-center">
                            <a href="products/product3070.php" type="button" class="btn btn-primary mt-4">View Overall Product Ratings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</body>

</html>