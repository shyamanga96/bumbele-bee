<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct() {   
		parent::__construct();
		$this->load->model('Admin_model');

	}

	public function index()
	{
		$data['products'] = $this->Admin_model->getProducts(0,8);
		$this->load->view('index',$data);
	}

	public function shop()
	{
		$data['products'] = $this->Admin_model->getProducts(0,100);
		// print_r($data);die();
		$this->load->view('shop',$data);
	}

	public function productDetails()
	{
		$this->load->view('product_details');

	}
}