<?php

class M_auth extends CI_Model {

    function cekUser($email)
    {
        return $this->db->get_where('tb_user', ['email' => $email])->row_array();
    }

	public function tambah_user($data)
	{
		return $this->db->insert('tb_user', $data);
	}
}