<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_Auth');
		if(!$this->M_Auth->current_user()){
			redirect('login');
		}

		$this->load->model('M_Trans_UPN');
		$this->load->model('M_Bus');
		$this->load->model('M_Driver');
		$this->load->model('M_Kondektur');


	}
	public function index()
	{
		$result['data'] = $this->M_Trans_UPN->getAllData();
		$result['countBus'] = $this->M_Bus->countData();
		$result['countDriver'] = $this->M_Driver->countData();
		$result['countKondektur'] = $this->M_Kondektur->countData();
		$result['grafikData'] = $this->M_Bus->dataGrafik();

		$this->template->render_admin('dashboard', $result);
	}
	
}
