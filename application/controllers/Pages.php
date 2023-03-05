<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct() {   
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Customer_model');

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

	public function cart()
	{
		$this->load->view('cart');
	}

	public function addToCart($id,$url='')
	{
		$baseUrl = base_url();

		$productDetails = $this->Admin_model->getProductDetailsById($id);



		$exists = false;
		$rowid = '';
		$qty = 1;
		foreach ($this->cart->contents() as $item) {
			if($item['id'] == $id)
			{
				$exists = true;
				$rowid = $item['rowid'];
				$qty = $item['qty'];
			} 
		}

		if($exists)
		{
			//item already in the cart
			$data = array(
				'rowid' => $rowid,
				'qty'   => 1 +$qty
			);

			$this->cart->update($data);      
		} else {
			$data = array(
				'id'      => $productDetails->id,
				'price'   => $productDetails->price-($productDetails->price*($productDetails->discount/100)),
				'qty'   => 1,
				'name'    => $productDetails->name,
				'image'    => $productDetails->cover_image,
			);

			$this->cart->insert($data);
		}

		redirect($url);
	}

	public function deleteItemFromCart($rowid)
	{
		$data = array(
			'rowid' => $rowid,
			'qty'   => 0
		);

		$this->cart->update($data);

		redirect('cart');
	}

	public function checkout()
	{
		$user_data = $this->session->userdata();

		$data['nodata']= 0;
		$data['age'] = 0;

		if (isset($user_data['customerId'])) {
			$data['customer'] = $this->Customer_model->getCustomerDetailsById($user_data['customerId']);

			$from = new DateTime($data['customer']->birthday);
			$to   = new DateTime('today');

			if ($from->diff($to)->y >=18) {
				$data['age'] = 1;
			}
		}

		$this->load->view('checkout',$data);
	}
}