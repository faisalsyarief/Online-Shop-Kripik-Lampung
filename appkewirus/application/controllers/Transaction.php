<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
		$this->load->model('transaction_model');
		$this->load->model('product_model');
	}

	public function index()
	{
		$is_processed = $this->transaction_model->process();
		if($is_processed){
			$this->cart->destroy();
			redirect('transaction/success');
		}else{
			$this->session->set_flashdata('error','Gagal untuk memproses pesanan anda, coba lagi!');
			redirect('home/cart');
		}
	}
	
	public function success()
	{
		$this->load->view('order_success');
	}

	public function payment_confirmation($payment_code=0){
		$this->form_validation->set_rules('payment_code','Kode Pembayaran','required');
		$this->form_validation->set_rules('amount','Jumlah Transfer','required|numeric');
		//$this->form_validation->set_rules('bukti', 'Bukti Transfer', 'required');
		
		if($this->form_validation->run() == FALSE){
			if($this->input->post('payment_code')){
				$data['payment_code'] = set_value('payment_code');
			}else{
				$data['payment_code'] = $payment_code;
			}
			$data['categories'] = $this->product_model->get_category();
			$this->load->view('form_payment_confirmation', $data);
		}else{
			$config['upload_path'] = './uploads/payment/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '1024';
			$config['max_width']  = '2000';
			$config['max_height']  = '2000';
	
			$this->load->library('upload', $config);
			
				if (! $this->upload->do_upload('bukti'))
				{
					if($this->input->post('payment_code')){
						$data['payment_code'] = set_value('payment_code');
					}else{
						$data['payment_code'] = $payment_code;
					}
					$this->load->view('form_payment_confirmation', $data);
				}else{
					$image = $this->upload->data();
					$data_payment = array (
						'status'=>'Konfirmasi',
						'date' => date('Y-m-d'),
						'time' => date('H:i:s'),
						'image' => $image['file_name']
					);
					$isValid = $this->transaction_model->mark_payment_confirmed(set_value('payment_code'),set_value('amount'),$data_payment);
					if($isValid){
						$this->session->set_flashdata('message','Terimakasih, kami akan mengecek konfirmasi pembayaran anda');
						redirect('transaction/shopping_history');
					}else{
						$this->session->set_flashdata('error','Maaf, data transfer yang anda masukkan salah, harap coba lagi');
						redirect('transaction/payment_confirmation/'.set_value('payment_code'));
					}
				}
			
		}
		
	}

	public function payment_confirmation_2($payment_code){
		$this->form_validation->set_rules('amount','Jumlah Transfer','required|numeric');
		
		if($this->form_validation->run() == FALSE){
			$data['payments'] = $this->transaction_model->get_orders_by_payment($payment_code);
			$data['categories'] = $this->product_model->get_category();
			$this->load->view('form_payment_confirmation_2', $data);
		}else{
			$config['upload_path'] = './uploads/payment/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '1024';
			$config['max_width']  = '2000';
			$config['max_height']  = '2000';
	
			$this->load->library('upload', $config);
			
				if (! $this->upload->do_upload('bukti'))
				{
					$data['payments'] = $this->transaction_model->get_orders_by_payment($payment_code);
					$data['categories'] = $this->product_model->get_category();
					$this->load->view('form_payment_confirmation_2', $data);
				}else{
					$image = $this->upload->data();
					$data_payment = array (
						'status'=>'Konfirmasi',
						'date' => date('Y-m-d'),
						'time' => date('H:i:s'),
						'image' => $image['file_name']
					);
					$isValid = $this->transaction_model->mark_payment_confirmed($payment_code,set_value('amount'),$data_payment);
					if($isValid){
						$this->session->set_flashdata('message','Terimakasih, kami akan mengecek konfirmasi pembayaran anda');
						redirect('transaction/shopping_history');
					}else{
						$this->session->set_flashdata('error','Maaf, data transfer yang anda masukkan salah, harap coba lagi');
						redirect('transaction/payment_confirmation/'.set_value('payment_code'));
					}
				}
			
		}
		
	}
	
	public function shopping_history(){
		$user = $this->session->userdata('username');
		$data['history'] = $this->transaction_model->get_shopping_history($user);
		$data['categories'] = $this->product_model->get_category();
		$this->load->view('shopping_history_list', $data);
	}
	
	public function canceled($code){
		$data['payment'] = $this->transaction_model->find($code);
		$data = array('status'=>'Batal');
		$this->transaction_model->mark_payment_canceled($code,$data);
		redirect('transaction/shopping_history');
	}
}