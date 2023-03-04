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

  public function addCustomerDetails($data)
  {
   $this->db->insert('customers', $data);

   return $this->db->insert_id();
 }




}
