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
<html lang=en>

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
    <title>Profile</title>
</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row justify-content-center">

            <!--Page container-->
            <div class="card profile-border bg-secondary">
                <div class="card-body">
                    <!--Header container-->
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title text-center profile-title">
                                <a title="View Product "> (Username placeholder)'s Profile</a>
                            </h4>
                            <p class="mb-1"></p>
                        </div>
                    </div>
                    <div class="info row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <!--PFP container-->
                                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                        <div class="card">
                                            <div class="card-body">

                                                <div class="media logo-image mr-1 icon-container">
                                                    <img class="img-fluid" src="#">
                                                </div>
                                                <p class="mb-1 text-center">
                                                    Change Profile Picture
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <!--Name/email container-->
                                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">
                                                    <a title="View Product">Name:</a>

                                                </h4>
                                                <p class="card-text text-center"></p>
                                                <p class="mb-1">
                                                <p>Name of the user will be here.</p>
                                                </p>
                                                <h4 class="card-title text-center">
                                                    <a title="View Product">Email:</a>

                                                </h4>
                                                <p class="card-text text-center"></p>
                                                <p class="mb-1">
                                                <p>Email of the user will be here.</p>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!--Points container-->
                                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                        <div class="media-body">

                                            <h4 class="card-title text-center">
                                                <a title="View Product">Point Balance</a>
                                            </h4>
                                            <p class="card-text text-center"></p>
                                            <p class="mb-1 ">
                                            <p>50000 Pts (just a placeholder)</p>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!--Tracking container-->
                                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                        <div class="media-body">
                                            <h4 class="card-title text-center">
                                                <a title="View Product">Tracking Preferences</a>
                                            </h4>
                                            <p class="card-text text-center"></p>
                                            <p class="mb-1">
                                                This is where the Tracking Information and Settings will be placed.
                                            </p>

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