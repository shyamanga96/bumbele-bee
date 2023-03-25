<?php

class Customer_model extends CI_Model {


  function __construct() {   
    parent::__construct();
  } 


  /* SI: BACKEND */
  function getCustomer($email, $password){

    $this->db->where('email', $email);
    $this->db->where('password', $password);
    $query = $this->db->get('customers');

    return $query->result();         
  } 

  public function getCustomerDetailsByEmail($email)
  {
    $this->db->where('email', $email);
    $query = $this->db->get('customers');

    return $query->result();   
  }

  public function addCustomerDetails($data)
  {
   $this->db->insert('customers', $data);

   return $this->db->insert_id();
 }

 public function getCustomerDetailsById($id)
 {
   $this->db->where('id', $id);
   $query = $this->db->get('customers');

   return $query->row();
 }

 public function updateCustomerDetailsById($id,$data)
 {
   $this->db->where('id', $id);
   $this->db->update('customers', $data);
 }

 public function addOrderData($data)
 {
  $this->db->insert('orders', $data);

  return $this->db->insert_id();
}

public function addOrderItemsByOrderId($data)
{
 $this->db->insert('order_items', $data);

 return $this->db->insert_id();
}

public function getOrdersByCustomerId($id)
{
  $this->db->order_by('id','DESC');
  $this->db->where('customer_id', $id);
  $query = $this->db->get('orders');

  return $query->result();
}




}
