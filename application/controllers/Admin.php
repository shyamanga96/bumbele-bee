<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {   
		parent::__construct();
		$this->load->model('Admin_model');

		$user_data = $this->session->userdata();

		if (!isset($user_data['username'])) {
			redirect('admin-login');
		}

	}

	
	public function gallery()
	{
		$data['images'] = $this->Admin_model->getGalleryItemsBack();
		$this->load->view('admin/gallery',$data);
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
