<?php 

class M_Lap extends CI_Model {
	private $_table = 'user';
  const SESSION_KEY = 'user_id';


	public function current_user(){
    if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->_table, ['id' => $user_id]);
		return $query->row();
	}

}

?>
