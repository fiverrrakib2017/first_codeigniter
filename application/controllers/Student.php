<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
    // public function __construct() {
    //     parent:: __construct();
    //     $this->load->model('Student_model');
    // }
    
	public function index()
	{
        // $this->load->model('Student_model');
        // $result['data']=$this->Student_model->get_students();

        $sql ="SELECT * FROM students";
        $result['data']=$this->db->query($sql)->result_array();

		return  $this->load->view('Student_message',$result);

        // $_student = $this->Student_model->sel_result("select * from students");
        // if(!empty($_student)){
        //     foreach($_student as $row){
        //         print_r($row);
        //     }
        // }
        
	}
    public function delete_student(){
        if ($this->input->is_ajax_request()) {
             // Get the student ID from the AJAX POST request
             $student_id = $this->input->post('id');

            // Load the Student_model
            $this->load->model('Student_model');

            // Call the model's method to delete the student
            $result = $this->Student_model->delete_student($student_id);
            if ($result) {
                // Student deleted successfully
                echo 1;
            } else {
                // Error deleting student
                echo 0;
            }
            
        }
    }
}
