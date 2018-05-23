<?php

class Route extends MainModel {

    public $notShowInTheView = array(
        "password"
    );

    public function __construct() {
        $this->tableName = "route";
        parent::__construct();
    }

    public function labels() {
        return array(
            'name' => 'Name',
            'vehicleType'=>'Vehicle Type',
            
        );
    }

    public function findallStop() {
        $stop = new Vertex ();
        $stops = $stop->findAll();
        // print_r($stops);exit;
        return $stops;
    }

    public function findallEdge() {
        $edge = new Edge ();
        $edges = $edge->findAll();
        foreach($edges as $row){
            if(!$row->oneway){
                
            }
        }
        // print_r($stops);exit;
        return $edges;
    }

    

    public function getRouteNames($edges = NULL) {
        $edgeNames = "";
        $edgeIds = explode(",", $edges);
        $size = sizeof($edgeIds);
        for ($i = 0; $i < $size; $i ++) {
            $id = $edgeIds [$i];
            $edge = new Edge ();
            $edgeRecord = $edge->findById(abs($id));
            if ($id > 0) {
                if ($i == $size - 1) {
                    $edgeNames .= $edgeRecord->name;
                } else {
                    $edgeNames .= $edgeRecord->name . ",";
                }
            } else {
                $names = explode("-", $edgeRecord->name);
                if ($i == $size - 1) {
                    $edgeNames .= $names [1] . "-" . $names [0];
                } else {

                    $edgeNames .= $names [1] . "-" . $names [0] . ",";
                }
            }
        }
        return $edgeNames;
    }

    public function getStopsNames($stops = NULL) {
//        print_r($stops);exit;
        $stopNames = "";
        $stopIds = explode(",", $stops);
        $size = sizeof($stopIds);
        for ($i = 0; $i < $size; $i ++) {
            $id = $stopIds [$i];
            $stop = new Vertex ();
            $stopRecord = $stop->findById($id);
            if ($i == $size - 1) {
                $stopNames.=$stopRecord->name;
            } else {

               $stopNames.=$stopRecord->name."<br>";
            }
        }
        return $stopNames;
    }

    public function getVertexTitle($id = NULL) {
        $vertex = new Vertex();
        $data = $vertex->findById($id);
        if ($data) {
            return $data->name;
        } else {
            return "Null";
        }
    }
     public function getDoubleSided($status) {
        if($status){
            return '<span class="label label-success">Yes</label>';
        }
    else {
        return '<span class="label label-primary">No</label>';    
        }   
    
    }

}
