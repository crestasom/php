<?php

class MainModel {

    public $pdoObject = NULL;
    protected $tableName = NULL;
    public $condition = "1";
    public $params = array();
    public $attributes = array();
    public $lastInsertId=NULL;
    public $dbconfig;

    public function __construct() {
        $this->dbconfig = new DbConfig();
        $this->pdoObject = $this->dbconfig->connect();
        // var_dump($this->params);
        // exit;
    }
    /**
     * to find a row from table
     */
    public function getColumns($id = NULL) {
        $sql = "DESC $this->tableName";
        //echo $sql;
        //exit;
        $query = $this->pdoObject->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }

    

    /**
     * to find rows from table with custom sql
     */
    public function findAllByQuery($sql = NULL) {
        //$sql = "SELECT * FROM $this->tableName WHERE $this->condition";
        try {
            $query = $this->pdoObject->prepare($sql);
            $data = $query->execute($this->params);
            //echo $sql;
            //exit;
            //print_r($query->fetchall(PDO::FETCH_OBJ));
            if ($data) {
                return $query->fetchall(PDO::FETCH_OBJ);
            } else {
                return $query[2];
            }
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
	
    /**
     * to insert a record in database
     */
    public function insert() {
        $sql = "INSERT INTO $this->tableName (";
        //get only fields from the attributes
        $field = array_keys($this->attributes);
        $sql.=implode(", ", $field);
        $sql.=") VALUES (:";
        $sql.=implode(", :", $field);
        $sql.=")";
        //create params
        foreach ($this->attributes as $key => $value) {
            $this->params["$key"] = $value;
        }

            $query = $this->pdoObject->prepare($sql);
            $update = $query->execute($this->params);
            return $update;
    }



}
