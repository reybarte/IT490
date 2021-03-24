<?php
function apiCall($asin) {
	$curl = curl_init();
	echo $asin;
	curl_setopt_array($curl, [
			CURLOPT_URL => "https://amazon-products1.p.rapidapi.com/product?country=US&asin=".$asin,
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

	//json object
	$response = curl_exec($curl);
	//format json object
	$response = json_decode($response);
	var_dump($response);
	$arr = ["asin"=>$response->asin, "title"=>$response->title, "current_price"=>$response->prices->current_price, "description"=>$response->description];
	if($response->out_of_stock) {
		$arr["out_of_stock"]="true";
	} else {
		$arr["out_of_stock"]="false";
	}
	
	if(count($response->images) >= 1) {
		$img = $response->images[0];
	}/*
	else if(count($response["images"]) > 1) {
		$img = $response->images[0];
		for ($x = 1; $x < count($response->images); $x++) {
			$img = $img.",".$response->images[$x];
		}
	} */else {
		$img = "none";
	}
	$arr["images"]=$img;

	$featureCount = count($response->features);
	if($featureCount == 1) {
		$features = $response->features[0];
	} elseif ($featureCount > 1) {
		$features = $response->features[0];
		for ($x = 1; $x < $featureCount; $x++) {
			$features = $features."|||".$response->features[$x];
		}
	} else {
		$features = ["None"];
	}
	$arr["features"] = $features;


	$err = curl_error($curl);

	curl_close($curl);

	$file = fopen("APIresponse.txt", "a");

	if (!$err) {
		foreach ($arr as $key=>$value){
			fwrite($file, "|" . $key . "|\n" . $value);
			fwrite($file, "\n");
		}
	} else {
		fwrite($file, $err);
	}

	fwrite($file, "\n\n");
	fclose($file);
	return $arr;
}
?>
