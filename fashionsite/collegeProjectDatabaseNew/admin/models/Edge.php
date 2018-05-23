<?php
class Edge extends MainModel {
	public $notShowInTheView = array (
			"password" 
	);
	public function __construct() {
		$this->tableName = "edges";
		parent::__construct ();
	}
	public function labels() {
		return array (
				'source_stop' => 'Source',
				'destination_stop' => 'Destination',
				'referenceStops'=>'Reference Stop',
				'distance' => 'Distance(KM)',
				'oneway' => 'Direction', 
		);
	}
	public function getStops() {
		$stop = new Vertex ();
		// $category->condition=' where category_id!=0';
		return $stop->findAll ();
	}
	public function getVertexTitle($id = NULL) {
		$vertex=new Vertex();
		$data = $vertex->findById ( $id );
		if ($data) {
			return $data->name;
		}else{
			return "Null";
		}
	}
	
	public function  getRefVertexTitle($id=NULL){
		$ids=explode(",", $id);
		 $stop=new Vertex();
		$size=sizeof($ids);
		//echo $size;exit;
		$name=null;
		$data=$stop->findById($ids[0]);
		//echo $ids[0]." ";
		if($data)
		{
			$name=$data->name;
		}else{
			$name= "Null";
		}
		// echo $name;exit;
		if($size==2){
			$data=$stop->findById($ids[1]);
			$name.=",".$data->name;
			//echo $name;exit;
		}
		 
		return $name;
		 
	
	}
	
	
	public function getDirection($check){
		if($check){
			return "One Way";
		}else{
			return "Two Way";
		}
	}
}
