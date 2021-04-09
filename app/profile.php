<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
require(__DIR__ . "/header.php");
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
        <div class="card" style="width: 700px;">
            <div class="card-body">
                <h5 class="card-title text-center mb-0">Profile</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Username: <?php echo $_SESSION["user"]["user_name"] ?></li>
                <li class="list-group-item">Email: <?php echo $_SESSION["user"]["email"] ?></li>
                <li class="list-group-item">Name: <?php echo $_SESSION["user"]["first_name"] . " " . $_SESSION["user"]["last_name"] ?></li>
                <li class="list-group-item">Balance: 5,000</li>
            </ul>
            <div class="card-body pl-3 pt-2 pb-1">
                <h5 class="card-title"><a href="#" class="card-link">Tracking Page</a></h5>
            </div>
        </div>
    </div>
</body>

</html>