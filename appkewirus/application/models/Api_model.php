<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {
	
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

	public function login($username, $password)
	{
		 $query = $this->db->where('username',$username)
		->where('password',$password)
		->limit(1)
		->get('users');
		 if ($query->num_rows() == 1) {
		    return $query->row();
		}else{
			return false;
		}
	}

	public function get_product()
	{
		$hasil=$this->db->get('products');
		if($hasil->num_rows() > 0){
			return $hasil->result_array();
		}else{
			return false;
		}
	}

	public function get_product_by_code($data=array())
	{
		$hasil=$this->db->get_where('products',$data)->result_array();
		if($hasil){
			return $hasil[0];
		}
	}

	public function insert_product($data=array())
	{
		$this->db->where('code',$code)->insert('products',$data);
	}

	public function update_product($code=array(), $data=array())
	{
		$this->db->where('code',$code)->update('products',$data);	
	}

	public function delete_product($code,$id_token)
	{
		$this->db->where("exists (SELECT * FROM jwt WHERE jwt.id_token = '$id_token')",NULL,FALSE)
		->where('code',$code)
		->delete('products');
	}

	public function get_user($id_token)
	{
		$hasil=$this->db->where("exists (SELECT * FROM jwt WHERE jwt.id_token = '$id_token')",NULL,FALSE)
		->get('users');
		if($hasil->num_rows() > 0){
			return $hasil->result_array();
		}else{
			return false;
		}
	}

	public function get_user_by_id($id,$id_token)
	{
		$hasil=$this->db->where("exists (SELECT * FROM jwt WHERE jwt.id_token = '$id_token')",NULL,FALSE)
		->where('id',$id)
		->get('users')
		->result_array();
		if($hasil){
			return $hasil[0];
		}
	}

	public function insert_user($data,$id_token)
	{
		$this->db->where("exists (SELECT * FROM jwt WHERE jwt.id_token = '$id_token')",NULL,FALSE)
		->insert('users',$data);
	}

	public function update_user($id,$data,$id_token)
	{
		$this->db->where("exists (SELECT * FROM jwt WHERE jwt.id_token = '$id_token')",NULL,FALSE)
		->where('id',$id)
		->update('users',$data);	
	}

	public function delete_user($id,$id_token)
	{
		$this->db->where("exists (SELECT * FROM jwt WHERE jwt.id_token = '$id_token')",NULL,FALSE)
		->where('id',$id)
		->delete('users');
	}
	public function insert_jwt($data=array())
	{
		$this->db->select('id');
		$this->db->from('jwt');
		$this->db->where(array('username'=>$data['username']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		if($prevCheck > 0){
			$prevResult = $prevQuery->row_array();
			$this->db->where(array('id'=>$prevResult['id']))->update('jwt',$data);
		}else{
			$this->db->insert('jwt',$data);
		}
	}
}
