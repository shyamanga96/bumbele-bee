<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  function __construct() {   
    parent::__construct();
    $this->load->model('Admin_model');

  } 

  public function index()
  {
   $user_data = $this->session->userdata();

   if (isset($user_data['username'])) {
    redirect('admin/gallery');

  }else{

  }
  $this->load->view('admin/login');
} 

public function logincheck(){

  $user_data = $this->session->userdata();

  if (isset($user_data['username'])) {
    redirect('admin/gallery');

  }else{
    $username=$_POST['userName']; 
    $password= md5($_POST['password']); 

    $user = $this->Admin_model->getUser($username,$password);


    if(count($user) > 0){    
     $user_data = array(
      'username' => $username
    );

     $this->session->set_flashdata('welcome_back', ' '.$username);

     $this->session->set_userdata($user_data);  
     redirect('admin/gallery');    

   }else{       
     $this->session->set_flashdata('login_error', 'Invalid Username or Password!');
     redirect('admin-login');
   }
 }

}

function logout(){
  $this->session->sess_destroy();
  redirect('admin-login');
}     

}
?>