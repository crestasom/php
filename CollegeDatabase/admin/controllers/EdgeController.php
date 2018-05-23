<?php

class EdgeController extends MainController {

    public function __construct() {
        $this->isLoggedIn();
    }

    public function index() {
        $model = $this->getModel("Edge");
        $data ['model'] = $model;
        // var_dump($data['model']);
        // exit;
        $this->loadView("index", $data);
    }

    public function create() {
        $model = $this->getModel("Edge");
        $data = array(
            "model" => $model
        );

        if (isset($_POST ['create'])) {
            // check if the edge already exists
            $insertData = $_POST ['Edge'];
// 			echo '<pre>';
// 			print_r($insertData);exit;
            $model->condition = " source_stop=:source and destination_stop=:destination";
            $model->params = array(
                ':source' => $insertData ['source_stop'],
                ':destination' => $insertData ['destination_stop']
            );
            $existEdge = $model->find();
            if (!$existEdge) {
                $stop = new Vertex();
                $model->attributes = $insertData;
                $distance = $this->calculateEdgeDistance($insertData['source_stop'], $insertData['destination_stop']);
                $model->attributes['distance'] = $distance;
// 				echo '<pre>';
// 				print_r($model->attributes);exit;
                $model->params = array();
                $insert = $model->insert();
                if ($insert === TRUE) {
                    $this->setFlash("success", "Edge has been successfully created...");
                    $this->redirect(controller . "/index");
                } else {
                    $this->setFlash("error", "Edge can not be created..." . $insert [2]);
                }
            } else {
                $this->setFlash("error", "Edge already exists");
            }
        }

        $vertex = new Vertex();
        $vertex->condition = " referenceStops=:refPoint";
        $vertex->params['refPoint'] = 0;
        $refPoints = $vertex->findAll();
        $cmpRefPoints = $vertex->getCmpReferenceVertex();
        $data['cmpRefPoints'] = $cmpRefPoints;
        $data['refPoints'] = $refPoints;
        $this->loadView("create", $data);
    }

    public function update($id = NULL) {
        $model = $this->getModel("Edge");
        $data ['model'] = $model;
        $editData = $model->findById($id);

        if (isset($_POST ['update'])) {
            $model->attributes = $_POST ['Edge'];
            //$model->attributes['distance']=0;
           // $model->attributes['isNew'] = 1;
            $distance = $this->calculateEdgeDistance($model->attributes['source_stop'], $model->attributes['destination_stop']);
            $model->attributes['distance'] = $distance;
            $update = $model->update($id);
            if ($update === TRUE) {
                $this->setFlash("success", "Edge has been successfully updated...");
                $this->redirect(controller . "/index");
            } else {
                $this->setFlash("error", "Edge can not be updated..." . $update [2]);
            }
        }

        $vertex = new Vertex();
        $vertex->condition = " referenceStops=:refPoint";
        $vertex->params['refPoint'] = 0;
        $refPoints = $vertex->findAll();
        $data['refPoints'] = $refPoints;
        $cmpRefPoints = $vertex->getCmpReferenceVertex();
        $data['cmpRefPoints'] = $cmpRefPoints;
        $data ['editData'] = $editData;
        $this->loadView("update", $data);
    }

    public function view($id = NULL) {
        $model = $this->getModel("Edge");
        $data ['model'] = $model;
        $data ['viewData'] = $model->findById($id);
        $this->loadView("view", $data);
    }

    public function delete($id = NULL) {
        $model = $this->getModel("Edge");
        $model->condition = "where id=$id";
        $delete = $model->deleteById($id);
        if ($delete)
            $this->setFlash("success", "Edge has been successfully removed...");
        $this->redirect(controller . "/index");
    }

    public function calculateEdgeDistance($source_stop = NULL, $destination_stop = NULL) {
        $edge = new Edge ();
        $stop = new Vertex ();
        $sourceDetail = $stop->findById($source_stop);
        $destinationDetail = $stop->findById($destination_stop);
        $sourceLat = $sourceDetail->latCode;
        $sourceLong = $sourceDetail->longCode;
        $destLat = $destinationDetail->latCode;
        $destLong = $destinationDetail->longCode;
        $distance = Functions::calculateDist($sourceLat, $sourceLong, $destLat, $destLong);
        return $distance;
    }

    public function updateVersion() {
        
        $sql = "update version set version=version+1";
        $version=new Version();
        $versionRecord=$version->find();
        $query = $version->pdoObject->prepare($sql);
        $query->execute($this->params);
        //var_dump($query->fetch());
        //exit;

        if ($query)
            $this->setFlash("success", "Version Updated Successfully");
        $this->redirect("edge/index");
    }

}
