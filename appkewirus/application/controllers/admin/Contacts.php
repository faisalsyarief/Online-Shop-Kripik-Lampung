<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Maaf, silahkan login admin terlebih dahulu!');
			redirect('login');
		}
		$this->load->model('product_model');
	}

	public function index()
	{
		$data['contacts'] = $this->product_model->get_contact();
        $this->load->view('backend/contact_data', $data);
	}

	public function edit_contact($id)
	{
		$this->form_validation->set_rules('name','Nama Perusahaan','required');
		$this->form_validation->set_rules('address','Alamat','required');
		$this->form_validation->set_rules('zip_code','Kode Pos','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('telp','No Telepon','required');
		$this->form_validation->set_rules('latitude','Latitude','required');
		$this->form_validation->set_rules('longitude','Longitude','required');
		
		if($this->form_validation->run() == FALSE){
			$data['contact'] = $this->product_model->find_contact($id);
			$this->load->view('backend/form_edit_contact', $data);
		}else{
			$contact_data = array (
				'name' => set_value('name'),
				'address' => set_value('address'),
				'zip_code' => set_value('zip_code'),
				'email' => set_value('email'),
				'telp' => set_value('telp'),
				'latitude' => set_value('latitude'),
				'longitude' => set_value('longitude')
			);
			$this->product_model->update_contact($id, $contact_data);
			redirect('admin/contacts');
		}
	}
}