<?php
function getTrackingStats()
{
	//from dbconnection.php
	$stmt = getDB()->prepare("SELECT * FROM TrackStats");
	$stmt->execute();
	$data = $stmt->fetchAll();
	if (count($data)) {
		return array("status" => 200, "data"=>$data, "message" => "Data Returned");
	} else {
		//must return a proper message so that the app can parse it
		//and display a user friendly message to the user
		return array("status" => 400, "message" => "Error");
	}
}
