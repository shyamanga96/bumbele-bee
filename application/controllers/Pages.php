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
		$data['products'] = $this->Admin_model->getProducts(0,8,'all');
		$data['categories'] = $this->Admin_model->getAllCategories();
		$this->load->view('index',$data);
	}

	public function shop($c_id='all')
	{

		if ($c_id=="") {
			$c_id='all';
		}

		$data['products'] = $this->Admin_model->getProducts(0,100,$c_id);
		$data['categories'] = $this->Admin_model->getAllCategories();
		// print_r($data);die();
		$this->load->view('shop',$data);
	}

	public function productDetails($id)
	{
		$data['product'] = $this->Admin_model->getProductDetailsById($id);
		$data['product_images'] = $this->Admin_model->getProductImagesById($id);

		$this->load->view('product_details',$data);

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

		if ($url=="details") {
			redirect('pages/productDetails/'.$id);
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

	public function placeOrder()
	{
		// print_r($this->cart->contents());die();
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

		$order_data=[
			'customer_id'=>$user_data['customerId'],
			'contact_nu'=>$_POST['contact_nu'],
			'country'=>$_POST['country'],
			'address1'=>$_POST['address1'],
			'address2'=>$_POST['address2'],
			'city'=>$_POST['city'],
			'notes'=>$_POST['notes'],
			'type'=>'COD',
			'total'=>$this->cart->total(),
			'd_date'=>date_format(new DateTime('today'),"Y-m-d")
		];

		if ($_POST['payment']=="installment") {
			$order_data['type']="installment";

			$time = strtotime(date_format(new DateTime('today'),"Y-m-d"));
			$final = date("Y-m-d", strtotime("+1 month", $time));

			$order_data['next_pay_date']=$final;
			$order_data['installment']=$this->cart->total()/3;

		}

		

		$order_id = $this->Customer_model->addOrderData($order_data);

		foreach ($this->cart->contents() as $item) {

			$order_item_data = [

				'order_id'=>$order_id,
				'item_id'=>$item['id'],
				'qty'=>$item['qty'],
				'price'=>$item['price']
			];

			$this->Customer_model->addOrderItemsByOrderId($order_item_data);

			$data = array(
				'rowid' => $item['rowid'],
				'qty'   => 0
			);

			$this->cart->update($data);
		}
		$this->session->set_flashdata('order_placed', '#'.$order_id.' Order Placed Successfully! Place check it on your "Orders" tab.');
		redirect('customer/account');

	}
}