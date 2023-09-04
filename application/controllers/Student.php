<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
    // public function __construct() {
    //     parent:: __construct();
    //     $this->load->model('Student_model');
    // }

    public function index()
    {
        // $this->load->model('Student_model');
        // $result['data']=$this->Student_model->get_students();

        $sql = "SELECT * FROM students";
        $result['data'] = $this->db->query($sql)->result_array();

        return  $this->load->view('Student_message', $result);

        // $_student = $this->Student_model->sel_result("select * from students");
        // if(!empty($_student)){
        //     foreach($_student as $row){
        //         print_r($row);
        //     }
        // }

    }
    public function delete_student()
    {
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
    public function add_student(){
       
        if (isset($_POST['add_student_data'])) {

            $student_name=$_POST['student_name'];
            $student_class=$_POST['student_class'];
            /* GET THE FILE NAME AND SIZE */
            $file_name= $_FILES['file']['name'];
            $file_size= $_FILES['file']['size'];

            /* GET The file name path extension*/
            $extension=pathinfo($file_name,PATHINFO_EXTENSION);

            /* SET The file Valid extension*/
            $valid_extension=array("jpg","jped","gif","png");

            /* SET The file Size*/
            $maxSize=2*1024*1024;
            /* Check The file Size*/
            if($file_size >$maxSize){
                echo 2;
            }else{
                 if (in_array($extension,$valid_extension)) {
                    $new_name=rand().".".$extension;
                    $path="image/".$new_name;
                    $result=move_uploaded_file($_FILES['file']['tmp_name'],$path);
                    if ($result) {
                        $data = array(
                            'name' => $student_name,
                            'file_path' => $path,
                            'student_class' => $student_class
                        );
                        /* Insert The data students Database*/
                        $this->db->insert('students', $data);
    
                        echo 1;
                    } else {
                        //echo 'Error moving the uploaded file.'; 
                        echo 3;
                    }
                }else{
                    //echo 'Invalid file extension.';
                    echo 0;
                }
            }
         
        }

        //echo  $_FILES['file']['name'];
        //print_r($_POST);
    }
}
