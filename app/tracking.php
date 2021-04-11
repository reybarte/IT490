<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
if (isset($_SESSION["user"])) {
        if (isset($_POST["submit"])) {
		ob_start();
		$preference = ((array)tracking($_POST["family"], $_SESSION["user"]["user_name"]))["message"];
		ob_end_clean();       
	}
} else {
        echo "<script>alert('You must be logged in to access this page.')</script>";
        echo "<script>window.location = 'login.php'; </script>";
}
require(__DIR__ . "/header.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>Home</title>

</head>

<body>

  <h1> Tracking </h1>
  <h2> Which group(s) of GPU's do you want to track?</h2>

  <form method=POST action="tracking.php">
    <input type="checkbox" id="1" name="family[]" value="3060">
    <label for="1"> 3060 </label>
    <br><br>
    <input type="checkbox" id="2" name="family[]" value="3060Ti">
    <label for="2"> 3060Ti </label>
    <br><br>
    <input type="checkbox" id="3" name="family[]" value="3070">
    <label for="3"> 3070 </label>
    <br><br>
    <input type="checkbox" id="4" name="family[]" value="3080">
    <label for="4"> 3080 </label>
    <br><br>
    <input type="checkbox" id="5" name="family[]" value="3090">
    <label for="5"> 3090 </label>
    <br><br>
    <button type="submit" name="submit">Submit</button>
  </form>
  <?php echo $preference;?>
  <br>
  <h2> Trackers </h2>
  <br>
  <h3> Number of people tracking a particular GPU Group </h3>
  <?php
  ?>
</body>

</html>
