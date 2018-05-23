<?php
    $master_array=array();
	$tmp_array=array("friendId"=>"1","friendName"=>"Ram","phone"=>"982323234");
	array_push($master_array,$tmp_array);
	$tmp_array=array("friendId"=>"2","friendName"=>"Hari","phone"=>"978987987");
	array_push($master_array,$tmp_array);
	$tmp_array=array("friendId"=>"3","friendName"=>"Sita","phone"=>"989987987");
	array_push($master_array,$tmp_array);
$data_array=array("server_response"=>$master_array);
echo json_encode($data_array);

?>