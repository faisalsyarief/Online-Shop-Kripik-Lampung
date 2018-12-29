<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {
	
	public function process()
	{
		$payment_data = array(
			'code' => $this->get_payment_code(),
			'date' => date('Y-m-d'),
			'time' => date('H:i:s'),
			'user_id' => $this->get_logged_user_id(),
			'status' => 'Belum bayar'
		);
		$this->db->insert('payments',$payment_data);
		
		foreach($this->cart->contents() as $item){
			$order_data = array(
				'payment_code' => $this->get_payment_code_for_order(),
				'user_id' => $this->get_logged_user_id(),
				'product_code' => $item['id'],
				'date' => date('Y-m-d'),
				'time' => date('H:i:s'),
				'quantity' => $item['qty'],
				'price' => $item['price'],
				'status' => 'Belum diproses'
			);
			$this->db->insert('orders',$order_data);	
		}
		return TRUE;
	}
	
	public function get_payment_code()
	{
		$hasil=$this->db->query("SELECT MAX(RIGHT(code,6)) AS kode_max FROM payments");
		$kode = "";
		if($hasil->num_rows() > 0){
			foreach($hasil->result() as $kd){
                $tmp = ((int)$kd->kode_max)+1;
                $kode = sprintf("%06s", $tmp);
            }
		}else{
			$kode = "000001";
		}

		$karakter = "PAY";
		return $karakter.$kode;
	}

	public function get_payment_code_for_order()
	{
		$hasil=$this->db->select_max('code')->from('payments')->get();
		if($hasil->num_rows() > 0){
			foreach($hasil->result() as $kd){
				$kode = $kd->code;
			}
			return $kode;
		}else{
			return false;
		}
	}

	public function get_payment()
	{
		$hasil=$this->db->get('payments');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function get_payment_by_code($payment_code){
		$hasil = $this->db->where('code',$payment_code)->limit(1)->get('payments');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return false;
		}
	}
	
	public function get_orders_by_payment($payment_code){
		$hasil = $this->db->where('payment_code',$payment_code)
		->from('users')
		->join('orders','users.id=orders.user_id')
		->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function get_payment_check($code){
		$hasil = $this->db->where('code',$code)->limit(1)->get('payments');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function get_order()
	{
		$hasil=$this->db->get('orders');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function get_logged_user_id()
	{
		$hasil = $this->db->select('id')->where('username',$this->session->userdata('username'))->limit(1)->get('users');
		if($hasil->num_rows() > 0){
			return $hasil->row()->id;
		}else{
			return false;
		}
	}

	public function find($code){
		$payment = $this->db->where('code',$code)->limit(1)->get('payments');
		if($payment->num_rows() > 0){
			return $payment->row();
		}else{
			return array();
		}
	}

	public function mark_payment_confirmed($payment_code, $amount, $data_payments){
		$ret = true;
		$payment = $this->db->where('code',$payment_code)->limit(1)->get('payments');
		if($payment->num_rows() == 0){
			$ret = $ret && false;
		}else{
			$total = $this->db->select('SUM(quantity * price) AS total')->where('payment_code',$payment_code)->get('orders');
			if($total->row()->total > $amount ){
				$ret = $ret && FALSE ;
			}else{
				$this->db->where('code',$payment_code)->update('payments',$data_payments);
			}
		}
		return $ret;
	}
	
	public function mark_payment_paid($code,$data){
		$this->db->where('code',$code)->update('payments',$data);
	}

	public function mark_payment_canceled($code, $data){
		$this->db->where('code',$code)->update('payments',$data);
	}

	public function get_shopping_history($user){
		$hasil = $this->db->select('p.*, SUM(o.quantity * o.price) AS total')->from('payments p, users u, orders o')
		->where('u.username',$user)
		->where('u.id = p.user_id')
		->where('o.payment_code = p.code')
		->group_by('o.payment_code')
		->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}
	
	public function find_order($id){
		$invoice = $this->db->where('id',$id)->limit(1)->get('orders');
		if($invoice->num_rows() > 0){
			return $invoice->row();
		}else{
			return array();
		}
	}
	
	public function send_order($id,$data){
		$this->db->where('id',$id)->update('orders',$data);
	}

	public function get_payment_reports(){
		$hasil = $this->db->where(array('status' => 'Sudah bayar'))
		->from('users')
		->join('payments','users.id=payments.user_id')
		->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function get_order_reports(){
		$hasil = $this->db->where(array('status' => 'Sudah diproses'))
		->from('users')
		->join('orders','users.id=orders.user_id')
		->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function search_payment_reports($tgl_awal,$tgl_akhir){
		$hasil = $this->db->where('date >=', $tgl_awal)
		->where('date <=', $tgl_akhir)
		->where(array('status' => 'Sudah bayar'))
		->from('users')
		->join('payments','users.id=payments.user_id')
		->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function search_order_reports($tgl_awal,$tgl_akhir){
		$hasil = $this->db->where('date >=', $tgl_awal)
		->where('date <=', $tgl_akhir)
		->where(array('status' => 'Sudah diproses'))
		->from('users')
		->join('orders','users.id=orders.user_id')
		->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function get_new_order()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get_where('orders', array('status' => 'Belum diproses'));
		return $query->result();
	}
}