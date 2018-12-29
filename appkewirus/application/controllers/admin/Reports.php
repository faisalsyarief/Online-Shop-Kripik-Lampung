<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

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
		
		$this->load->model('transaction_model');
	}

	public function index()
	{
		$data['reports'] = $this->transaction_model->get_payment_reports();
        $this->load->view('backend/payment_report_data', $data);
	}

	public function order_reports()
	{
		$data['reports'] = $this->transaction_model->get_order_reports();
        $this->load->view('backend/order_report_data', $data);
	}

	public function search()
	{
		$this->form_validation->set_rules('end_date', 'Tanggal Akhir', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('backend/form_search_report');
		}elseif($this->input->post('start_date') > $this->input->post('end_date')){
			$this->session->set_flashdata('warning','Maaf, format tanggal yang diinput salah');
			$this->load->view('backend/form_search_report');
		}else{
			$tgl_awal= date("Y-m-d",strtotime($this->input->post('start_date')));
	        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('end_date')));
			$data['reports'] = $this->transaction_model->search_payment_reports($tgl_awal, $tgl_akhir);
	        $this->load->view('backend/payment_report_data', $data);
    	}
	}

	public function search_order()
	{
		$this->form_validation->set_rules('end_date', 'Tanggal Akhir', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->load->view('backend/form_search_report_2');
		}elseif($this->input->post('start_date') > $this->input->post('end_date')){
			$this->session->set_flashdata('warning','Maaf, format tanggal yang diinput salah');
			$this->load->view('backend/form_search_report_2');
		}else{
			$tgl_awal= date("Y-m-d",strtotime($this->input->post('start_date')));
	        $tgl_akhir= date("Y-m-d",strtotime($this->input->post('end_date')));
			$data['reports'] = $this->transaction_model->search_order_reports($tgl_awal, $tgl_akhir);
	        $this->load->view('backend/order_report_data', $data);
    	}
	}
}