<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


	public function index()
	{
		$this->load->view('index');
	}

	public function shop()
	{
		$this->load->view('shop');
	}

	public function productDetails()
	{
		$this->load->view('product_details');

	}
}