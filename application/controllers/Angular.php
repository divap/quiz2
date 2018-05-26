<?php 
 if (!defined('BASEPATH'))exit('No direct script access allowed');

 class Angular extends CI_Controller {
  function __construct() {
   parent::__construct();
  }

  public function index() {
   $this->load->view('angular-filter-data');
  }
  
  public function data_angularnya(){
   $dt=$this->db->get('pegawai')->result();
   $arr_data=array();
   $i=0;
   foreach($dt as $r){
    $arr_data[$i]['id']=$r->id;
    $arr_data[$i]['nama']=$r->nama;
    $arr_data[$i]['alamat']=$r->alamat;
    $i++;
   }
   echo json_encode($arr_data);
  }
 }
?>