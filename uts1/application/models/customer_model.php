<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class customer_model extends CI_model{

 public function getcustomer($id=null){
 
    if ($id == null) {
 
        return $this->db->get ('customer')->result_array();
 
    }else {
 
        return $this->db->get_where('customer', ['id_customer'=>$id])->result_array();

    }
 }

 public function deletecustomer($id){

    $this->db->delete('customer',['id_customer'=>$id]);
 
    return $this->db->affected_rows();
 }
 
 public function createcustomer($data){
 
    $this->db->insert('customer',$data);
 
    return $this->db->affected_rows();
 
}


public function updatecustomer($data,$id){

    $this->db->update('customer',$data,['id_customer'=>$id]);

    return $this->db->affected_rows();

}
}