<?php
        $cityname=$_REQUEST['city'];
		$cityname = urlencode($cityname);

    	$Url='http://maps.googleapis.com/maps/api/geocode/json?address='.$cityname.'&sensor=false';
		if (!function_exists('curl_init')){
			die('Sorry CURL is not installed!');
		}
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $Url);
		curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
		curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		$output = curl_exec($ch);
		curl_close($ch);
		$search_data = json_decode($output);
		$new = array("lat"=>$search_data->results[0]->geometry->location->lat,"lng"=>$search_data->results[0]->geometry->location->lng);
		echo $new['lat']."_";
		echo $new['lng'];
	
?>
