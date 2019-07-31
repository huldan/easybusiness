<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nama_barang extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Nama_barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datanama_barang=$this->Nama_barang_model->get_all();//panggil ke modell
      $datafield=$this->Nama_barang_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => '{namamodule}/nama_barang/nama_barang_list',
        'sidebar'=>'{namamodule}/sidebar',
        'css'=>'{namamodule}/crudassets/css',
        'script'=>'{namamodule}/crudassets/script',
        'datanama_barang'=>$datanama_barang,
        'datafield'=>$datafield,
        'module'=>'{namamodule}',
        'titlePage'=>'nama_barang',
        'controller'=>'nama_barang'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => '{namamodule}/nama_barang/nama_barang_form',
        'sidebar'=>'{namamodule}/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'{namamodule}/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'{namamodule}/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'{namamodule}/nama_barang/create_action',
        'module'=>'{namamodule}',
        'titlePage'=>'nama_barang',
        'controller'=>'nama_barang'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Nama_barang_model->get_by_id($id);
      $data = array(
        'contain_view' => '{namamodule}/nama_barang/nama_barang_edit',
        'sidebar'=>'{namamodule}/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'{namamodule}/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'{namamodule}/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'{namamodule}/nama_barang/update_action',
        'dataedit'=>$dataedit,
        'module'=>'{namamodule}',
        'titlePage'=>'nama_barang',
        'controller'=>'nama_barang'
       );
      $this->template->load($data);
    }


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Nama_barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('{namamodule}/nama_barang'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_nama_barang', TRUE));
        } else {
            $data = array(
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Nama_barang_model->update($this->input->post('id_nama_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('{namamodule}/nama_barang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Nama_barang_model->get_by_id($id);

        if ($row) {
            $this->Nama_barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('{namamodule}/nama_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('{namamodule}/nama_barang'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

	$this->form_validation->set_rules('id_nama_barang', 'id_nama_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}