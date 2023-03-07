<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct() {   
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Customer_model');

		$user_data = $this->session->userdata();

		if (!isset($user_data['email'])) {
			redirect('admin-login');
		}

	}


	public function account()
	{
		$user_data = $this->session->userdata();

		$data['orders'] = $this->Customer_model->getOrdersByCustomerId($user_data['customerId']);
		$data['customer'] = $this->Customer_model->getCustomerDetailsById($user_data['customerId']);

		$this->load->view('customer_account',$data);
	}

	public function accountDataUpdateById()
	{
		$user_data = $this->session->userdata();

		$cus_data = [
			'f_name'=>$_POST['f_name'],
			'l_name'=>$_POST['l_name'],
			'contact_nu'=>$_POST['contact_nu'],
			'birthday'=>$_POST['birthday'],
			'country'=>$_POST['country'],
			'address1'=>$_POST['address1'],
			'address2'=>$_POST['address2'],
			'city'=>$_POST['city']
		];

		$this->Customer_model->updateCustomerDetailsById($user_data['customerId'],$cus_data);

		$this->session->set_flashdata('user_update', 'User Details Updated Successfully!');
		redirect('customer/account');
	}




}
