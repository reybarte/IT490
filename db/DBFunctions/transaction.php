<?php
function transaction($username, $asin, $product_name)
{
    //select balance to compare to current price
    $stmt = getDB()->prepare("SELECT balance FROM Users WHERE user_name = :username");
    $stmt->execute([":username" => $username]);
    $balance = ($stmt->fetch(PDO::FETCH_ASSOC))["balance"];
    //select current price to compare to balance
    $stmt = getDB()->prepare("SELECT current_price FROM Products where asin = :asin");
    $stmt->execute([":asin" => $asin]);
    $currentPrice = ($stmt->fetch(PDO::FETCH_ASSOC))["current_price"];
    // select quantity of product being bought, if greater than 0 we cannot proceed
    $stmt = getDB()->prepare("SELECT out_of_stock FROM Products where asin = :asin");
    $stmt->execute([":asin" => $asin]);
    $outOfStock = ($stmt->fetch(PDO::FETCH_ASSOC))["out_of_stock"];

    if ($outOfStock == 1) {
        return ["status" => 401, "confnum" => -1, "message" => "Out Of Stock"];
    } elseif ($balance < $currentPrice) {
        return ["status" => 402, "confnum" => -2, "message" => "Not Enough Funds"];
    }

    $confnumber = (rand());

    //from dbconnection.php
    $stmt = getDB()->prepare("INSERT INTO T$username (asin, product_name, price, purchase_date, conf_num) VALUES (:asin,:product_name,:price, CURRENT_TIMESTAMP, :confnum)");
    $result = $stmt->execute([":asin" => $asin, ":product_name" => $product_name, ":price" => $currentPrice, ":confnum" => $confnumber]);
    $stmt = getDB()->prepare("UPDATE Users SET balance = (balance - :currentPrice) WHERE user_name = :username");
    $result1 = $stmt->execute([":username" => $username, ":currentPrice" => $currentPrice]);
    if ($result && $result1) {
        return ["status" => 200, "confnum" => $confnumber, "message" => "Transaction Inserted"];
    } else {
        //must return a proper message so that the app can parse it
        //and display a user friendly message to the user
        return ["status" => 400, "message" => "Error"];
    }
}
