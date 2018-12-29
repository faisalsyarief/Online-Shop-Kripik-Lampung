<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->model('product_model');
	}

	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('index.php/home/index');
		$config['total_rows'] = $this->db->get('products')->num_rows();
		$config['per_page'] = '8';
		
		$this->pagination->initialize($config);
		$start = $this->uri->segment(3);
		
		$data['products'] = $this->product_model->pagination($config['per_page'],$start);
		$data['categories'] = $this->product_model->get_category();
		$this->load->view('home',$data);
	}

	public function search()
	{
		$this->form_validation->set_rules('search_product', 'Cari Barang', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->library('pagination');
			$config['base_url'] = base_url('index.php/home/index');
			$config['total_rows'] = $this->db->get('products')->num_rows();
			$config['per_page'] = '8';
			
			$this->pagination->initialize($config);
			$start = $this->uri->segment(3);
			
			$data['products'] = $this->product_model->pagination($config['per_page'],$start);
			$data['categories'] = $this->product_model->get_category();
			$this->load->view('home',$data);
		}else{
			$key = $this->input->post('search_product');
			$data['categories'] = $this->product_model->get_category();
			$data['products'] = $this->product_model->product_search($key);
			$this->load->view('view_product_category',$data);
		}
	}

	public function add_to_cart($product_code)
	{
		$product = $this->product_model->find($product_code);
		$discount = (1 - $product->discount) * $product->price;
		$data = array(
			'id' => $product->code,
            'qty' => 1,
            'price' => $discount,
			'image' => $product->image,
            'name' => $product->name
        );

		$this->cart->insert($data);
		redirect(base_url());
	}

	public function cart()
	{
		$data['categories'] = $this->product_model->get_category();
		$this->load->view('show_cart', $data);	
	}
	
	public function clear_cart()
	{
		$this->cart->destroy();
		redirect(base_url());	
	}

	public function view_detail($code)
	{
		$data['categories'] = $this->product_model->get_category();
		$data['products'] = $this->product_model->get_product_detail($code);
		$this->load->view('view_product_detail',$data);	
	}

	public function category($category)
	{
		$data['categories'] = $this->product_model->get_category();
		$data['products'] = $this->product_model->product_categories($category);
		$this->load->view('view_product_category',$data);	
	}
}
