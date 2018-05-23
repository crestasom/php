<?php

Class DbConfig{
public $hostname="localhost";
public $username="shrestha_nepali";
public $password=")D*iL=M}s8%3";
public $database="shrestha_college_project_database_nepali";
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