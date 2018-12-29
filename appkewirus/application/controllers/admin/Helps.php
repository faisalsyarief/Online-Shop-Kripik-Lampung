<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helps extends CI_Controller {

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
	 * @see https://codeigniter.com/help_guide/general/urls.html
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
		$data['helps'] = $this->product_model->get_help();
        $this->load->view('backend/manage_helps', $data);
	}

	public function add_help()
	{
		$this->form_validation->set_rules('topic','Topik','required');
		$this->form_validation->set_rules('detail','Detail','required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('backend/form_add_help');
		}else{
			$help_data = array (
				'topic' => set_value('topic'),
				'detail' => set_value('detail')
			);
			$this->product_model->insert_help($help_data);
			redirect('admin/helps');
		}	
	}

	public function detail_help($id)
	{
		$data['helps'] = $this->product_model->detail_help($id);
        $this->load->view('backend/help_detail', $data);
	}

	public function edit_help($id)
	{
		$this->form_validation->set_rules('topic','Topik','required');
		$this->form_validation->set_rules('detail','Detail','required');
		
		if($this->form_validation->run() == FALSE){
			$data['help'] = $this->product_model->find_help($id);
			$this->load->view('backend/form_edit_help', $data);
		}else{
			$help_data = array (
				'topic' => set_value('topic'),
				'detail' => set_value('detail')
			);
			$this->product_model->update_help($id, $help_data);
			redirect('admin/helps');
		}	
	}

	public function delete_help($id)
	{
		$this->product_model->delete_help($id);
		redirect('admin/helps');	
	}
}