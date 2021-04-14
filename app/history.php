<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
require(__DIR__ . "/header.php");

ob_start();
$data = getTransactionHistory($_SESSION["user"]["user_name"])->data;
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
<html lang=en>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/history.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="JS/desclimit.js"></script> <!-- Add 'limitdesc' as a class variable to limit characters -->
    <link rel="icon" href="IMG/490IconPic.png">
    <title>History</title>
</head>

<body>
    <!-- Transaction History List -->
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <h5 class="card-title text-center p-3 mb-0">Transaction History</h5>
                </div>
                <!-- Each card that is generated that shows GPU info starts here -->
                <?php foreach ($asinData as $key => $value) : ?>
                    <div class="card card-body mt-3 pt-3 pb-3">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold titleBlue text-center"> <a> <?php echo $value["title"]; ?></a></h6>
                                <div class="borderRow row justify-content-center text-center">
                                    <div class="mr-2"><span class="rated">Price<br></span><button href="#" type="button" class="btn btn-secondary fullButton"><?php echo "$" . $value["current_price"]; ?></button></div>
                                    <div class="mr-2"><span class="rated">ASIN<br></span><button href="#" type="button" class="btn btn-secondary fullButton"><?php echo $key; ?></button></div>
                                    <div class="mr-2"><span class="rated">Confirmation Number<br></span><button href="#" type="button" class="btn btn-secondary fullButton">Confirmation Number</button></div>
                                </div>
                                <div class="row justify-content-center text-center">
                                    <div><span class="rated">Purchase Date<br></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</body>

</html>