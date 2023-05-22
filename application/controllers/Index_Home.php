<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_Auth');
		if($this->M_Auth->current_user()){
			redirect('dashboard');
		}
	}
	public function index()
	{
		$result['status'] = "home";
		$this->template->render_home('index', $result);
	}
}
