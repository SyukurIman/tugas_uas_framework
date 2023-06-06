<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  @property form_validation $form_validation 
 *  @property M_Auth $M_Auth
 *  @property template $template
 *  @property session $session
 *  @property input $input
 */

class Dashboard_Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_Auth');
		if(!$this->M_Auth->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data['name'] = $this->M_Auth->current_user()->name;
		$this->template->render_admin('dashboard', $data);
	}
	
}
