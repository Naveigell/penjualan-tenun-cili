<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_voucher');
		checklogin();
	}

	public function index()
	{
		$vouchers = $this->Model_voucher->all()->result_object();

		$this->template->load('template/template', 'voucher/index', compact('vouchers'));
	}

	public function store()
	{
		$data = [
			"voucher_code" 		=> $this->input->post('voucher_code'),
			"amount_in_percent"	=> $this->input->post('amount_in_percent'),
			"start_date"   		=> $this->input->post('start_date'),
			"end_date" 	   		=> $this->input->post('end_date'),
		];

		$this->Model_voucher->store($data);

		redirect('voucher');
	}

	public function update($id)
	{
		$data = [
			"voucher_code" 		=> $this->input->post('voucher_code'),
			"amount_in_percent"	=> $this->input->post('amount_in_percent'),
			"start_date"   		=> $this->input->post('start_date'),
			"end_date" 	   		=> $this->input->post('end_date'),
		];

		$this->Model_voucher->update($id, $data);

		redirect('voucher');
	}

	public function destroy($id)
	{
		$this->Model_voucher->destroy($id);

		redirect('voucher');
	}
}
