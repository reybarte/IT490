<?php
require(__DIR__ . "/MQPublish.inc.php");
require(__DIR__ . "/header.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/checkoutpage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <!-- CHECK OUT -->
    <div class="container d-flex justify-content-center">
        <div class="box col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="row p-2">
                <h3 class="textCenter media-title font-weight-semibold">Checkout</h3>
            </div>
            <div class="borderRow media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                <div class="media-body">
                    <h4 class="media-title font-weight-semibold">RTX 3090</h4>
                    <h6 class="media-title font-weight-semibold">ASIN</h6>
                </div>
                <div class="text-center pt-1">
                    <a href="#" type="button" class="btn btn-secondary mt-2">$3,999</a>
                </div>
            </div>

            <div class="borderRow media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                <div class="media-body">
                    <h4 class="media-title font-weight-semibold pt-2">Points Balance</h4>
                </div>
                <div class="text-center pb-1 pt-1">
                    <a href="#" type="button" class="btn btn-secondary">$5,000</a>
                </div>
            </div>
            <div class="row borderRow media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row m-1">
                <div class="buy bottom-wrap"> <a href="confirmpurch.php" class="btn btn-primary"> Purchase </a></div>
            </div>
        </div>
    </div>
    <!-- END of CHECKOUT -->
</body>

</html>