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

		// print_r($data);die();

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






	
	public function gallery()
	{
		// $data['images'] = $this->Admin_model->getGalleryItemsBack();
		$this->load->view('admin/gallery');
	}

	public function addGalleryImages()
	{

		if (isset($_FILES["images"])) {
			for ($i=0; $i < count($_FILES["images"]['name']) ; $i++) { 
				if ($_FILES["images"]["tmp_name"][$i]!="") {
					$image_info = getimagesize($_FILES["images"]["tmp_name"][$i]);
					$image_width = $image_info[0];
					$image_height = $image_info[1];


			        // upload Image
					$random1 = substr(number_format(time() * rand(),0,'',''),0,10); 
					$target_dir = "application_res/images/gallery/";
					$image = $random1.basename($_FILES["images"]["name"][$i]);
					$target_file = $target_dir . $image;
					$moved = move_uploaded_file($_FILES["images"]["tmp_name"][$i], $target_file);


					$data = [
						'image'=>$target_file,
						'width'=>$image_width,
						'height'=>$image_height
					];
					$this->Admin_model->addGalleryImagesData($data);
				}
			}
			$this->session->set_flashdata('gallerySuccess', 'Images Added Successfully!');
			redirect('admin/gallery');
		}else{
			$this->session->set_flashdata('galleryError', 'Max Image Size 1MB!');

			redirect('admin/gallery');
		}

	}

	public function deleteGalleryItemDetailsById($id)
	{
		$this->Admin_model->deleteGalleryItemDetailsById($id);
		$this->session->set_flashdata('galleryError', 'Image Deleted Successfully!');

		redirect('admin/gallery');
	}

	public function resetPassword()
	{
		$this->load->view('admin/password_reset');
	}

	public function resetPasswordData()
	{
		$data = [
			"password" => md5($_POST['password'])
		];

		$this->Admin_model->passwordResetData($data);
		$this->session->set_flashdata('partnerSuccess', 'Password Changed Successfully!');

		redirect('admin/resetPassword');

	}




}
