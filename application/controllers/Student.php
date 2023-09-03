<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
    
	public function index()
	{
        // $this->load->model('Student_model');
        // $result['data']=$this->Student_model->get_students();


        $sql ="SELECT * FROM students";
        $result['data']=$this->db->query($sql);


		$this->load->view('Student_message',$result);
	}
}
