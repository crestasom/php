<?php

class Vertex extends MainModel {

    public $notShowInTheView=array("password");

    public function __construct() {
        $this->tableName = "stops";
        parent::__construct();
    }

    public function labels() {
        return array(
            'name' => 'Name',
        	'referenceStops' => 'Reference Stop',
            'latCode' => 'Latitude',
            'longCode' =>'Longitude'
            
        );
    }

    public function getCatagories(){
        $this->condition="category_id='0'";
        return $this->findAll();
    }
    
    public function  getVertexTitle($id=NULL){
    	$ids=explode(",", $id);
    	
    	$size=sizeof($ids);
    	//echo $size;exit;
    	$name=null;
        $data=$this->findById($ids[0]);
       if($data)
        {
            $name=$data->name;
        }else{
        	$name= "Null";
        }
       // echo $name;exit;
    	if($size==2){
    		$data=$this->findById($ids[1]);
    		$name.=",".$data->name;
    		//echo $name;exit;
    	}
    	
    		return $name;
    	
        
    }
    
    public function getCmpReferenceVertex(){
    	$sql="SELECT * FROM reference_stops";
    	$cmpRef=$this->findAllByQuery($sql);
    	//print_r($cmpRef);exit;
    	return $cmpRef;
    }
    
    public function  getReferenceVertex(){
    	$this->condition=" referenceStops=:refPoint";
    	$this->params['refPoint']=0;
    	$refPoints=$this->findAll();
    	
    	return $refPoints;
    }
}
