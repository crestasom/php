<?php

Class DbConfig{
public $hostname="localhost";
public $username="root";
public $password="";
public $database="college_project_db";
public  $driver="mysql";

public function connect(){
    try{
    $dsn="$this->driver:host=$this->hostname;dbname=$this->database";
    
    $pdo=new PDO($dsn,  $this->username,  $this->password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // var_dump($pdo);
   // exit;
    return($pdo);
    }catch(PDOException $ex){
        die($ex->getMessage());
    }
}

}