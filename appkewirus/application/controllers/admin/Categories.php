<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

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
	 * @see https://codeigniter.com/category_guide/general/urls.html
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
		$data['categories'] = $this->product_model->get_category();
        $this->load->view('backend/manage_categories', $data);
	}

	public function add_category()
	{
		$this->form_validation->set_rules('category','Kategori','required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('backend/form_add_category');
		}else{
			$category_data = array (
				'category' => set_value('category')
			);
			$this->product_model->insert_category($category_data);
			redirect('admin/categories');
		}	
	}

	public function detail_category($id)
	{
		$data['categories'] = $this->product_model->detail_category($id);
        $this->load->view('backend/category_detail', $data);
	}

	public function edit_category($id)
	{
		$this->form_validation->set_rules('category','Kategori','required');
		
		if($this->form_validation->run() == FALSE){
			$data['category'] = $this->product_model->find_category($id);
			$this->load->view('backend/form_edit_category', $data);
		}else{
			$category_data = array (
				'category' => set_value('category')
			);
			$this->product_model->update_category($id, $category_data);
			redirect('admin/categories');
		}	
	}

	public function delete_category($id)
	{
		$this->product_model->delete_category($id);
		redirect('admin/categorys');	
	}
}