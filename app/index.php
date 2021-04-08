<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
require(__DIR__ . "/header.php");
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
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="JS/desclimit.js"></script> <!-- Add 'limitdesc' as a class variable to limit characters -->
    <link rel="icon" href="IMG/490IconPic.png">
    <title>Home</title>
</head>

<body>
    <!-- Homepage -->
    <section class="jumbotron text-center pt-1 pb-2">
        <div class="container">
            <img src="IMG/490TitlePic.png" class="img-fluid bigImage pb-2">
            <blockquote class="blockquote text-center">
                <p class="mb-0">"Fuck Scalpers"</p>
                <footer class="blockquote-footer"><cite title="Source Title">Reynaldo Barte</cite></footer>
            </blockquote>
        </div>
    </section>

    <!-- About Section -->
    <div class="container d-flex justify-content-center">
        <div class="card card-body">
            <div class="row justify-content-center">
                <h2 class="">About Us</h2>
            </div>
            <div class="row text-center">
                <p>
                    We are a storefront for computer hardware and a notification service for hard to find hardware. Our website allows users to track products from a pre-determined list of items. When previously out of stock items become in stock, users will be notified via email.
                </p>
            </div>
        </div>
    </div>
</body>

</html>