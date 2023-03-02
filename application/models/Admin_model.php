<?php

class Admin_model extends CI_Model {


  function __construct() {   
    parent::__construct();
  } 

  /* SI: FROUNTEND */
  public function getGalleryItems($start,$limit)
  {
    $this->db->order_by('id','DESC');
    $this->db->limit($limit, $start);
    $query = $this->db->get('gallery');

    return $query->result();
  }



  /* SI: BACKEND */
  function getUser($username, $password){

    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $query = $this->db->get('users');

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
