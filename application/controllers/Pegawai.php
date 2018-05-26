<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Jabatan_model');
        $this->load->model('Pegawai_model');

    }

    public function index()
    {
        $pegawai = $this->Pegawai_model->list();

        $data = [
                    'title' => 'Pemrograman Web Framework :: Data Pegawai',
                    'pegawai' => $pegawai,
                ];

           

                $this->load->database();
		$jumlah_data = $this->Pegawai_model->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/pegawai/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 2;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['user'] = $this->Pegawai_model->data($config['per_page'],$from);
                
        $this->load->view('pegawai/index', $data);
    }
    public function create($error='')
    {
        $jabatan = $this->Jabatan_model->list();
        $data = [
            'error' => $error,
            'data' => $jabatan
        ];
        $this->load->view('pegawai/create', $data);
    }

    public function show($id)
    {
        $pegawai = $this->Pegawai_model->show($id);
        $data = [
            'data' => $pegawai
        ];
        $this->load->view('pegawai/show', $data);
    }
    
    public function store()
    {
        // Ambil value 
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');
        $alamat = $this->input->post('alamat');
        $kode = $this->input->post('kode');

        

        $data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			);
		$this->Pegawai_model->insert($data,'pegawai');
		redirect('pegawai/index');

    }

    public function edit($id,$error='')
    {
      // TODO: tampilkan view edit data
        $pegawai = $this->Pegawai_model->show($id);
        $jabatan = $this->Jabatan_model->list();
        $data = [
            'data' => $pegawai,
            'datajab' => $jabatan,
            'error' => $error
        ];
        $this->load->view('pegawai/edit', $data);
      
    }

    public function update($id)
    {
        //Ambil Value
        $id=$this->input->post('id');
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');

        // Validasi Nama dan Jabatan
        $dataval = [
            'nama' => $nama,
            'jabatan' => $jabatan
            ];
        $errorval = $this->validate($dataval);

        if ($errorval==false)
        {  
                $data = [
                    'nama' => $nama,
                    'kode' => $jabatan
                    ];
                $result = $this->Pegawai_model->update($id,$data);

                if ($result)
                {
                    redirect('pegawai');
                }
                else
                {
                    $data = array('error' => 'Gagal');
                    $this->load->view('pegawai/edit', $data);
                }
            }
            else
            {
                $data = [
                    'nama' => $nama,
                    'kode' => $jabatan,

                    ];
                $result = $this->Pegawai_model->update($id,$data);
                
                if ($result)
                {
                    redirect('pegawai');
                }
                else
                {
                    $data = array('error' => 'Gagal');
                    $this->load->view('pegawai/edit', $data);
                $error = validation_errors();
                $this->edit($id,$error);
            }
        }  
    }
    public function destroy($id)
    {
        $pegawai = $this->Pegawai_model->show($id);

        delete_files(FCPATH.'assets/uploads/'.$pegawai->foto);
        
        $this->Pegawai_model->delete($id);

        redirect('pegawai');
    }

    public function validate($dataval)
    {
        // Validasi Nama dan Jabatan
        $rules = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required|callback_alpha_space'
            ]
          ];

        $this->form_validation->set_rules($rules);

        if (! $this->form_validation->run())
        { return true; }
        else
        { return false; }
    } 

    public function alpha_space($str)
    {
        return ( ! preg_match("/^([a-z ])+$/i", $str)) ? FALSE : TRUE;
    }
}

    
    