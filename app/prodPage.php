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
if(isset($_POST["view"])) {
	$asin = $_POST["asin"];
} else {
	header("Location: prodList.php");
}
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
    <!--Product Page-->
    <div class="container d-flex justify-content-center">
        <figure class="card card-product-grid card-lg"> <a href="#" class="img-wrap removeHover"> <img src="<?php echo $asinData[$asin]["images"]; ?>"> </a>
            <figcaption class="info-wrap">
                <div class="row">
					<div class="col-md-4 col-xs-4"> <a href="#" class="title removeHover"><?php echo $asinData[$asin]["title"];?></a> <span class="rated"><?php echo $asinData[$asin]["asin"]; ?></span></div>
                    <div class="col-md-4 col-xs-4 pl-5"> <a href="#" class="title removeHover"><?php echo "$" . $asinData[$asin]["current_price"]; ?></a><span class="rated">Price</span> </div>
                    <div class="col-md-4 col-xs-4 leftpad">
                        <div class="btn btn-secondary">
                            <?php if ($asinData[$asin]["out_of_stock"]) {
                                echo "Out Of Stock";
                            } else {
                                echo "In Stock";
                            } ?></a>
                        </div>
                    </div>
                </div>
            </figcaption>
            <div class="bottom-wrap-desc">
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-12 col-xs-12"> <a href="#" class="title removeHover">Description</a> <span class="rated"> <span class="rated"><?php echo $asinData[$asin]["description"]; ?></span></div>
                    </div>
                </figcaption>
            </div>
			<div class="bottom-wrap buy"> 
			<form method="POST" action="checkout.php">
			<input type="hidden" name="asin" value=<?php echo $value["asin"];?>>
			<input type="hidden" name="price" value=<?php echo $value["current_price"];?>>
			<input type="hidden" name="title" value=<?php echo "\"". $value["title"]."\"";?>>
			<button type="submit" name="checkout" class="btn btn-primary">Buy Now</button>	
			</form>	
			</div>
        </figure>
    </div>

</body>

</html>
