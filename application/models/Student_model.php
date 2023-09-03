<?php

class Student_model extends CI_Model{
    //load data
    function get_students()
  {
    $query=$this->db->get("students");
    return $query->result();
  }
  

}





?>