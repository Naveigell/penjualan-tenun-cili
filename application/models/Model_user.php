<?php

class Model_user extends CI_Model
{
	function getDatauser()
	{
		return $this->db->get('users');
	}

	public function getDataUserById($id)
	{
		return $this->db->where('id_user', $id)->get('users')->first_row();
	}

	public function getUserByBranch($branch)
	{
		return $this->db->where('kode_cabang', $branch)
						->where('level', 'karyawan')
						->where('is_active', 1)
						->get('users')->result_array();
	}

	public function updateUser($data)
	{
		return $this->db->update('users', $data, array('id_user' => $data['id_user']));
	}

	public function getInactiveUser()
	{
		return $this->db->where('is_active', 0)->get('users')->result_array();
	}

	function insertUser($data)
	{
		$simpan = $this->db->insert('users', $data);
		if ($simpan) {
			return 1;
		} else {
			return 0;
		}
	}

	function deleteUser($id_user)
	{
		$hapus = $this->db->delete('users', array('id_user' => $id_user));
		if ($hapus) {
			return 1;
		} else {
			return 0;
		}
	}
}
