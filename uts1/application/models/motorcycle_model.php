<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class motorcycle_model extends CI_model{

 public function getmotor($id=null){
    if ($id == null) {
        return $this->db->get ('motorcycle')->result_array();
    }else {
        return $this->db->get_where('motorcycle', ['id_m'=>$id])-> result_array();
    }
 }

 public function deletemotor($id){
    $this->db->delete('motorcycle',['id_m'=>$id]);
    return $this->db->affected_rows();
 }

 public function createmotor($data){
    $this->db->insert('motorcycle',$data);
    return $this->db->affected_rows();
    }
   
    public function updatemotor($data,$id){
    $this->db->update('motorcycle',$data,['id_m'=>$id]);
    return $this->db->affected_rows();
    }
   }