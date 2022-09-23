<?php

class Model_voucher extends CI_Model
{
	public function all()
	{
		return $this->db->get('vouchers');
	}

	public function store($data)
	{
		return $this->db->insert('vouchers', $data);
	}

	public function update($id, $data)
	{
		return $this->db->update('vouchers', $data, compact('id'));
	}

	public function destroy($id)
	{
		return $this->db->delete('vouchers', compact('id'));
	}
}
