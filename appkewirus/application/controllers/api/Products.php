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
	public function __construct(){
		parent::__construct();
		$this->load->model('api_model');

		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Method: PUT, GET, POST, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, x-xsrf-token');
	}

	public function index()
	{
		$products = $this->api_model->get_product();
		if(!empty($products)){
			foreach ($products as $product) {
				$json[] = array(
					'code' => $product['code'],
					'name' => $product['name'],
					'description' => $product['description'],
					'category' => $product['category'],
					'price' => $product['price'],
					'discount' => $product['discount'],
					'stock' => $product['stock'],
					'image' => $product['image']
					);
			}
		}else{
			$json = array();
		}
		echo json_encode($json);
	}

	public function detail()	
	{
		$code = $this->input->get('code');
		if(!empty($code)){
			$data = array('code' => $code);
			$product = $this->api_model->get_product_by_code($data);
			$json = array(
				'code' => $product['code'],
				'name' => $product['name'],
				'description' => $product['description'],
				'category' => $product['category'],
				'price' => $product['price'],
				'discount' => $product['discount'],
				'stock' => $product['stock'],
				'image' => $product['image']
				);
		}else{
			$json = array();
		}
		echo json_encode($json);
	}

	public function add()	
	{
		$dataobjek = json_decode(file_get_contents("php://input"));
		$code = $dataobjek->code;
		$name = $dataobjek->name;
		$description = $dataobjek->description;
		$category = $dataobjek->category;
		$price = $dataobjek->price;
		$discount = $dataobjek->discount;
		$stock = $dataobjek->stock;
		$image = $dataobjek->image;
		if(!empty($code)){
			$data = array(
				'code' => $code,
				'name' => $name,
				'description' => $description,
				'category' => $category,
				'price' => $price,
				'discount' => $discount,
				'stock' => $stock,
				'image' => $image
				);

			$product = $this->api_model->insert_product($data);
			if(!empty($product)){
				$json['status'] = "Data gagal disimpan";
			}else{
				$json['status'] = "Data berhasil disimpan";
			}
			echo json_encode($json);
		}
	}

	public function edit()	
	{
		$code = $this->input->get('code');
		$dataobjek = json_decode(file_get_contents("php://input"));
		$name = $dataobjek->name;
		$description = $dataobjek->description;
		$category = $dataobjek->category;
		$price = $dataobjek->price;
		$discount = $dataobjek->discount;
		$stock = $dataobjek->stock;
		$image = $dataobjek->image;
		if(!empty($name)){
			$data = array(
				'name' => $name,
				'description' => $description,
				'category' => $category,
				'price' => $price,
				'discount' => $discount,
				'stock' => $stock,
				'image' => $image
				);

			$product = $this->api_model->update_product($code, $data);
			if(!empty($product)){
				$json['status'] = "Data gagal diedit";
			}else{
				$json['status'] = "Data berhasil diedit";
			}
			echo json_encode($json);
		}
	}

	public function delete()	
	{
		$id_token = $this->input->get('id_token');
		$decoded = JWT::decode($id_token, "my Secret key!", array('HS256'));
		if($decoded->group=='1'){
			$code = $this->input->get('code');
			$product = $this->api_model->delete_product($code,$id_token);
			$json['status'] = "Data berhasil dihapus";
		}else{
			$json['warning'] = "Anda bukan admin"; 
		}
		echo json_encode($json);
	}
}
