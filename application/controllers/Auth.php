<?php

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Auth');
		$this->load->model('Model_cabang');
	}

	function login()
	{
		checklog();
		$this->load->view('auth/login');
	}

	function ceklogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login = $this->Model_Auth->getlogin($username, $password);
		$ceklogin = $login->num_rows();
		$datalogin = $login->row_array();

		if (!$datalogin) {
			$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
			  <!-- SVG icon code with class="mr-1" -->
			  Username / Password Salah!
			</div>');
			redirect("auth/login");
		} else if (!$datalogin['is_active']) {
			$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
					  <!-- SVG icon code with class="mr-1" -->
					  Akun anda belum di verifikasi admin!
					</div>');
			redirect("auth/login");
		} else if ($ceklogin > 0) {

			$data = array(
				'id_user' => $datalogin['id_user'],
				'nama_lengkap' => $datalogin['nama_lengkap'],
				'username' => $datalogin['username'],
				'password' => $datalogin['password'],
				'level' => $datalogin['level'],
				'kode_cabang' => $datalogin['kode_cabang'],
			);

			$this->session->set_userdata($data);

			redirect('dashboard');
		}
	}

	public function doForgetPassword()
	{
		$this->load->config('email');
		$this->load->library('email');

		$from = 'noreply@tenun-setia.com';
		$email = $this->input->post('email');

		$user = $this->Model_Auth->getUserWithEmail($email);

		if (!$user) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
			  <!-- SVG icon code with class="mr-1" -->
			  Email tidak ditemukan
			</div>');

			redirect('auth/forget_password');
		}

		$url = base_url('auth/password') . '?token=' . $user->id_user . date('-dmYHis');

		$this->email->from($from);
		$this->email->to($email);
		$this->email->subject('Forget Password');
		$this->email->message('<div>Silakan klik link berikut untuk mengubah password. <a href="' . $url . '">Ubah Password</a></div>');

		if ($this->email->send()) {

			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
			  <!-- SVG icon code with class="mr-1" -->
			  Link ubah password berhasil dikirimkan
			</div>');

			redirect('auth/forget_password');
		} else {
			show_error($this->email->print_debugger());
		}
	}

	public function saveNewPassword()
	{
		$token 	  = $this->input->post('token');
		$password = $this->input->post('password');

		$id = explode('-', $token);
		$id = reset($id);

		$user = $this->Model_Auth->updateNewPassword($id, $password);

		if ($user) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
			  <!-- SVG icon code with class="mr-1" -->
			  Password berhasil diubah
			</div>');

			redirect('auth/login');
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
			  <!-- SVG icon code with class="mr-1" -->
			  Password gagal diubah
			</div>');

			redirect('auth/password' . '?' . http_build_query([
				"token" => $token,
			]));
		}
	}

	public function register()
	{
		$branches = $this->Model_cabang->getDataCabang()->result();

		$this->load->view('auth/register', compact('branches'));
	}

	public function doRegister()
	{
		$fullname 	= $this->input->post('nama_lengkap');
		$phone 	  	= $this->input->post('no_hp');
		$username 	= $this->input->post('username');
		$email    	= $this->input->post('email');
		$password   = $this->input->post('password');
		$level	    = $this->input->post('level');
		$branchCode = $this->input->post('kode_cabang');

		$lastId = $this->Model_Auth->getLatestId()->id_user;
		$lastId = (int) ++explode('USR', $lastId)[1];
		$lastId = str_pad($lastId, 3, '0', STR_PAD_LEFT);

		$this->Model_Auth->insertUser([
			"id_user"	   => 'USR' . $lastId,
			"nama_lengkap" => $fullname,
			"no_hp"		   => $phone,
			"username"	   => $username,
			"email"		   => $email,
			"password"	   => $password,
			"level"		   => 'karyawan',
			"kode_cabang"  => $branchCode,
		]);

		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
			  <!-- SVG icon code with class="mr-1" -->
			  Berhasil membuat akun, silahkan tunggu 1 - 2 hari sampai di verifikasi admin.
			</div>');

		redirect('auth/login');
	}

	public function password()
	{
		$this->load->view('auth/password');
	}

	public function forget_password()
	{
		$this->load->view('auth/forget_password');
	}

	function logout()
	{
		session_destroy();
		redirect('auth/login');
	}
}
