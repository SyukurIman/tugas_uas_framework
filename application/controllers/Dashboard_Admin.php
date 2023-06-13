<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  @property form_validation $form_validation 
 *  @property M_Auth $M_Auth
 *  @property template $template
 *  @property session $session
 *  @property input $input
 * @property M_FinancialRecords $M_FinancialRecords
 */

class Dashboard_Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_Auth');
		$this->load->model('M_FinancialRecords'); 
		if(!$this->M_Auth->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data['name'] = $this->M_Auth->current_user()->name;
		$data['pemasukkan'] = $this->M_FinancialRecords->pemasukkan_money($this->M_Auth->current_user()->id);
		$data['pengeluaran'] = $this->M_FinancialRecords->pengeluaran_money($this->M_Auth->current_user()->id);
		$data['total_uang'] = $this->M_FinancialRecords->amount_money($this->M_Auth->current_user()->id);
		$this->template->render_admin('dashboard', $data);
	}
	
}
