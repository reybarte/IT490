<?php
require (__DIR__ . '/vendor/autoload.php');
/*
do on api server
echo "export SENDGRID_API_KEY='YOUR_API_KEY'" > sendgrid.env
echo "sendgrid.env" >> .gitignore
source ./sendgrid.env
*/
function mailList($mailList, $asin, $title, $image){
	foreach($mailList as $key => $value){
		$email = new \SendGrid\Mail\Mail(); 
		$email->setFrom("gpuguru123@gmail.com", "GPU Guru");
		$email->setSubject("GPU Guru Product Alert");
		$email->addTo($key);
		$email->addContent("text/html", "
				<h1>Hello, $value!</h1>
				<h2>One of the products you are tracking is now in stock!</h2>
				<h3><bold>$title, ASIN #$asin</bold></h3>
				<img src='$image' width=300 height=300>
				<p>Visit our website to purchase now!</p><br>
				<a href=http://18.216.101.142/>GPU Guru<a><br>
				");
		$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
		try {
			$response = $sendgrid->send($email);
			print $response->statusCode() . "\n";
			print_r($response->headers());
			print $response->body() . "\n";
		} catch (Exception $e) {
			echo 'Caught exception: '. $e->getMessage() ."\n";
		}
	}
	return ["status"=>200];
}
?>
