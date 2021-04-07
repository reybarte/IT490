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
            <div class="col-md-100">
                <!--Page container-->
                <div class="card card-body">
                    <!--Header container-->
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <div class="row profile-border">
                                <div class="column">
                                    <h4 class="card-title text-center">
                                        <a title="View Product"> (Username placeholder)'s Profile</a>
                                    </h4>
                                    <p class="mb-1"></p>
                                    <div class="row">
                                        <div class="card card-body">
                                            <!--PFP container-->
                                            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p class="card-text limitdesc text-center"></p>
                                                        <div class="logo-image mr-1 ">
                                                            <img class="img-fluid" href="IMG/490IconPic.png">
                                                        </div>
                                                        <p class="mb-1">
                                                        <p>Change Profile Picture</p>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-body">
                                            <!--Name/email container-->
                                            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title text-center">
                                                            <a title="View Product">Name:</a>

                                                        </h4>
                                                        <p class="card-text limitdesc text-center"></p>
                                                        <p class="mb-1">
                                                        <p>Name of the user will be here.</p>
                                                        </p>
                                                        <h4 class="card-title text-center">
                                                            <a title="View Product">Email:</a>

                                                        </h4>
                                                        <p class="card-text limitdesc text-center"></p>
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
                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <!--Points container-->
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <div class="card-body">
                                <h4 class="card-title text-center">
                                    <a title="View Product">Point Balance</a>
                                </h4>
                                <p class="card-text limitdesc text-center"></p>
                                <p class="mb-1">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-body">
                    <!--Tracking container-->
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="media-body">
                            <h4 class="card-title text-center">
                                <a title="View Product">Tracking Preferences</a>
                            </h4>
                            <p class="card-text limitdesc text-center"></p>
                            <p class="mb-1"></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>