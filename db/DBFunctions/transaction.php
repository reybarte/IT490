<?php
function transaction($username, $asin, $product_name, $price)
{
    //from dbconnection.php
    $stmt = getDB()->prepare("INSERT INTO Table T$username (asin, product_name, price, purchase_date) VALUES (:asin,:product_name,:price,CURRENT_TIMESTAMP())");
    $result = $stmt->execute([":asin" => $asin, ":product_name" => $product_name, ":price" => $price]);
    if ($result) {
        return array("status" => 200, "message" => "Transaction Inserted");
    } else {
        //must return a proper message so that the app can parse it
        //and display a user friendly message to the user
        return array("status" => 400, "message" => "Error");
    }
}
