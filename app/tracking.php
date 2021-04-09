<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
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

  <form action="/subscribe.php">
    <input type="checkbox" id="1" name="3060" value="3060">
    <label for="3060"> 3060 </label>
    <br><br>
    <input type="checkbox" id="2" name="3060TI" value="3060Ti">
    <label for="3060Ti"> 3060Ti </label>
    <br><br>
    <input type="checkbox" id="3" name="3070" value="3070">
    <label for="3070"> 3070 </label>
    <br><br>
    <input type="checkbox" id="4" name="3080" value="3080">
    <label for="3080"> 3080 </label>
    <br><br>
    <input type="checkbox" id="5" name="3090" value="3090">
    <label for="3090"> 3090 </label>
    <br><br>
    <input type="submit" value="Submit">
  </form>
  <br>
  <h2> Trackers </h2>
  <br>
  <h3> Number of people tracking a particular GPU Group </h3>
  <p> 3060: </p>
  <?php
  echo $tracka
  ?>
  <p> 3060Ti: </p>
  <?php
  echo $trackb
  ?>
  <p> 3070: </p>
  <?php
  echo $trackc
  ?>
  <p> 3080: </p>
  <?php
  echo $trackd
  ?>
  <p> 3090: </p>
  <?php
  echo $tracke
  ?>
</body>

</html>

<?php
//Checking for individual checkboxes being checked off
function IsChecked($chkname, $value)
{
  if (!empty($_POST[$chkname])) {
    foreach ($_POST[$chkname] as $chkval) {
      if ($chkval == $value) {
        return true;
      }
    }
  }
  return false;
}

//checked off boxes if statements, counts the amount of subscribers to a GPU family 
if (IsChecked('3060', '3060')) {
  //tracka is the number of people who're tracking the 3060 category
}
if (IsChecked('3060Ti', '3060Ti')) {
  //trackb is the number of people who're tracking the 3060 category
}
if (IsChecked('3070', '3070')) {
  //trackc is the number of people who're tracking the 3060 category
}
if (IsChecked('3080', '3080')) {
  //trackd is the number of people who're tracking the 3060 category
}
if (IsChecked('3090', '3090')) {
  //tracke is the number of people who're tracking the 3060 category
}
?>