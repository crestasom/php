<?php

class RouteController extends MainController {

    private $edgeArray;
    private $i;

    public function __construct() {
        $this->i = 0;
        // $this->edgeArray=array();
        // $_SESSION['ids']="";
    }

    public function index() {
        $this->isLoggedIn();
        $model = $this->getModel("Route");
        $data ['model'] = $model;
        // var_dump($data['model']);
        // exit;
        $this->loadView("index", $data);
    }

    public function create() {
        $this->isLoggedIn();
        $_SESSION['flag'] = 1;
        $model = $this->getModel("Route");
        $data = array(
            "model" => $model
        );

        if (isset($_POST ['create'])) {
            // echo '<pre>';
            $model->attributes = $_POST ['Route'];
            $model->attributes ['stops'] = implode(",", $_SESSION [IDS]);
            $_SESSION [IDS] = array();
            $insert = $model->insert();
            if ($insert === TRUE) {
                $this->setFlash("success", "Route has been successfully created...");
                $this->redirect(controller . "/index");
            } else {
                $this->setFlash("error", "Route can not be created..." . $insert [2]);
            }
        }
        $this->loadView("create", $data);
    }

    public function update($id = NULL) {
        $this->isLoggedIn();
        $model = $this->getModel("Route");
        $data ['model'] = $model;
        $editData = $model->findById($id);

        if (isset($_POST ['update'])) {
            $model->attributes = $_POST ['Route'];
            // to update password
            // if($editData->password!=$model->attributes['password'])
            // $model->attributes['password'] = md5($model->attributes['password']);
            $update = $model->update($id);
            if ($update === TRUE) {
                $this->setFlash("success", "Route has been successfully updated...");
                $this->redirect(controller . "/index");
            } else {
                $this->setFlash("error", "Route can not be updated..." . $update [2]);
            }
        }
        $data ['editData'] = $editData;
        $this->loadView("update", $data);
    }

    public function view($id = NULL) {
        $this->isLoggedIn();
        $model = $this->getModel("Route");
        $data ['model'] = $model;
        $data ['viewData'] = $model->findById($id);
        $this->loadView("view", $data);
    }

    public function delete($id = NULL) {
        $this->isLoggedIn();
        $model = $this->getModel("Route");

        $model->condition = "where id=$id";
        $delete = $model->deleteById($id);
//        $route = $model->findById($id);
//        $model->attributes = array();
//        if ($route->status) {
//            $model->attributes['status'] = 0;
//        } else {
//            $model->attributes['status'] = 1;
//        }
//        //$model->attributes['status']=0;
//        $delete = $model->update($id);
        if ($delete)
            $this->setFlash("success", "Route is successfully removed...");
        $this->redirect(controller . "/index");
    }

    public function cancel() {
        $this->isLoggedIn();
        $_SESSION[IDS] = array();
        $_SESSION['flag'] = 1;
        $this->redirect("route/index");
    }

    public function findEndStops() {
        $this->isLoggedIn();
        $stopId = $_POST ['stop'];
        $stop = new Vertex ();
        $stopRecord = $stop->findById($stopId);

        try {
            $edge = new Edge ();
            $edge->condition = " source_stop=:stopId or (destination_stop=:stopId and oneway=false)";
            $edge->params ["stopId"] = $stopId;
            $endStops = $edge->findAll();

            foreach ($endStops as $stops) {

                $stop = new Vertex ();
                $endStopDetails = $stop->findById($stops->destination_stop);
                if ($endStopDetails != $stopRecord) {
                    $stopDetail = array();
                    $stopDetail ['id'] = $endStopDetails->id;
                    $stopDetail ['name'] = $endStopDetails->name;
                    $data [] = $stopDetail;
                }
            }
            // $data['totalData']=$i;
            // print_r($data);exit;
        } catch (PDOException $ex) {
            $data ['error'] = $ex->getMessage();
        }
        echo json_encode($data);
    }

    public function findNextEdges() {
        $this->isLoggedIn();
        $route = new Route();
        $edge = new Edge ();
        $flag = isset($_SESSION['flag']) ? $_SESSION['flag'] : '1';
        $edgeIds = isset($_SESSION [IDS]) ? $_SESSION [IDS] : array();
        $edgeId = $_POST ['edge'];
        $edgeRecord = $edge->findById(abs($edgeId));
        if ($flag == 1) {
            if ($edgeId > 0) {
                $edgeIds[] = $edgeRecord->source_stop;
                $edgeIds[] = $edgeRecord->destination_stop;
            } else {
                $edgeIds[] = $edgeRecord->source_stop;
                $edgeIds[] = $edgeRecord->destination_stop;
            }
            $_SESSION['flag'] = 0;
        } else {
            if ($edgeId > 0) {
                $edgeIds [] = $edgeRecord->destination_stop;
            } else {
                $edgeIds [] = $edgeRecord->source_stop;
            }
        }
        $_SESSION [IDS] = $edgeIds;


        $edgeRecord = $edge->findById(abs($edgeId));
        if ($edgeId > 0) {
            $edgeDest = $edgeRecord->destination_stop;
        } else {
            $edgeDest = $edgeRecord->source_stop;
        }
        // echo $edgeDest;
        // find the
        // echo $stop;
        // exit;
        try {
            $edge = new Edge ();
            $edge->condition = " source_stop=:stopId or (destination_stop=:stopId and oneway=false)";
            $edge->params ["stopId"] = $edgeDest;
            $edgeRecords = $edge->findAll();
            //echo '<pre>';
            // print_r ( $edgeRecords );
            // exit ();
            // print_r($edgeRecords);exit;
            foreach ($edgeRecords as $edges) {
                $edgeDetail = array();
                if ($edges != $edgeRecord) {
                    if ($edges->destination_stop == $edgeDest) {
                        $edgeDetail ['id'] = - $edges->id;

                        $edgeDetail ['name'] = $route->getVertexTitle($edges->destination_stop) . "-" . $route->getVertexTitle($edges->source_stop);
                    } else {
                        $edgeDetail ['id'] = $edges->id;
                        $edgeDetail ['name'] = $route->getVertexTitle($edges->source_stop) . "-" . $route->getVertexTitle($edges->destination_stop);
                    }
                } else if ($edges == $edgeRecord) {
                    if ($edgeId > 0) {
                        $edgeDetail ['id'] = - $edges->id;
                        $edgeDetail ['name'] = $route->getVertexTitle($edges->destination_stop) . "-" . $route->getVertexTitle($edges->source_stop);
                    } else {
                        $edgeDetail ['id'] = $edges->id;
                        $edgeDetail ['name'] = $route->getVertexTitle($edges->source_stop) . "-" . $route->getVertexTitle($edges->destination_stop);
                    }
                }
                $data [] = $edgeDetail;
            }

            // $data[$stops->id]=$endStopDetails->name;
            // $i++;
            // $data['totalData']=$i;
// 			print_r ( $data );
// 			exit ;
            // $data['ids']=$this->edgeArray;
        } catch (PDOException $ex) {
            $data ['error'] = $ex->getMessage();
        }
        echo json_encode($data);
    }

    public function findNewRecords($date = null) {
        $data = array();
        $route = new Route();
        //$route->condition=" isNew='1'";
        $routeRecord = $route->findAll();
        $data['Route'] = $routeRecord;

        $edge = new Edge();
        //$edge->condition=" isNew='1'";
        $edgeRecord = $edge->findAll();
        $data['Edge'] = $edgeRecord;
        $stop = new Vertex();
        //$stop->condition=" isNew='1'";
        $vertexRecord = $stop->findAll();
        $data['Vertex'] = $vertexRecord;
         $version=new Version();
        $sql="select message from version order by id desc";
        $verRecord=$version->findByQuery($sql);
        $data['message'] = $verRecord->message;
        //echo '<pre>';
        echo json_encode($data);
    }

    

}
