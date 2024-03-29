<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {   
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Customer_model');

		$user_data = $this->session->userdata();

		if (!isset($user_data['username'])) {
			redirect('admin-login');
		}

	}

	public function orders()
	{
		$orders = $this->Admin_model->getAllOrders();

		foreach ($orders as $key => $order) {
			$order->customer = $this->Customer_model->getCustomerDetailsById($order->customer_id);
		}

		$data['orders'] = $orders;

		$data['total_sales'] = $this->Admin_model->getOrderCount();
		$data['total_income'] = $this->Admin_model->getOrdersTotalSum();
		$data['total_customers'] = $this->Admin_model->totalCustomersCount();
		$data['total_products'] = $this->Admin_model->totalProductsCount();

		// print_r($data);die();
		$this->load->view('admin/orders',$data);
	}

	public function products()
	{
		$data['products'] = $this->Admin_model->getProductsBack();
		$data['categories'] = $this->Admin_model->getAllCategories();

		$this->load->view('admin/add_product',$data);
	}


	public function addProducts()
	{
		$data = [
			"name" => $_POST['name'],
			"price" => $_POST['price'],
			"discount" => $_POST['discount'],
			"description" => $_POST['description'],
			"a_date" => date("Y/m/d"),
			"category_id"=>$_POST['category_id']
		];

		// upload Cover Image
		$random1 = substr(number_format(time() * rand(),0,'',''),0,10); 
		$target_dir = "uploads/";
		$image = $random1.basename($_FILES["c_image"]["name"]);
		$target_file = $target_dir . $image;
		$moved = move_uploaded_file($_FILES["c_image"]["tmp_name"], $target_file);

		$data['cover_image'] = $target_file;

		$product_id = $this->Admin_model->addProductDetails($data);

		if (isset($_FILES["images"])) {
			for ($i=0; $i < count($_FILES["images"]['name']) ; $i++) { 
				if ($_FILES["images"]["tmp_name"][$i]!="") {

			        // upload Image
					$random1 = substr(number_format(time() * rand(),0,'',''),0,10); 
					$target_dir = "uploads/";
					$image = $random1.basename($_FILES["images"]["name"][$i]);
					$target_file = $target_dir . $image;
					$moved = move_uploaded_file($_FILES["images"]["tmp_name"][$i], $target_file);


					$dataset = [
						'product_id'=>$product_id,
						'image'=>$target_file,
					];

					$this->Admin_model->addProductsImages($dataset);
				}
			}
			
		}

		$this->session->set_flashdata('productSuccess', 'New Product Added Successfully!');
		redirect('admin/products');

	}

	public function editProductDetailsById($id)
	{
		$data['dataset'] = $this->Admin_model->getProductDetailsById($id);
		$data['images'] = $this->Admin_model->getProductImagesById($id);
		$data['categories'] = $this->Admin_model->getAllCategories();

		// print_r($data);die();
		$this->load->view('admin/edit_product',$data);
	}

	public function editProductDetailsData($id)
	{
		$data = [
			"name" => $_POST['name'],
			"price" => $_POST['price'],
			"discount" => $_POST['discount'],
			"description" => $_POST['description'],
			"a_date" => date("Y/m/d"),
			"category_id"=>$_POST['category_id']
		];

		// upload Cover Image
		if ($_FILES["c_image"]["error"]==0) {
			$random1 = substr(number_format(time() * rand(),0,'',''),0,10); 
			$target_dir = "uploads/";
			$image = $random1.basename($_FILES["c_image"]["name"]);
			$target_file = $target_dir . $image;
			$moved = move_uploaded_file($_FILES["c_image"]["tmp_name"], $target_file);

			$data['cover_image'] = $target_file;
		}

		$this->Admin_model->editProductDetailsById($id,$data);

		if (isset($_FILES["images"])) {
			for ($i=0; $i < count($_FILES["images"]['name']) ; $i++) { 
				if ($_FILES["images"]["tmp_name"][$i]!="") {

			        // upload Image
					$random1 = substr(number_format(time() * rand(),0,'',''),0,10); 
					$target_dir = "uploads/";
					$image = $random1.basename($_FILES["images"]["name"][$i]);
					$target_file = $target_dir . $image;
					$moved = move_uploaded_file($_FILES["images"]["tmp_name"][$i], $target_file);


					$dataset = [
						'product_id'=>$id,
						'image'=>$target_file,
					];

					$this->Admin_model->addProductsImages($dataset);
				}
			}
			
		}

		$this->session->set_flashdata('productSuccess', 'Product Updated Successfully!');
		redirect('admin/editProductDetailsById/'.$id);
	}

	public function deleteProductDetailsById($id)
	{
		$this->Admin_model->deleteProductDetailsById($id);
		$this->Admin_model->deleteProductImagesByProductId($id);
		$this->session->set_flashdata('productError', 'Product Deleted Successfully!');

		redirect('admin/products');
	}

	public function deleteProductImageById($id,$product_id)
	{
		$this->Admin_model->deleteProductImageById($id);
		$this->session->set_flashdata('productError', 'Product Image Deleted Successfully!');

		redirect('admin/editProductDetailsById/'.$product_id);
	}


	public function orderDetails($id)
	{

		$data = $this->Admin_model->getOrderDetailsById($id);
		$data->customerDetails = $this->Customer_model->getCustomerDetailsById($data->customer_id);

		$dataset['dataset'] = $data;

		$dataset['order_items'] = $this->Admin_model->getItemsByOrderId($id);

		$this->load->view('admin/order_details',$dataset);
	}


	public function updateOrderStatusById($id)
	{
		$data= [
			"note_admin"=>$_POST['note_admin'],
			"status"=>$_POST['o_status'],
		];

		$this->Admin_model->updateOrderDetailsById($id,$data);

		$this->session->set_flashdata('orderSuccess', 'Order Details Updated Successfully!');

		redirect('admin/orderDetails/'.$id);
	}


	public function productCategories()
	{
		$data['categories'] = $this->Admin_model->getAllCategories();
		$this->load->view('admin/categories',$data);
	}

	public function addCategoryData()
	{
		$random1 = substr(number_format(time() * rand(),0,'',''),0,10); 
		$target_dir = "uploads/";
		$image = $random1.basename($_FILES["image"]["name"]);
		$target_file = $target_dir . $image;
		$moved = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

		$data=[
			"name"=>$_POST['name'],
			"image"=>$target_file
		];

		$this->Admin_model->addCategoryData($data);

		$this->session->set_flashdata('categorySuccess', 'Category Added Successfully!');

		redirect('admin/productCategories/');
	}

	public function editCategory()
	{

		$data=[
			"name"=>$_POST['e_name']
		];

		if ($_FILES["e_image"]["tmp_name"]!="") {

			$random1 = substr(number_format(time() * rand(),0,'',''),0,10); 
			$target_dir = "uploads/";
			$image = $random1.basename($_FILES["e_image"]["name"]);
			$target_file = $target_dir . $image;
			$moved = move_uploaded_file($_FILES["e_image"]["tmp_name"], $target_file);

			$data['image'] = $target_file;
		}

		$this->Admin_model->editCategoryDataById($_POST['c_id'],$data);

		$this->session->set_flashdata('categorySuccess', 'Category Edited Successfully!');

		redirect('admin/productCategories');
	}





}
