<?php 

class M_Graph extends CI_Model {
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

    function Jum_barang()
    {
        $this->db->group_by('name_bill');
        $this->db->select('name_bill');
        $this->db->select("count(*) as total");
        return $this->db->from('planner')
          ->get()
          ->result();
    }
}

?>
