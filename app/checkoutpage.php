<?php
require(__DIR__ . "/MQPublish.inc.php");
//require(__DIR__."/header.php");
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
    <!-- Nav -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">GPU Guru</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="productlist.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary btn-number">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    
   <!-- CHECK OUT -->

   <div class="container d-flex justify-content-center">
        <div class= "box col-xs-6 col-sm-6 col-md-6 col-lg-6">


        <div class="row">
            <h1 class="textCenter">Checkout</h1>
        </div>

        <div class="row borderRow">
                
                <div class="col-md-6 col-xs-6"> <h3>RTX 3090</h3> <span class="rated">ASIN: xxx</span> </div>
                
                


                <div class="col-md-4 col-xs-4 textRight">
                     <h3>$999.99</h3> 
                </div>
        </div>

        <div class="row borderRow">
                <div class="col-md-6 col-xs-6"> 
                    <h3>Points Available:</h3> 
                </div>


                <div class="col-md-4 col-xs-4 textRight">
                     <h3>$999.99</h3> 
                </div>
        </div>
        
        
        <div class="row borderRow">
        <div class="buy bottom-wrap"> <a href="confirmpurch.php" class="btn btn-primary" data-abc="true"> Purchase </a>

        </div>
        
        
        </div>



    </div>
    <!-- END of CHECKOUT -->

</body>

</html>