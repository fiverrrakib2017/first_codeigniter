<?php

class Student_model extends CI_Model{
    //load data
    public function get_students(){
        // $query=$this->db->get("students");
        // return $query->result();
        $query = $this->db->get("students");
        return $query->result_array();
    }

    // public function sel_result($query){
    //     return $this->db->query($query)->result();
    // }
    
    // public function sel_row($query){
    //     return $this->db->query($query)->row();
    // }

    public function delete_student($deleteId){
        $this->db->where('id', $deleteId);
        $this->db->delete('students');

        // Check if the delete operation was successful
        return $this->db->affected_rows() > 0;
    }
  

}





?>