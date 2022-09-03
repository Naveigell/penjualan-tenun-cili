<?php

class PenjualanUserPivot extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		checklogin();
		$this->load->model('Model_penjualan_user_pivot');
	}

	public function update($id)
	{
		$this->Model_penjualan_user_pivot->updateToSeen($id);

		redirect('dashboard');
	}
}
