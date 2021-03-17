<?php
function apicall($asin){
	$curl = curl_init();

	curl_setopt_array($curl, [
			CURLOPT_URL => "https://amazon-products1.p.rapidapi.com/product?country=US&asin=" . $asin,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
			"x-rapidapi-host: amazon-products1.p.rapidapi.com",
			"x-rapidapi-key: db5dd136e4mshacecf0686b9d8a6p1a3734jsn6a0addc587f8"
			],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	$file = fopen("APIresponse.txt", "a");

	if ($err) {
		fwrite($file, $err);
	} else {
		fwrite($file, $response);
	}

	fwrite($file, "\n");
	fclose($close);
	return $response;
}
?>
