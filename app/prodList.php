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
    <link rel="stylesheet" href="CSS/prodList.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="JS/desclimit.js"></script> <!-- Add 'limitdesc' as a class variable to limit characters -->
    <title>Product List</title>
</head>

<body>
    <!-- Product List -->
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <?php foreach ($asinData as $key => $value) : ?>
                    <div class="card card-body mt-3">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold titleBlue"> <a> <?php echo $value["title"]; ?></a></h6>
                                <p class="mb-1 limitdesc"><?php echo $value["description"]; ?></p>

                                <!-- Product List Price, Stock-->
                                <form method="POST" action="prodPage.php">
                                    <div class="row buttonsright pr-3">
                                        <button href="#" type="button" class="btn btn-secondary mr-2"><?php echo "$" . $value["current_price"]; ?></button>
                                        <button href="#" type="button" class="btn btn-secondary mr-2">
                                            <?php if ($value["out_of_stock"]) {
                                                echo "Out Of Stock";
                                            } else {
                                                echo "In Stock";
                                            } ?>
                                        </button>
                                        <input type="hidden" name="asin" value=<?php echo $value["asin"]; ?>>
                                        <input type="hidden" name="prodName" value=<?php echo "\"" . $value["title"] . "\""; ?>>
                                        <input type="hidden" name="price" value=<?php echo $value["current_price"]; ?>>
                                        <button type="submit" name="view" class="btn btn-primary">View</button>
                                </form>
                            </div>


                        </div>
                    </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    </div>
</body>

</html>