<?php 

/**
 *  @property form_validation $form_validation 
 *  @property M_Auth $M_Auth
 *  @property template $template
 *  @property session $session
 *  @property input $input
 */


class Auth extends CI_Controller {
  public function index(){
    show_404();
  }

  public function registration()
  {
	$this->load->model('M_Auth');
	$rules = $this->M_Auth->rules();
	$this->form_validation->set_rules($rules);

	if($this->form_validation->run() == FALSE){
		$result['status'] = "register";
		return $this->template->render_home('register_form', $result);
	}

	$data = $this->input->post();

	if($this->M_Auth->register($data)){
		redirect('dashboard');
	} else {
		$this->session->set_flashdata('message_register_error', 'Register Gagal, pastikan username atau email anda belum terdaftar !!!');
	}
	$this->template->render_home('register_form');
  }

  public function login()
  {
    $this->load->model('M_Auth');

		$rules = $this->M_Auth->rules();
		$this->form_validation->set_rules($rules);

    	if($this->form_validation->run() == FALSE){
			$result['status'] = "login";
			return $this->template->render_home('login_form', $result);
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->M_Auth->login($username, $password)){
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		}

		$this->template->render_home('login_form');
  }

  	public function logout()
	{
		$this->load->model('M_Auth');
		$this->M_Auth->logout();
		redirect(base_url());
	}


}

?>