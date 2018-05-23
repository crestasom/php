<?php

abstract class Functions{
    
  
    public static function calculateDist($sourceLat,$sourceLong,$destLat,$destLong){
        echo $sourceLat.",".$sourceLong." ".$destLat.",".$destLong;
    	if (! is_null ( $sourceLat ) and ! is_null ( $sourceLong ) and ! is_null ( $destLat ) and ! is_null ( $destLong )) {
    		try{
    		$fullurl = "https://maps.googleapis.com/maps/api/distancematrix/json?&origins=$sourceLat,$sourceLong&destinations=$destLat,$destLong&mode=walking&key=AIzaSyDrlobwQzB5g6FXvcT1brN29k30u6N9iCk";
    		$string = "";
    		$string .= file_get_contents ( $fullurl ); // get json content
			//echo $string;exit;
    		$json_a = json_decode ( $string, true ); // json decoder
    		// $distance=$json_a['rows'][0]['elements']['distance'];
    		//echo '<pre>';
              //      print_r($json_a);exit;
    		foreach ( $json_a ['rows'] [0] as $rows ) {
    			 //echo $rows[0]['distance']['text'];exit;
    			$distances = explode ( " ", $rows [0] ['distance'] ['text'] );
    			//print_r ( $distances );exit;
    		}
    		// print_r($json_a['rows'][0]);
    		//echo '<br>';
    		 
    		
    		$distKm=$distances[0];
               // echo "\n".$distKm;exit;
    		return $distKm;
    		}catch (Exception $ex){
    			echo $ex->getMessage();
    		}
    	}
    }
}
