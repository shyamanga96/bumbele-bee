<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  function __construct() {   
    parent::__construct();
    $this->load->model('Admin_model');
    $this->load->model('Customer_model');

  } 

  public function index()
  {
   $user_data = $this->session->userdata();

   if (isset($user_data['username'])) {
    redirect('admin/orders');

  }else{

  }
  $this->load->view('admin/login');
} 

public function logincheck(){

  $user_data = $this->session->userdata();

  if (isset($user_data['username'])) {
    redirect('admin/orders');

  }else{
    $username=$_POST['userName']; 
    $password= md5($_POST['password']); 

    $user = $this->Admin_model->getUser($username,$password);


    if(count($user) > 0){    
     $user_data = array(
      'username' => $username,
    );

     $this->session->set_flashdata('welcome_back', ' '.$username);

     $this->session->set_userdata($user_data);  
     redirect('admin/orders');    

   }else{       
     $this->session->set_flashdata('login_error', 'Invalid Username or Password!');
     redirect('admin-login');
   }
 }

}

public function customerLogin()
{
  $user_data = $this->session->userdata();

  if (isset($user_data['email'])) {
    redirect('customer/account');
  }else{
   $this->load->view('customer_login');
 }
 
}

public function customerRegister()
{
  $user_data = $this->session->userdata();

  if (isset($user_data['email'])) {
    redirect('customer/account');
  }else{
    $this->load->view('customer_register');
  }
  
}

public function customerRegisterDetails()
{

  $cus = $this->Customer_model->getCustomerDetailsByEmail($_POST['email']);



  if (count($cus) <= 0) {
    $data = [

      'f_name'=>$_POST['f_name'],
      'l_name'=>$_POST['l_name'],
      'birthday'=>$_POST['birthday'],
      'email'=>$_POST['email'],
      'password'=>md5($_POST['f_name']),
    ];

    $cus_id = $this->Customer_model->addCustomerDetails($data);

    $user_data = array(
      'email' => $_POST['email'],
      'customerId'=>$cus_id
    );

    $this->session->set_userdata($user_data);  
    redirect('customer/account');  
  }else{
    $this->session->set_flashdata('reg_error', 'The email you entered is already registerd!');
    redirect('sign-up');
  }



}

public function customerLoginCheck()
{
 $user_data = $this->session->userdata();

 if (isset($user_data['email'])) {
  redirect('customer/account');

}else{
  $email=$_POST['email']; 
  $password= md5($_POST['password']); 

  $user = $this->Customer_model->getCustomer($email,$password);


  if(count($user) > 0){    
   $user_data = array(
    'email' => $email,
    'customerId'=>$user[0]->id,
    'username'=>$user[0]->f_name

  );

   $this->session->set_flashdata('welcome_back', ' '.$email);

   $this->session->set_userdata($user_data);  
   redirect('customer/account');    

 }else{       
   $this->session->set_flashdata('login_error', 'Invalid Username or Password!');
   redirect('sign-in');
 }
}
}

function logout(){
  $this->session->sess_destroy();
  redirect('admin-login');
} 

public function customerLogout()
{
  $this->session->sess_destroy();
  redirect('sign-in');
}    

}
?>