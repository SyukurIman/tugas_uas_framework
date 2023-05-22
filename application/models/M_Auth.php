<?php 

class M_Auth extends CI_Model{
  private $_table = 'user';
  const SESSION_KEY = 'user_id';

  public function rules(){
    return [
      [
				'field' => 'username',
				'label' => 'Username or Email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|max_length[255]'
			]
    ];
  }

  public function register($data)
  {
	var_dump($data);
	$data_user = array(
		'username'=>$data['username'],
		'password'=>password_hash($data['password'], PASSWORD_DEFAULT),
		'name'=>$data['name'],
		'email'=>$data['email']
	);
	$this->db->where('email', $data['email'])->or_where('username', $data['username']);
	$query = $this->db->get($this->_table);
    $user = $query->row();
	var_dump($data_user);

    if ($user) {
      return false;
    }

	$insert = $this->db->insert($this->_table, $data_user);
	if (!$insert){
		return false;
	}  

	// Sesion
	$this->db->where('email', $data['email'])->or_where('username', $data['username']);
	$query = $this->db->get($this->_table);
    $user = $query->row();

    $this->session->set_userdata([self::SESSION_KEY => $user->id]);
    $this->_update_last_login($user->id);

    return $this->session->has_userdata(self::SESSION_KEY);
}


  public function login($username, $password){
    $this->db->where('email', $username)->or_where('username', $username);
    $query = $this->db->get($this->_table);
    $user = $query->row();

    if (!$user) {
      return false;
    }

    if (!password_verify($password, $user->password)) {
			return FALSE;
		}

    // Sesion
    $this->session->set_userdata([self::SESSION_KEY => $user->id]);
    $this->_update_last_login($user->id);

    return $this->session->has_userdata(self::SESSION_KEY);
  }

  public function current_user()
  {
    if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->_table, ['id' => $user_id]);
		return $query->row();
  }

  public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

	private function _update_last_login($id)
	{
		$data = [
			'login_at' => date("Y-m-d H:i:s"),
		];

		return $this->db->update($this->_table, $data, ['id' => $id]);
	}
}

?>