<?php

class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_barang');
		$this->load->model('Model_cabang');
		checklogin();
	}

	function index()
	{
		$data['barang'] = $this->Model_barang->getDataBarang()->result();
		$this->template->load('template/template', 'barang/view_barang', $data);
	}

	function inputbarang()
	{
		$this->load->view('barang/input_barang');
	}

	function simpanbarang()
	{
		$kodebarang = $this->input->post('kodebarang');
		$namabarang = $this->input->post('namabarang');
		$satuan = $this->input->post('satuan');

		$data = array(
			'kode_barang' => $kodebarang,
			'nama_barang' => $namabarang,
			'satuan' => $satuan,
		);

		$simpan = $this->Model_barang->insertBarang($data);
		if ($simpan ==1) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
			  Data Berhasil Disimpan!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang");
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
			  Data Gagal Disimpan!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang");
		}
	}

	function editbarang()
	{
		$kodebarang = $this->uri->segment(3);
		$data['barang'] = $this->Model_barang->getBarang($kodebarang)->row_array();
		$this->load->view('barang/edit_barang', $data);
	}

	function updatebarang()
	{
		$kodebarang = $this->input->post('kodebarang');
		$namabarang = $this->input->post('namabarang');
		$satuan = $this->input->post('satuan');

		$data = array(
			'nama_barang' => $namabarang,
			'satuan' => $satuan,
		);

		$simpan = $this->Model_barang->updateBarang($data, $kodebarang);
		if ($simpan ==1) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
			  Data Berhasil Diupdate!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang");
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
			  Data Gagal Diupdate!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang");
		}
	}

	function hapusbarang()
	{
		$kodebarang = $this->uri->segment(3);
		$hapus = $this->Model_barang->deleteBarang($kodebarang);
		if ($hapus ==1) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
			  Data Berhasil Dihapus!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang");
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
			  Data Gagal Dihapus!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang");
		}
	}

	function harga()
	{
		$data['harga'] = $this->Model_barang->getDataHarga()->result();
		$this->template->load('template/template', 'barang/view_harga', $data);
	}

	function inputharga()
	{
		$data['barang'] = $this->Model_barang->getDataBarang()->result();
		$data['cabang'] = $this->Model_cabang->getDataCabang()->result();
		$this->load->view('barang/input_harga', $data);
	}

	function simpanharga()
	{
		$kodeharga = $this->input->post('kodeharga');
		$kodebarang = $this->input->post('kodebarang');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$cabang = $this->input->post('cabang');

		$data = array(
			'kode_harga' => $kodeharga,
			'kode_barang' => $kodebarang,
			'harga' => $harga,
			'stok' => $stok,
			'kode_cabang' => $cabang,
		);

		$simpan = $this->Model_barang->insertHarga($data);
		if ($simpan ==1) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
			  Data Berhasil Disimpan!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang/harga");
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
			  Data Gagal Disimpan!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang/harga");
		}
	}

	function editharga()
	{
		$kodeharga = $this->uri->segment(3);
		$data['barang'] = $this->Model_barang->getDataBarang()->result();
		$data['cabang'] = $this->Model_cabang->getDataCabang()->result();
		$data['harga'] = $this->Model_barang->getHarga($kodeharga)->row_array();
		$this->load->view('barang/edit_harga', $data);
	}

	function updateharga()
	{
		$kodeharga = $this->input->post('kodeharga');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$data = array(
			'harga' => $harga,
			'stok' => $stok,
		);

		$simpan = $this->Model_barang->updateHarga($data, $kodeharga);
		if ($simpan ==1) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
			  Data Berhasil Diupdate!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang/harga");
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
			  Data Gagal Diupdate!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang/harga");
		}
	}

	function hapusharga()
	{
		$kodeharga = $this->uri->segment(3);
		$hapus = $this->Model_barang->deleteHarga($kodeharga);
		if ($hapus ==1) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
			  Data Berhasil Dihapus!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang/harga");
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
			  <<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
			  Data Gagal Dihapus!
			  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			</div>');
			redirect("barang/harga");
		}
	}

}