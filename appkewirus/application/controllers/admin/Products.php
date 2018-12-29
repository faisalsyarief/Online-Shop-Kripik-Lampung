<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
		$data['products'] = $this->product_model->get_product();
        $this->load->view('backend/manage_products', $data);
	}

	public function add_product()
	{
		$this->form_validation->set_rules('name','Nama Produk','required');
		$this->form_validation->set_rules('description','Deskripsi','required');
		$this->form_validation->set_rules('category','Kategori','required');
		$this->form_validation->set_rules('price','Harga','required|numeric');
		$this->form_validation->set_rules('discount','Diskon','required');
		$this->form_validation->set_rules('stock','Stok','required|numeric');
		//$this->form_validation->set_rules('userfile','Gambar','required');
		
		if ($this->form_validation->run() == FALSE)
		{

			$data['categories'] = $this->product_model->get_category();
			$this->load->view('backend/form_add_product', $data);
		}else{
			$config['upload_path'] = './uploads/product-image/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '300';
			$config['max_width']  = '2000';
			$config['max_height']  = '2000';
	
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload())
			{
				$data['categories'] = $this->product_model->get_category();
				$this->load->view('backend/form_add_product', $data);
			}else{
				$image = $this->upload->data();
				$product_data = array (
					'code' => $this->product_model->get_code(),
					'name' => set_value('name'),
					'description' => set_value('description'),
					'category' => set_value('category'),
					'price' => set_value('price'),
					'discount' => set_value('discount'),
					'stock' => set_value('stock'),
					'image' => $image['file_name']
				);
				$this->product_model->insert($product_data);
				redirect('admin/products');
			}
		}
	}

	public function detail_product($code)
	{
		$data['products'] = $this->product_model->get_product_detail($code);
        $this->load->view('backend/product_detail', $data);
	}

	public function edit_product($code)
	{
		$this->form_validation->set_rules('name','Nama Produk','required');
		$this->form_validation->set_rules('description','Deskripsi','required');
		$this->form_validation->set_rules('category','Kategori','required');
		$this->form_validation->set_rules('price','Harga','required|numeric');
		$this->form_validation->set_rules('discount','Diskon','required');
		$this->form_validation->set_rules('stock','Stok','required|numeric');
		
		if($this->form_validation->run() == FALSE){
			$data['product'] = $this->product_model->find($code);
			$data['categories'] = $this->product_model->get_category();
			$this->load->view('backend/form_edit_product', $data);
		}else{
			if($_FILES['userfile']['name'] !=''){
				
				$config['upload_path'] = './assets/uploads/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']	= '1024';
				$config['max_width']  = '2000';
				$config['max_height']  = '2000';
		
				$this->load->library('upload', $config);
			
				if ( ! $this->upload->do_upload())
				{
					$data['product'] = $this->product_model->find($code);
					$data['categories'] = $this->product_model->get_category();
					$this->load->view('backend/form_edit_product', $data);
				}else{
					$image = $this->upload->data();
					$product_data = array (
						'name' => set_value('name'),
						'description' => set_value('description'),
						'category' => set_value('category'),
						'price' => set_value('price'),
						'discount' => set_value('discount'),
						'stock' => set_value('stock'),
						'image' => $image['file_name']
					);
					$this->product_model->update($code, $product_data);
					redirect('admin/products');
				}
			}else{
				$product_data = array (
					'name' => set_value('name'),
					'description' => set_value('description'),
					'category' => set_value('category'),
					'price' => set_value('price'),
					'discount' => set_value('discount'),
					'stock' => set_value('stock')
				);
				$this->product_model->update($code, $product_data);
				redirect('admin/products');
			}
		}	
	}

	public function delete_product($code)
	{
		$this->product_model->delete($code);
		redirect('admin/products');	
	}
}