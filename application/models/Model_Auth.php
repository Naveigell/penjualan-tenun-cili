<?php

class Model_Auth extends CI_Model
{
	function getlogin($username, $password)
	{
		return $this->db->get_where('users', array('username' => $username, 'password' => $password));
	}

	public function getUserWithEmail($email)
	{
		return $this->db->get_where('users', ["email" => $email])->row();
	}

	public function updateNewPassword($id, $password)
	{
		return $this->db->update('users', ["password" => $password], ['id_user' => $id]);
	}

	public function getLatestId()
	{
		return $this->db->get('users')->last_row();
	}

	public function insertUser($data)
	{
		return $this->db->insert('users', $data);
	}
}
