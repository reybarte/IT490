<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"]["user_name"];

    ob_start();
    $info = (array)getTrackingInfo($user);
    ob_end_clean();
} else {
    echo "<script>alert('You must be logged in to access this page.')</script>";
    echo "<script>window.location = 'login.php'; </script>";
}
require(__DIR__ . "/header.php");
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.0/chart.js" integrity="sha512-LlFvdZpYhQdASf4aZfSpmyHD6+waYVfJRwfJrBgki7/Uh+TXMLFYcKMRim65+o3lFsfk20vrK9sJDute7BUAUw==" crossorigin="anonymous"></script>
    <title>Statistics</title>
</head>

<body>
    <h1>Pull from Workbench</h1>
    <canvas id="myChart" width="400" height="400"></canvas>
    <?php
    $countData = (array) $info["countData"];
    foreach ($countData as $value) {
    }
    ?>
    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', "July", "August", "September", "October", "November", "December"],
                datasets: [{
                    label: '# of Votes',
                    data: [1, 2, 3, 4, 3, 2, 1, 2, 3, 4, 5, 6],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
<style>
    .line-chart {
        border-bottom: 1px solid;
        border-left: 1px solid;
        height: var(--widget-size);
        margin: 1em;
        padding: 0;
        position: relative;
        width: var(--widget-size);
    }

    .chart {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .value {
        background-color: white;
        border: 3px solid red;
        border-radius: 50%;
        height: 15px;
        position: absolute;
        width: 15px;

    }
</style>