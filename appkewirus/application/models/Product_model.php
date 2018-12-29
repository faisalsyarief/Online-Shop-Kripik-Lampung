<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
	
	public function get_code()
	{
		$hasil=$this->db->query("SELECT MAX(RIGHT(code,4)) AS kode_max FROM products");
		$kode = "";
		if($hasil->num_rows() > 0){
			foreach($hasil->result() as $kd){
                $tmp = ((int)$kd->kode_max)+1;
                $kode = sprintf("%04s", $tmp);
            }
		}else{
			$kode = "0001";
		}

		$karakter = "PRO";
		return $karakter.$kode;
	}

	public function get_product()
	{
		$hasil=$this->db->get('products');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function get_category()
	{
		$hasil=$this->db->get('categories');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function insert_category($category_data)
	{
		$this->db->insert('categories',$category_data);
	}

	public function find_category($id)
	{
		$hasil = $this->db->where('id',$id)->limit(1)->get('categories');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function detail_category($id)
	{
		$hasil = $this->db->where('id',$id)->limit(1)->get('categories');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function update_category($id, $category_data)
	{
		$this->db->where('id',$id)
		->update('categories',$category_data);	
	}

	public function delete_category($id)
	{
		$this->db->where('id',$id)
		->delete('categories');
	}

	public function get_help()
	{
		$hasil=$this->db->get('helps');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function insert_help($help_data)
	{
		$this->db->insert('helps',$help_data);
	}

	public function find_help($id)
	{
		$hasil = $this->db->where('id',$id)->limit(1)->get('helps');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function detail_help($id)
	{
		$hasil = $this->db->where('id',$id)->limit(1)->get('helps');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function update_help($id, $help_data)
	{
		$this->db->where('id',$id)
		->update('helps',$help_data);	
	}

	public function delete_help($id)
	{
		$this->db->where('id',$id)
		->delete('helps');
	}

	public function get_contact()
	{
		$hasil=$this->db->get('contacts');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function find_contact($id)
	{
		$hasil = $this->db->where('id',$id)->limit(1)->get('contacts');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function update_contact($id, $contact_data)
	{
		$this->db->where('id',$id)
		->update('contacts',$contact_data);	
	}

	public function get_product_detail($code)
	{
		$hasil = $this->db->where('code',$code)->get('products');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
		 	return false;
		}
	}
	
	public function find($code)
	{
		$hasil = $this->db->where('code',$code)->limit(1)->get('products');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}
	
	public function insert($product_data)
	{
		$this->db->insert('products',$product_data);
	}
	
	public function update($code, $product_data)
	{
		$this->db->where('code',$code)
		->update('products',$product_data);	
	}
	
	public function delete($code)
	{
		$this->db->where('code',$code)
		->delete('products');
	}
	
	public function product_categories($category)
	{
		$this->db->order_by('code', 'DESC');
		$query = $this->db->get_where('products', array('category' => $category));
		return $query->result();
	}

	public function product_search($key)
	{
		$this->db->order_by('code', 'DESC');
		$query = $this->db->like('name',$key)->get('products');
		return $query->result();
	}
	
	public function pagination($limit,$start)
	{
		$this->db->order_by('code', 'DESC');
		$this->db->limit($limit, $start);
		$hasil = $this->db->get('products');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}
}