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
if(isset($_POST["checkout"])) {
	$asin = $_POST["asin"];
	$price = $_POST["price"];
	$prodName = $_POST["prodName"];
	$user = $_SESSION["user"]["user_name"];
}
else {
	echo "<script>window.location = 'prodList.php'; </script>";
}


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
    <title>Checkout</title>
</head>

<body>
    <!-- CHECK OUT -->
    <div class="container d-flex justify-content-center">
        <div class="box col-xs-6 col-sm-6 col-md-6 col-lg-6 pr-4 pl-4">
            <div class="row p-2">
                <h3 class="textCenter titleBig p-2">Checkout</h3>
            </div>
            <div class="borderRow media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                <div class="media-body">
                    <p class="title pr-3 mb-0"><?php echo $prodName; ?></p>
                    <span class="rated"><?php echo $asin; ?></span>
                </div>
                <div class="row pt-1">
                    <a href="#" type="button" class="btn btn-secondary mt-2"><?php echo "$" . $price; ?></a>

                </div>
            </div>

            <div class="borderRow media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                <div class="media-body topCenter">
                    <p class="title topCenter">Points Balance</p>
                </div>
                <div class="text-center topCenter">
                    <a href="#" type="button" class="topCenter btn btn-secondary">$5,000</a>
                </div>
            </div>
            <div class="row borderRow media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row m-1">
                <div class="buy bottom-wrap">
                    <form method="POST" action="transaction.php">
                        <input type="hidden" name="username" value=<?php echo $user; ?>>
                        <input type="hidden" name="asin" value=<?php echo $asin; ?>>
                        <input type="hidden" name="prodName" value=<?php echo "\"" . $prodName . "\""; ?>>
                        <input type="hidden" name="price" value=<?php echo $price; ?>>
                        <button type="submit" name="purchase" class="btn btn-primary">Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>