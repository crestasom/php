<?php
// $url=" https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=27.731627,%2085.379852&destinations=27.718919,%2085.390321&key=AIzaSyDrlobwQzB5g6FXvcT1brN29k30u6N9iCk";
// //print_r($data);
// //echo $data->destination_address;
// $ch = curl_init($url);
// $params=array("destination_addresses","origin_addresses","rows","status");
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($ch);
// echo $result['destination_address'];
// //print_r($result);
//curl_close($ch);
$string="";
$fullurl = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=27.731627,%2085.379852&destinations=27.718919,%2085.390321&key=AIzaSyDrlobwQzB5g6FXvcT1brN29k30u6N9iCk";
$string .= file_get_contents($fullurl); // get json content
$json_a = json_decode($string, true); //json decoder
print_r($json_a);
//echo $json_a['results'][0]['geometry']['location']['lat']; // get lat for json
//echo $json_a['results'][0]['geometry']['location']['lng']; // get ing for json
?>