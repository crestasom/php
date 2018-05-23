<?php

class MainModel {

    public $pdoObject = NULL;
    protected $tableName = NULL;
    public $condition = "1";
    public $params = array();
    public $attributes = array();
    public $limit = 3;
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
    public function find() {
        $sql = "SELECT * FROM $this->tableName WHERE $this->condition";
        //echo $sql;
        //echo '<br>';
        //print_r($this->params);
        //exit;
        $query = $this->pdoObject->prepare($sql);
        $query->execute($this->params);
        //var_dump($query->fetch());
        //exit;
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * to find a row from table using custom sql
     */
    public function findByQuery($sql = NULL) {
        //$sql = "SELECT * FROM $this->tableName WHERE $this->condition";
//         echo $sql;
//         echo '<pre>';
//         print_r($this->params);
//         exit;
        //try{
        $query = $this->pdoObject->prepare($sql);
        $success = $query->execute($this->params);
        if($success){
            return $query->fetch(PDO::FETCH_OBJ);
        }
        else {
            return false;
        }
        //}catch(PDOException $ex){
        //  die($ex->getCode());
        //}
    }

    /**
     * to find a row from table
     */
    public function findById($id) {
        $sql = "SELECT * FROM $this->tableName WHERE id=$id";
        //echo $sql;
        //exit;
        $query = $this->pdoObject->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
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
     * to find rows from table
     */
    public function findAll() {
        $sql = "SELECT * FROM $this->tableName WHERE $this->condition";
        //echo $sql;
        //exit;
        $query = $this->pdoObject->prepare($sql);
        $query->execute($this->params);

        $data = $query->fetchall(PDO::FETCH_OBJ);
        if ($data) {
            return $data;
        } else
            return false;
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

    public function findAllByPagination() {

        // How many adjacent pages should be shown on each side?
        $adjacents = 2;

        /*
          First get total number of rows in data table.
          If you have a WHERE clause in your query, make sure you mirror it here.
         */
        $sql = "SELECT COUNT(*) as 'num' FROM $this->tableName WHERE $this->condition";
        //$total_pages = mysql_fetch_array(mysql_query($query));
        //$total_pages = $total_pages[num];
        $query = $this->pdoObject->prepare($sql);
        $query->execute($this->params);
        $data = $query->fetch(PDO::FETCH_OBJ);

        $total_pages = isset($data->num) ? $data->num : '0';

        /* Setup vars for query. */
        $targetpage = LINK_URL . controller . "/index";  //your file name  (the name of this file)
        $limit = $this->limit;         //how many items to show per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if ($page)
            $start = ($page - 1) * $limit;    //first item to display on this page
        else
            $start = 0;        //if no page var is given, set start to 0

            /* Get data. */
        $sql = "SELECT * FROM $this->tableName WHERE $this->condition LIMIT $start, $limit";
        $query = $this->pdoObject->prepare($sql);
        $query->execute($this->params);
        $allData = $query->fetchAll(PDO::FETCH_OBJ);


        /* Setup page vars for display. */
        if ($page == 0)
            $page = 1;     //if no page var is given, default to 1.
        $prev = $page - 1;       //previous page is page - 1
        $next = $page + 1;       //next page is page + 1
        $lastpage = ceil($total_pages / $limit);  //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;      //last page minus 1

        /*
          Now we apply our rules and draw the pagination object.
          We're actually saving the code to a variable in case we want to draw it more than once.
         */
        $pagination = "";
        if ($lastpage > 1) {
            $pagination .= "<div class=\"pagination\">";
            //previous button
            if ($page > 1)
                $pagination.= "<a href=\"$targetpage&page=$prev\">Prev</a>";
            else
                $pagination.= "<span class=\"disabled\">Prev</span>";

            //pages	
            if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                }
            }
            elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
                //close to beginning; only hide later pages
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                    $pagination.= "...";
                    $pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                    $pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
                }
                //in middle; hide some front and some back
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $pagination.= "<a href=\"$targetpage&page=1\">1</a>";
                    $pagination.= "<a href=\"$targetpage&page=2\">2</a>";
                    $pagination.= "...";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                    $pagination.= "...";
                    $pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                    $pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
                }
                //close to end; only hide early pages
                else {
                    $pagination.= "<a href=\"$targetpage&page=1\">1</a>";
                    $pagination.= "<a href=\"$targetpage&page=2\">2</a>";
                    $pagination.= "...";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                }
            }

            //next button
            if ($page < $counter - 1)
                $pagination.= "<a href=\"$targetpage&page=$next\">Next</a>";
            else
                $pagination.= "<span class=\"disabled\">Next</span>";
            $pagination.= "</div>\n";
        }
        $data = array();
        $data['totalPage'] = $total_pages;
        $data['limit'] = $limit;
        $data['start'] = $start;
        $data['pagination'] = $pagination;
        $data['allRecords'] = $allData;
        return $data;
    }

    public function deleteById($id = NULL) {
        $sql = "DELETE FROM $this->tableName WHERE id=$id";
        //echo $sql;
        //exit;
        $query = $this->pdoObject->prepare($sql);
        return $query->execute();
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

        //echo $this->tableName;
        //echo $sql;
        //echo '<br>';
        //print_r($this->params);
        //exit;
        //exit;
        //to insert record
        try {
            $query = $this->pdoObject->prepare($sql);
            $update = $query->execute($this->params);
            return $update;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    /*
     * update using custom query
     */

    public function updateByQuery($sql = NULL) {
        try {
            $query = $this->pdoObject->prepare($sql);
            $success = $query->execute($this->params);
            //echo $sql;
            //exit;
            if ($success) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    /*
     * to update a record
     */

    public function update($id = NULL) {
        $sql = "UPDATE $this->tableName SET ";
        $items = array();
        foreach ($this->attributes as $key => $value) {
            $items[] = "$key=:$key";
            $this->params[$key] = $value;
        }
        $sql.=implode(", ", $items);
        $sql.=" where id=$id";
        // echo $sql;
        //print_r($this->params);
        // exit;
        //to insert record
        try {
            $query = $this->pdoObject->prepare($sql);
            $update = $query->execute($this->params);
            return $update;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function getStatus($status) {
        if ($status) {
            return '<span class="label label-success">Active</label>';
        } else {
            return '<span class="label label-danger">In-Active</label>';
        }
    }

}
