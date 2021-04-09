<?php
function confNumber($confnumber)
{
    $stmt = getDB()->prepare("INSERT INTO Tmiketest (conf_num) VALUES (:confnumber)");

    $stmt->execute([":confnumber" => $confnumber]);

    $result = $stmt->rowCount();

    if ($result) {
        return array("status" => 200, "message" => "Registered");
    } else {
        //must return a proper message so that the app can parse it
        //and display a user friendly message to the user
        return array("status" => 400, "message" => "Error");
    }
}
