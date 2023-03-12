<?php

class Admin_model extends CI_Model {


  function __construct() {   
    parent::__construct();
  } 

  /* SI: FROUNTEND */
  public function getProducts($start,$limit)
  {
    $this->db->order_by('id','DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get('products');

    return $query->result();
  }



  /* SI: BACKEND */
  function getUser($username, $password){

    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $query = $this->db->get('users');

    return $query->result();         
  } 

  public function addProductDetails($data)
  {
   $this->db->insert('products', $data);

   return $this->db->insert_id();
 }

 public function addProductsImages($data)
 {
   $this->db->insert('product_images', $data);

   return $this->db->insert_id();
 }

 public function getProductsBack()
 {
  $this->db->order_by('id','DESC');
  $query = $this->db->get('products');

  return $query->result();
}

public function deleteProductDetailsById($id)
{
  $this->db->where('id', $id);
  $this->db->delete('products');
}

public function deleteProductImagesByProductId($id)
{
  $this->db->where('product_id', $id);
  $this->db->delete('product_images');
}

public function getProductDetailsById($id)
{
  $this->db->where('id', $id);
  $query = $this->db->get('products');

  return $query->row();
}

public function getProductImagesById($id)
{
  $this->db->where('product_id', $id);
  $query = $this->db->get('product_images');

  return $query->result();
}

public function deleteProductImageById($id)
{
  $this->db->where('id', $id);
  $this->db->delete('product_images');
}

public function editProductDetailsById($id,$data)
{
  $this->db->where('id', $id);
  $this->db->update('products', $data);
}

public function getAllOrders()
{
  $this->db->order_by('id','DESC');
  $query = $this->db->get('orders');

  return $query->result();
}

public function getOrderDetailsById($id)
{

  $this->db->where('id', $id);
  $query = $this->db->get('orders');

  return $query->row();
}

public function getItemsByOrderId($id)
{
 $this->db->select('order_items.*, products.*');
 $this->db->from('order_items');
 $this->db->join('products', 'order_items.item_id=products.id', 'left');
 $this->db->where('order_id', $id);
 $query = $this->db->get();

 return $query->result();
}








public function getGalleryItemsBack()
{
  $this->db->order_by('id','DESC');
  $query = $this->db->get('gallery');

  return $query->result();
}


public function addGalleryImagesData($data)
{
  $this->db->insert('gallery', $data);

  return $this->db->insert_id();
}

public function deleteGalleryItemDetailsById($id)
{
  $this->db->where('id', $id);
  $this->db->delete('gallery');
}

public function passwordResetData($data)
{
  $this->db->where('id', 1);
  $this->db->update('users', $data);
}


}
