<?php

class Voting extends MainModel {

    public $notShowInTheView=array("password");

    public function __construct() {
        $this->tableName = "votes";
        parent::__construct();
    }

    public function labels() {
        return array(
            'project_code'=>'Project Code',
            'vote'=>'Number of Votes'
            
        );
    }
    
    public function getTop(){
    	$voting=new Voting();
    	$sql="select count(project_code) as vote,project_code from votes group by project_code order by vote desc";
    	$dataList=$voting->findAllByQuery($sql);
    	return $dataList;    	 
    }

    
}
