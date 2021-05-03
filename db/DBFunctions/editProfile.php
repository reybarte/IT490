<?php
function editProfile($oldUser, $newUser, $email, $fName, $lName)
{
	$stmt = getDB()->prepare("SELECT email, first_name, last_name FROM USERS WHERE user_name = :oldUser");
	$stmt->execute([":oldUser"=>$oldUser]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

	if($oldUser == $newUser) {
	$stmt = getDB()->prepare("UPDATE Users set email = :email, first_name = :fName, last_name = :lName WHERE user_name = :oldUser");
	$result = $stmt->execute([":oldUser"=>$oldUser, ":email" => $email, ":fName" => $fName, ":lName" => $lName]);
	} else {
	$stmt = getDB()->prepare("UPDATE Users set email = :email, user_name = :username, first_name = :fName, last_name = :lName WHERE user_name = :oldUser");
		$result = $stmt->execute([":oldUser"=>$oldUser, ":email" => $email, ":username" => $newUser, ":fName" => $fName, ":lName" => $lName]);
		$stmt = getDB()->prepare("RENAME TABLE T$oldUser to T$newUser");
		$stmt->execute();
		$stmt = getDB()->prepare("UPDATE Tracking set user_name = :newUser WHERE user_name = :oldUser");
		$stmt->execute([":newUser"=>$newUser, ":oldUser"=>$oldUser]);

	}
	if ($result) {
		return ["status" => 200, "message" => "Profile Updated"];
	} else {
		return ["status" => 400, "message" => "Error"];
	}
}
