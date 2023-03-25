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

		$order_items = [];

		foreach ($this->cart->contents() as $item) {

			$order_item_data = [

				'order_id'=>$order_id,
				'item_id'=>$item['id'],
				'qty'=>$item['qty'],
				'price'=>$item['price']
			];

			$this->Customer_model->addOrderItemsByOrderId($order_item_data);

			$product = $this->Admin_model->getProductDetailsById($item['id']);

			$o_item = [
				'name' => $product->name,
				'qty'=>$item['qty'],
				'image' => $product->cover_image,
				'price' => $product->price-($product->price*($product->discount/100)),
			];

			array_push($order_items, $o_item);

			$data = array(
				'rowid' => $item['rowid'],
				'qty'   => 0
			);

			$this->cart->update($data);
		}

		$emaildata['customer_data'] = $cus_data;
		$emaildata['order_data'] = $order_data;
		$emaildata['order_items'] = $order_items;
		$emaildata['order_id'] = $order_id;

		$message = $this->load->view('email', $emaildata, true);

		// print_r($message);die();

		
		// $message = '<h1>test</h1>';

		$this->load->library('email');

		$this->email->from('bumblebee@codexivelk.com', 'BumbleBee');
		$this->email->to($_POST['email']);

		$this->email->subject('BumbleBee Receipt');
		$this->email->message($message);
		$this->email->set_mailtype("html");

		if($this->email->send()) {
			echo "send";
		} else {
			echo "fail";
		}


		$user = 94766718614;
		$password = 7758;
		$text = urlencode("Your order #".$order_id." is confirmed. Total order value: Rs.".number_format($order_data['total']).". Delivery within 4 working days. Thank You. BumbleBee.");

		$to = "94".$_POST['contact_nu'];

		$api_url ="http://www.textit.biz/sendmsg/";
		$curl = curl_init($api_url.'?id='.$user.'&pw='.$password.'&to='.$to.'&text='.$text);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Accept: application/json'
		)
	);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Make it so the data coming back is put into a string

	// Send the request
	$response = curl_exec($curl);
	$res= explode(":",$response);

	
	$this->session->set_flashdata('order_placed', '#'.$order_id.' Order Placed Successfully! Place check it on your "Orders" tab.');
	redirect('customer/account');

}
}