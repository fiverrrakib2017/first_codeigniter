<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function index($id){
        echo '<h1>This is Home '.$id.'</h1>';
    }
}


?>