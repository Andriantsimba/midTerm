<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class customer extends REST_Controller
{

    public function __construct()
 
    {
 
        parent::__construct();
 
        $this->load->model('customer_model' , 'customer');
 
    }

 
    public function index_get()
 
    {
 
        $id = $this->get('id_customer');
 
        if ($id === null) {
 
            $customer = $this->customer->getcustomer();
 
        } else {
 
            $customer = $this->customer->getcustomer($id);
 
        }
 
        if($customer) {
 
            $this->response([
 
                'status' => true,
 
                'data' => $customer
 
            ], REST_Controller::HTTP_OK);
 
        } else {
 
            $this->response([
 
                'status' => false,
 
                'message' => 'id not found'
 
            ], REST_Controller::HTTP_NOT_FOUND) ;
 
        }
 
    }
 
    public function index_delete() {
 
        $id=$this->delete('id_customer');
 
        if ($id===null) {
 
 
            $this->response([

            'status' => false,
 
            'message' => 'provide an id!'
 
        ], REST_Controller::HTTP_BAD_REQUEST);
 
    }else {
 
        if ($this->customer->deletecustomer($id)>0) {
 
            //ok
 
            $this->response([
 
                'status' =>true,
 
                'id_customer' => $id,
 
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

        'phone_number' => $this->post('phone_number'),

        'id_m' => $this->post('id_m'),

        'date_start' => $this->post('date_start'),

        'date_back' => $this->post('date_back'),

    ];

    if ($this->customer->createcustomer($data) > 0) {

        $this->response([

            'status' => true,

            'message' => 'new customer has been created'

        ], REST_Controller::HTTP_CREATED);

    }else {

        //id not found

        $this->response([

            'status' => false,

            'message' => 'failed to create new data!'

        ], REST_Controller::HTTP_BAD_REQUEST);

    }

}

public function index_put(){

    $id = $this->put('id_customer');
 
    $data = [
 
        'name' => $this->put('name'),

        'phone_number' => $this->put('phone_number'),

        'id_m' => $this->put('id_m'),

        'date_start' => $this->put('date_start'),

        'date_back' => $this->put('date_back'),

    ];
 
    if ($this->customer->updatecustomer($data, $id) > 0) {
 
        $this->response([
 
            'status' => true,
 
            'message' => 'new customer has been updated'
 
        ], REST_Controller::HTTP_OK);
 
    }else {
 
        //id not found
 
        $this->response([
 
            'status' => false,
 
            'message' => 'failed to update new data!'
 
        ], REST_Controller::HTTP_BAD_REQUEST);
 
    }
 
}

}

?>
