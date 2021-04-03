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
            <!--<h1 class="jumbotron-heading">GPU Guru</h1> -->
            <img src="IMG/490TitlePic.png" class="img-fluid title pb-2">
            <p class="lead text-muted mb-0">Anti-Scalper</p>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center"><a href="products/product3090.php" title="View Product">GeForce RTX 3090</a></h4>
                                <p class="card-text limitdesc text-center"><?php echo $asinData["B08J5F3G18"]["description"]; ?></p>
                                <div class="row">
                                    <div class="col text-center">
                                        <p class="btn btn-secondary btn"><?php echo "$" . $asinData["B08J5F3G18"]["current_price"]; ?></p>
                                    </div>
                                    <div class="col text-center">
                                        <div class="btn btn-secondary btn">
                                            <?php if ($asinData["B08J5F3G18"]["out_of_stock"]) {
                                                echo "Out Of Stock";
                                            } else {
                                                echo "In Stock";
                                            } ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center"><a href="products/product3080.php" title="View Product">GeForce RTX 3080</a></h4>
                                <p class="card-text limitdesc text-center"><?php echo $asinData["B08HH5WF97"]["description"]; ?></p>
                                <div class="row">
                                    <div class="col text-center">
                                        <p class="btn btn-secondary btn"><?php echo "$" . $asinData["B08HH5WF97"]["current_price"]; ?></p>
                                    </div>
                                    <div class="col text-center">
                                        <div class="btn btn-secondary btn">
                                            <?php if ($asinData["B08HH5WF97"]["out_of_stock"]) {
                                                echo "Out Of Stock";
                                            } else {
                                                echo "In Stock";
                                            } ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center"><a href="products/product3070.php" title="View Product">GeForce RTX 3070</a></h4>
                                <p class="card-text limitdesc text-center"><?php echo $asinData["B08L8L9TCZ"]["description"]; ?></p>
                                <div class="row">
                                    <div class="col text-center">
                                        <p class="btn btn-secondary btn"><?php echo "$" . $asinData["B08L8L9TCZ"]["current_price"]; ?></p>
                                    </div>
                                    <div class="col text-center">
                                        <div class="btn btn-secondary btn">
                                            <?php if ($asinData["B08L8L9TCZ"]["out_of_stock"]) {
                                                echo "Out Of Stock";
                                            } else {
                                                echo "In Stock";
                                            } ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center"><a href="products/product3060ti.php" title="View Product">GeForce RTX 3060 Ti</a></h4>
                                <p class="card-text limitdesc text-center"><?php echo $asinData["B08R876RTH"]["description"]; ?></p>
                                <div class="row">
                                    <div class="col text-center">
                                        <p class="btn btn-secondary btn"><?php echo "$" . $asinData["B08R876RTH"]["current_price"]; ?></p>
                                    </div>
                                    <div class="col text-center">
                                        <div class="btn btn-secondary btn">
                                            <?php if ($asinData["B08R876RTH"]["out_of_stock"]) {
                                                echo "Out Of Stock";
                                            } else {
                                                echo "In Stock";
                                            } ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center"><a href="products/product3060.php" title="View Product">GeForce RTX 3060</a></h4>
                                <p class="card-text limitdesc text-center"><?php echo $asinData["B08WHJPBFX"]["description"]; ?></p>
                                <div class="row">
                                    <div class="col text-center">
                                        <p class="btn btn-secondary btn"><?php echo "$" . $asinData["B08WHJPBFX"]["current_price"]; ?></p>
                                    </div>
                                    <div class="col text-center">
                                        <div class="btn btn-secondary btn">
                                            <?php if ($asinData["B08WHJPBFX"]["out_of_stock"]) {
                                                echo "Out Of Stock";
                                            } else {
                                                echo "In Stock";
                                            } ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 pb-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center"><a href="products/product3090.php" title="View Product">GeForce RTX 3090</a></h4>
                                <p class="card-text limitdesc text-center"><?php echo $asinData["B08J5F3G18"]["description"]; ?></p>
                                <div class="row">
                                    <div class="col text-center">
                                        <p class="btn btn-secondary btn"><?php echo "$" . $asinData["B08J5F3G18"]["current_price"]; ?></p>
                                    </div>
                                    <div class="col text-center">
                                        <div class="btn btn-secondary btn">
                                            <?php if ($asinData["B08J5F3G18"]["out_of_stock"]) {
                                                echo "Out Of Stock";
                                            } else {
                                                echo "In Stock";
                                            } ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="text-light mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-4 col-xl-3">
                    <h5>About</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <p class="mb-0">
                        We are a bot that notifies users via email when specific PC hardware (Geforce RTX 3000 Series) on Amazon has become available, directing them to a mockup product page on our site for purchasing and product details.
                    </p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                    <h5>Information</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                        <li><a href="#">Link 4</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                    <h5>Others links</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                        <li><a href="#">Link 4</a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h5>Contact</h5>
                    <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                    <ul class="list-unstyled">
                        <li><i class="fa fa-home mr-2"></i> Couch Potatoes</li>
                        <li><i class="fa fa-envelope mr-2"></i> couch@potatoes.com</li>
                        <li><i class="fa fa-phone mr-2"></i> + 420 696 9696</li>
                        <li><i class="fa fa-print mr-2"></i> + 420 696 9696</li>
                    </ul>
                </div>
                <div class="col-12">
                    <p class="float-left">
                        <a href="#"><br>Back to top</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>