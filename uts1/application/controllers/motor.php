<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class motor extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('motorcycle_model' , 'motor');
    }

    public function index_get()
    {
        $id = $this->get('id_motor');
        
        if ($id === null) {
        
            $motor = $this->motor->getmotor();
    
        } else {
        
        $motor = $this->motor->getmotor($id);
    }
        
    if($motor) {
 
        $this->response([
 
            'status' => true,
 
            'data' => $motor
 
        ], REST_Controller::HTTP_OK);
 
    } else {
 
        $this->response([
 
            'status' => false,
 
            'message' => 'id not found'
 
        ], REST_Controller::HTTP_NOT_FOUND) ;
 
    }
 
}

public function index_delete() {

    $id=$this->delete('id_m');

    if ($id===null) {

        $this->response([

            'status' => false,

            'message' => 'provide an id!'

        ], REST_Controller::HTTP_BAD_REQUEST);

    }else {

        if ($this->motor->deletemotor($id)>0) {

            //ok

            $this->response([

                'status' =>true,

                'id' => $id,

                'message' => 'deleted.'

            ], REST_Controller::HTTP_OK);

        }else {

            //id not found

            $this->response([

                'status' => false,

                'message' => 'id not found!'

            ], REST_Controller::HTTP_BAD_REQUEST);

        }

    }

}

public function index_post(){

    $data = [

        'name' => $this->post('name'),

        'merk' => $this->post('merk'),

        'number_plate' => $this->post('number_plate'),

        'type' => $this->post('type'),

    ];

    if ($this->motor->createmotor($data) > 0) {

        $this->response([

            'status' => true,

            'message' => 'new motor has been created'

        ], REST_Controller::HTTP_CREATED);

    }else {

        //id not found

        $this->response([

            'status' => false,

            'message' => 'failade to create new data!'


        ], REST_Controller::HTTP_BAD_REQUEST);

    }
}
    public function index_put(){
    
        $id = $this->put('id_m');
    
        $data = [
    
            'name' => $this->put('name'),
        
            'merk' => $this->put('merk'),
        
            'number_plate' => $this->put('number_plate'),
        
            'type' => $this->put('type'),
        
        ];
        
        if ($this->motor->updatemotor($data, $id) > 0) {
        
            $this->response([
        
                'status' => true,
        
                'message' => 'new has been updated'
        
            ], REST_Controller::HTTP_OK);
        
        }else {
        
            //id not found
        
            $this->response([
        
                'status' => false,
        
                'message' => 'failade to update new data!'
        
            ], REST_Controller::HTTP_BAD_REQUEST);
        
        }
        
    }
    
}

?>