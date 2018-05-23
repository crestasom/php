<?php
class Fare extends MainModel {
	public $notShowInTheView = array (
			"password" 
	);
	public function __construct() {
		$this->tableName = "fare_rate";
		parent::__construct ();
	}
	
}
