<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct() {   
		parent::__construct();
		$this->load->model('Admin_model');

		$user_data = $this->session->userdata();

		if (!isset($user_data['email'])) {
			redirect('admin-login');
		}

	}


	public function account()
	{
		$this->load->view('customer_account');
	}




}
