<?php
include 'dbconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Tracking</title>
<h1> Tracking Statistics </h1>
</head>
<body>
<h2> Choose which GPU type you want to follow</h2>
<br>
<?php
$sql="SELECT ProductFamilyName, ProductFamilyID FROM ProductFamily";
$result = $con->query($sql);

if ($result>num_rows>0)
{
  echo '<form action="/subscribe.php">';
  while($row=$result->fetch_assoc())
  {
    echo  '<input type="checkbox" id="' . $row["ProductFamilyID"] . '" name="'
    . $row["ProductFamilyName"] . '" value="'. $row["ProductFamilyID"] . '">
      <label for="' . $row["ProductFamilyName"] . '"> '. $row["ProductFamilyName"] . '</label>
      <br>'
  }
  echo '<input type="submit" value="Submit">
  </form>';
}
 ?>
</body>
</html>
