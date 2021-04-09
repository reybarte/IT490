<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
require(__DIR__ . "/header.php");
$confnumber = (rand());

ob_start();
//calls function from MQPublish.inc.php to communicate with MQ
$username = $_SESSION["user"]["user_name"];
echo $username;
$response = (array)purchase($confnumber, $username);
ob_end_clean();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/purchase_checkout.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Confirm Purchase</title>
</head>

<body>
    <!-- Conformation Page -->
    <div class="jumbotron text-center pt-4 pb-5">
        <div class="card card-body mt-3">
            <div class="container">
                <h1 class="jumbotron-heading">Thank You!</h1>
            </div>
            <div class="borderRow media-body">
                <h4> Order Confirmation Number: <?php echo $confnumber; ?> </h4>
            </div>
            <div class="media-body">
                <h5 class="media-title font-weight-semibold pb-2">Thank you for shopping with us and supporting our tireless fight against <strong>SCALPERS!</strong></h5>
            </div class="media-body">
            <div class="buy bottom-wrap"> <a href="index.php" class="btn btn-primary"> Continue to Homepage </a></div>
        </div>
    </div>