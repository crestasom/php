<?php

class VertexController extends MainController {

    public function __construct() {
        $this->isLoggedIn();
    }

    public function index() {
        $model = $this->getModel("Vertex");
        $data['model'] = $model;
//var_dump($data['model']);
//exit;
        $this->loadView("index", $data);
    }

    public function create() {

        $model = $this->getModel("Vertex");
        $data=array("model"=>$model);

        if (isset($_POST['create'])) {
        	//echo "<pre>";print_r($_POST['Vertex']);exit;
            $model->attributes = $_POST['Vertex'];
            $insert = $model->insert();
            if ($insert === TRUE) {
                $this->setFlash("success", "Stop: ".$model->attributes['name']." has been successfully added to database...");
                $this->redirect(controller."/index");
            }
            else{
                $this->setFlash("error", "Stop can not be created...".$insert[2]);
            }
        }
        $this->loadView("create",$data);
    }

    public function update($id = NULL) {
        $model = $this->getModel("Vertex");
        $data['model'] = $model;
        $editData = $model->findById($id);
        

        if (isset($_POST['update'])) {
            $model->attributes = $_POST['Vertex'];
            //$model->attributes['isNew']=1;
            //to update password
            //if($editData->password!=$model->attributes['password'])
             //$model->attributes['password'] = md5($model->attributes['password']);
            $update = $model->update($id);
            if ($update === TRUE) {
                $this->setFlash("success", "Vertex has been successfully updated...");
                $this->redirect( controller."/index");
            } else {
                $this->setFlash("error", "Vertex can not be updated...".$update[2]);
            }
        }
        $data['editData']=$editData;
        $this->loadView("update", $data);
    }

    public function view($id = NULL) {
        $model = $this->getModel("Vertex");
        $data['model'] = $model;
        $data['viewData'] = $model->findById($id);
        $this->loadView("view", $data);
    }

    public function delete($id = NULL) {
        $model = $this->getModel("Vertex");
        $name=$model->getVertexTitle($id);
        $model->condition = "where id=$id";
        $delete = $model->deleteById($id);
        if ($delete)
            $this->setFlash("success", "Vertex:".$name." has been successfully removed...");
            $this->redirect(controller . "/index");
    }
    
    public function createCompositeReference(){

    	$model = $this->getModel("Vertex");
    	$data=array("model"=>$model);
    	
    	if (isset($_POST['create'])) {
    		//echo "<pre>";print_r($_POST['Vertex']);exit;
    		$id1=$_POST['Vertex']['ref1'];
    		$id2=$_POST['Vertex']['ref2'];
    		
    		$id = $id1.",".$id2;
    		$name=$_POST['Vertex']['name'];
    		$sql = "INSERT INTO reference_stops VALUES('$id','$name')";
    		$insert=$model->insertByQuery($sql);
    		if ($insert === TRUE) {
    			$this->setFlash("success", "Stop: ".$model->attributes['name']." has been successfully added to database...");
    			$this->redirect(controller."/index");
    		}
    		else{
    			$this->setFlash("error", "Composite Reference Stop can not be created...".$insert[2]);
    		}
    	}
    	$refStops=$model->getReferenceVertex();
    	$data['refStops']=$refStops;
    	
    	$this->loadView("createComposite",$data);
    }

}
