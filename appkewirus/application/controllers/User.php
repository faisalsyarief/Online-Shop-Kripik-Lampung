<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('username'))
		{
			redirect('login');	
		}
		$this->load->model('user_model');
		$this->load->model('product_model');
	}

	public function index()
	{
		
	}


	public function detail_user($id)
	{
		$data['categories'] = $this->product_model->get_category();
		$data['users'] = $this->user_model->detail($id);
        $this->load->view('view_user_detail', $data);
	}

	public function edit_user($id)
	{
		$this->form_validation->set_rules('fullname','Nama Lengkap','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('telp','No Telepon','required|numeric');
		$this->form_validation->set_rules('username','Username','required|alpha_numeric|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric|matches[repassword]|min_length[8]|max_length[24]');
		$this->form_validation->set_rules('repassword','Konfirmasi Password','required|alpha_numeric');
		$this->form_validation->set_rules('gender','Jenis Kelamin','required');
		$this->form_validation->set_rules('address','Alamat','required');
		$this->form_validation->set_rules('zip_code','Kode Pos','required|numeric|max_length[5]');
		$this->form_validation->set_rules('province','Provinsi','required');
		$this->form_validation->set_rules('regency','Kabupaten/Kota','required');
		$this->form_validation->set_rules('district','Kecamatan','required');
		
		if($this->form_validation->run() == FALSE){
			$data = array (
				'categories' => $this->product_model->get_category(),
				'provinces' => $this->user_model->get_province(),
				'user' => $this->user_model->find($id)
				);
			$this->load->view('form_edit_user', $data);
		}else{
			$user_data = array (
				'fullname' => set_value('fullname'),
				'email' => set_value('email'),
				'telp' => set_value('telp'),
				'username' => set_value('username'),
				'password' => set_value('password'),
				'gender' => set_value('gender'),
				'address' => set_value('address'),
				'zip_code' => set_value('zip_code'),
				'province_id' => set_value('province'),
				'regency_id' => set_value('regency'),
				'district_id' => set_value('district'),
				'group' => '2'
			);
			$this->user_model->update($id, $user_data);
			redirect('user/detail_user/' . $this->session->userdata('id'));
		}	
	}
}