<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    public function list()
    {
        $query = $this->db->get('pegawai');
        return $query->result();
    }

    public function insert($data = [])
    {
        $result = $this->db->insert('pegawai', $data);
        return $result;
    }
    public function show($id)
    {
        $this->db->select('*');
        $this->db->from('pegawai'); 
        $this->db->join('jabatan', 'pegawai.kode=jabatan.kode');
        $this->db->where('id',$id);    
        $query = $this->db->get();
        return $query->row();
    }
    public function update($id, $data = [])
    {
        // TODO: set data yang akan di update
        // https://www.codeigniter.com/userguide3/database/query_builder.html#updating-data

        $this->db->where('id', $id);
        $this->db->update('pegawai', $data);
        return result;
    }
    
    public function delete($id)
    {
        // TODO: tambahkan logic penghapusan data
        $this->db->where('id', $id);

        $this->db->delete('pegawai');
    }

    function data($number,$offset){
		return $query = $this->db->get('pegawai',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		return $this->db->get('pegawai')->num_rows();
	}
    
}
