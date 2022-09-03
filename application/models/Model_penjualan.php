<?php

class Model_penjualan extends CI_Model
{
	function cekBarang()
	{
		$id_user = $this->session->userdata('id_user');
		return $this->db->get_where('penjualan_detail_temp', array('id_user' => $id_user));
	}

	function getLastFaktur($bulan, $tahun, $cabang)
	{

		$this->db->select('no_faktur');
		$this->db->from('penjualan');
		$this->db->where('kode_cabang', $cabang);
		$this->db->where('MONTH(tgltransaksi)', $bulan);
		$this->db->where('YEAR(tgltransaksi)', $tahun);
		$this->db->order_by('no_faktur', 'desc');
		$this->db->join('users', 'penjualan.id_user = users.id_user');
		$this->db->limit(1);
		return $this->db->get();
	}

	function cekBarangtemp($kode_barang, $id_user)
	{
		return $this->db->get_where('penjualan_detail_temp', array('kode_barang' => $kode_barang, 'id_user' => $id_user));
	}

	function insertBarangtemp($data)
	{
		$this->db->insert('penjualan_detail_temp', $data);
	}
	function getDatabarangtemp($id_user)
	{
		$this->db->select('penjualan_detail_temp.kode_barang,nama_barang,harga,qty,(qty * harga) as total, id_user');
		$this->db->from('penjualan_detail_temp');
		$this->db->join('barang_master', 'penjualan_detail_temp.kode_barang = barang_master.kode_barang');
		$this->db->where('id_user', $id_user);
		return $this->db->get();
	}

	function deleteBarangtemp($kode_barang, $id_user)
	{
		$hapus = $this->db->delete('penjualan_detail_temp', array('kode_barang' => $kode_barang, 'id_user' => $id_user));

		if ($hapus) {
			return 1;
		}
	}

	function insertPenjualan($data, $jenistransaksi, $id_user, $no_faktur)
	{
		$simpan = $this->db->insert('penjualan', $data);
		if ($simpan) {
			$detailpenjualan = $this->db->get_where('penjualan_detail_temp', array('id_user' => $data['id_user']));
			$totalpenjualan	= 0;
			$berhasil = 0;
			$error = 0;
			foreach ($detailpenjualan->result() as $d) {
				$totalpenjualan = $totalpenjualan + ($d->qty * $d->harga);
				$datadetail = array (
					'no_faktur' => $data['no_faktur'],
					'kode_barang' => $d->kode_barang,
					'harga' => $d->harga,
					'qty' => $d->qty
				);
				$simpandetail = $this->db->insert('penjualan_detail', $datadetail);
				if ($simpandetail) {
					$berhasil++;
				} else {
					$error++;
				}
			}
			if ($error > 0) {
				$hapusdetailpenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
				$hapusdatapenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
				$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert">
					  <i class="fa fa-close mr-2"></i>
					  Data Gagal Disimpan!
					  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
					</div>');
				redirect('penjualan/inputpenjualan');
			} else {
				$hapustemporary = $this->db->delete('penjualan_detail_temp', array('id_user' => $data['id_user']));
				if ($hapustemporary) {
					if ($data['jenistransaksi'] == "tunai") {
						$tahun = date('Y');
						$thn = substr($tahun, 2, 2);
						$getLastNobukti = $this->db->query("SELECT nobukti FROM historibayar WHERE YEAR(tglbayar) = '$tahun'")->row_array();
						$nomorterakhir = $getLastNobukti['nobukti'];
						$nobukti = buatkode(date('dmYHis'), $thn, 6);
						$databayar = array(
							'nobukti' => $nobukti,
							'no_faktur' => $data['no_faktur'],
							'tglbayar' => $data['tgltransaksi'],
							'bayar' => $totalpenjualan,
							'id_user' => $data['id_user']
						);
						$bayar = $this->db->insert('historibayar', $databayar);
						if ($bayar) {
							$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert">
								  <i class="fa fa-check mr-2"></i>
								  Data Berhasil Disimpan, Silahkan tunggu sampai di validasi admin!
								  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
								</div>');
							redirect('penjualan/inputpenjualan');
						} else {
							$hapusdetailpenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
							$hapusdatapenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
							$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert">
								<i class="fa fa-close mr-2"></i>
								  Data Gagal Disimpan!
								  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
								</div>');
							redirect('penjualan/inputpenjualan');
						}
					} else {
						$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible" role="alert">
							  <i class="fa fa-check mr-2"></i>
							  Data Berhasil Disimpan!
							  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
							</div>');
						redirect('penjualan/inputpenjualan');
					}
				} else {
					$hapusdetailpenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
					$hapusdatapenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
					$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible" role="alert">
						  <i class="fa fa-close mr-2"></i>
						  Data Gagal Disimpan!
						  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
						</div>');
					redirect('penjualan/inputpenjualan');
				}
			}
		}
	}

	function getDatapenjualan($rowno, $rowperpage, $no_faktur, $namapelanggan, $dari, $sampai, $isApproved = 0)
	{
		if ($no_faktur !="") {
			$this->db->where('penjualan.no_faktur', $no_faktur);
		}
		if ($namapelanggan !="") {
			$this->db->like('nama_pelanggan', $namapelanggan);
		}
		if ($dari !="") {
			$this->db->where('tgltransaksi >', $dari);
		}
		if ($sampai !="") {
			$this->db->where('tgltransaksi <', $sampai);
		}

		$this->db->where('is_approved', $isApproved);

		$this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap,totalpenjualan,totalbayar');
		$this->db->from('penjualan');
		$this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
		$this->db->join('users', 'penjualan.id_user = users.id_user');
		$this->db->join('view_totalpenjualan', 'penjualan.no_faktur = view_totalpenjualan.no_faktur');
		$this->db->join('view_totalbayar', 'penjualan.no_faktur = view_totalbayar.no_faktur', 'left');
		$this->db->limit($rowperpage, $rowno);
		return $this->db->get();
	}

	public function approve($no_faktur)
	{
		return $this->db->update('penjualan', ["is_approved" => 1], array('no_faktur' => $no_faktur));
	}

	public function updateStock($code, $amount)
	{
		$branch = $this->session->userdata('kode_cabang');

		return $this->db->update('barang_harga', ["stok" => $amount], array(
			'kode_barang' => $code,
			'kode_cabang' => $branch,
		));
	}

	function getDatapenjualanCount($no_faktur, $namapelanggan, $dari, $sampai, $isApproved = 0)
	{
		if ($no_faktur !="") {
			$this->db->where('penjualan.no_faktur', $no_faktur);
		}
		if ($namapelanggan !="") {
			$this->db->like('nama_pelanggan', $namapelanggan);
		}
		if ($dari !="") {
			$this->db->where('tgltransaksi >', $dari);
		}
		if ($sampai !="") {
			$this->db->where('tgltransaksi <', $sampai);
		}

		$this->db->where('is_approved', $isApproved);
		$this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap,totalpenjualan,totalbayar');
		$this->db->from('penjualan');
		$this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
		$this->db->join('users', 'penjualan.id_user = users.id_user');
		$this->db->join('view_totalpenjualan', 'penjualan.no_faktur = view_totalpenjualan.no_faktur');
		$this->db->join('view_totalbayar', 'penjualan.no_faktur = view_totalbayar.no_faktur', 'left');
		return $this->db->get();
	}

	function deletePenjualan($no_faktur)
	{
//		$this->db->update('penjualan', ["is_approved" => 1], array('no_faktur' => $no_faktur));
		$sales = $this->db->where('no_faktur', $no_faktur)->get('penjualan_detail')->result_array();

		foreach ($sales as $sale) {
			$product = $this->db->where('kode_barang', $sale['kode_barang'])->where('kode_cabang', $this->session->userdata('kode_cabang'))->get('barang_harga')->row_array();
			$this->db->update('barang_harga', ['stok' => $product['stok'] + $sale['qty']], ['kode_barang' => $sale['kode_barang'], 'kode_cabang' => $this->session->userdata('kode_cabang')]);
		}

		$hapus = $this->db->delete('penjualan', array('no_faktur' => $no_faktur));
		if ($hapus) {
			$hapusdetail = $this->db->delete('penjualan_detail', array('no_faktur' => $no_faktur));
			if ($hapusdetail) {
				$hapushistoribayar = $this->db->delete('historibayar', array('no_faktur' => $no_faktur));
				if ($hapushistoribayar) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible" role="alert">
					  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
					  Data Berhasil Dihapus!
					  <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
					</div>');
				redirect('penjualan');
				}
			}
		}
	}

	function getPenjualan($no_faktur)
	{
		$this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,alamat_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap as karyawan');
		$this->db->from('penjualan');
		$this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
		$this->db->join('users', 'penjualan.id_user = users.id_user');
		$this->db->where('no_faktur', $no_faktur);
		return $this->db->get();
	}

	function getDetailpenjualan($no_faktur)
	{
		$this->db->select('penjualan_detail.kode_barang,nama_barang,penjualan_detail.harga,qty,satuan');
		$this->db->from('penjualan_detail');
		$this->db->join('barang_master', 'penjualan_detail.kode_barang = barang_master.kode_barang');
		$this->db->where('no_faktur', $no_faktur);
		return $this->db->get();
	}

	function getLaporanpenjualan($cabang= "", $dari, $sampai)
	{
//		if ($cabang != 0) {
//			$this->db->where('users.kode_cabang', $cabang);
//		}
		$this->db->where('users.kode_cabang', $cabang);
		$this->db->where('tgltransaksi >=', $dari);
		$this->db->where('tgltransaksi <=', $sampai);
		$this->db->select('penjualan.no_faktur,tgltransaksi,penjualan.kode_pelanggan,nama_pelanggan,jenistransaksi,jatuhtempo,penjualan.id_user,nama_lengkap,totalpenjualan,totalbayar');
		$this->db->from('penjualan');
		$this->db->join('pelanggan', 'penjualan.kode_pelanggan = pelanggan.kode_pelanggan');
		$this->db->join('users', 'penjualan.id_user = users.id_user');
		$this->db->join('view_totalpenjualan', 'penjualan.no_faktur = view_totalpenjualan.no_faktur');
		$this->db->join('view_totalbayar', 'penjualan.no_faktur = view_totalbayar.no_faktur', 'left');
		return $this->db->get();
	}

	public function getInapproveTransaction()
	{
		return $this->db->where('is_approved', 0)->get('penjualan')->result_array();
	}

	function getDatapenjualanhariini()
	{
		$hariini = date("Y-m-d");
		if ($this->session->userdata('kode_cabang') != "PST") {
			$this->db->where('users.kode_cabang', $this->session->userdata('kode_cabang'));
		}
		$this->db->join('users', 'penjualan.id_user = users.id_user');
		return $this->db->get_where('penjualan', array('tgltransaksi' => $hariini));
	}

	function getBayarhariini()
	{
		if ($this->session->userdata('kode_cabang') != "PST") {
			$this->db->where('users.kode_cabang', $this->session->userdata('kode_cabang'));
		}
		$hariini = date("Y-m-d");
		$this->db->select('SUM(bayar) as totalbayar');
		$this->db->from('historibayar');
		$this->db->join('penjualan', 'historibayar.no_faktur = penjualan.no_faktur');
		$this->db->join('users', 'penjualan.id_user = users.id_user');
		$this->db->where('tglbayar', $hariini);
		return $this->db->get();
	}

	function getPenjualanperbulan()
	{
		$cabang = $this->session->userdata('kode_cabang');
		if ($cabang == "PST") {
			$tahun = date("Y");
			$query = "SELECT id,namabulan,totalpenjualan FROM bulan
			LEFT JOIN (
			SELECT
			MONTH(tgltransaksi) as bulan, SUM(harga*qty) as totalpenjualan
			FROM penjualan_detail
			INNER JOIN penjualan ON penjualan_detail.no_faktur = penjualan.no_faktur
			WHERE YEAR(tgltransaksi) = '$tahun'
			GROUP BY MONTH(tgltransaksi)
			) pnj ON (bulan.id = pnj.bulan)";
		} else {
			$tahun = date("Y");
			$query = "SELECT id,namabulan,totalpenjualan FROM bulan
			LEFT JOIN (
			SELECT
			MONTH(tgltransaksi) as bulan, SUM(harga*qty) as totalpenjualan
			FROM penjualan_detail
			INNER JOIN penjualan ON penjualan_detail.no_faktur = penjualan.no_faktur
			INNER JOIN users ON penjualan.id_user = users.id_user
			WHERE YEAR(tgltransaksi) = '$tahun' AND users.kode_cabang = '$cabang'
			GROUP BY MONTH(tgltransaksi)
			) pnj ON (bulan.id = pnj.bulan)";
		}


		return $this->db->query($query);
	}
}
