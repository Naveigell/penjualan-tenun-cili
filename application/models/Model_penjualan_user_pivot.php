<?php

class Model_penjualan_user_pivot extends CI_Model
{
	public function insertData($data)
	{
		$this->db->insert('penjualan_user_pivot', $data);
	}

	public function getNotificationById($user_id)
	{
		return $this->db->where("user_id", $user_id)->where("has_seen", 0)->get('penjualan_user_pivot')->result();
	}

	public function updateToSeen($id)
	{
		return $this->db->update('penjualan_user_pivot', array('has_seen' => 1), array("id" => $id));
	}
}
