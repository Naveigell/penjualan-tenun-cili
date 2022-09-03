<?php

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		checklogin();
		$this->load->model('Model_pelanggan');
		$this->load->model('Model_penjualan');
		$this->load->model('Model_penjualan_user_pivot');
		$this->load->model('Model_cabang');
		$this->load->model('Model_user');
	}
	function index()
	{
		$data['jmlpelanggan'] = $this->Model_pelanggan->getDataPelanggan()->num_rows();
		$data['jmlpenjualan'] = $this->Model_penjualan->getDatapenjualanhariini()->num_rows();
		$data['jmlcabang'] = $this->Model_cabang->getDataCabang()->num_rows();
		$data['jmlbayar'] = $this->Model_penjualan->getBayarhariini()->row_array();
		$data['rekappenjualan'] = $this->Model_penjualan->getPenjualanperbulan()->result();
		$data['inactive_users'] = $this->Model_user->getInactiveUser();
		$data['inactive_transactions'] = $this->Model_penjualan->getInapproveTransaction();

		$data['penjualan_notifications'] = $this->Model_penjualan_user_pivot->getNotificationById($this->session->userdata('id_user'));

		$this->template->load('template/template', 'dashboard/dashboard', $data);
	}

}
