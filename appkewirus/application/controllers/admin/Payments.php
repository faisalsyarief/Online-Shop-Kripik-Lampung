<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

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
		$this->load->model('transaction_model');
	}

	public function index()
	{
		$data['payments'] = $this->transaction_model->get_payment();
        $this->load->view('backend/payment_data', $data);
	}

	public function detail($payment_id)
	{
		$data['payment'] = $this->transaction_model->get_payment_by_code($payment_id);
		$data['orders'] = $this->transaction_model->get_orders_by_payment($payment_id);
		$this->load->view('backend/payment_detail',$data);
	}

	public function check($code)
	{
		$data['payments'] = $this->transaction_model->get_payment_check($code);
		$this->load->view('backend/payment_check',$data);
	}
	
	public function paid($code)
	{
		$data['payment'] = $this->transaction_model->find($code);
		$data = array(
			'status'=>'Sudah bayar',
			'date' => date('Y-m-d'),
			'time' => date('H:i:s')
			);
		$this->transaction_model->mark_payment_paid($code,$data);
		redirect('admin/payments');
	}
	
	public function send($id)
	{
		$data['order'] = $this->transaction_model->find_order($id);
		$data = array(
			'status'=>'Sudah diproses',
			'date' => date('Y-m-d'),
			'time' => date('H:i:s')
			);
		$this->transaction_model->send_order($id,$data);
		redirect('admin/orders');
	}
}