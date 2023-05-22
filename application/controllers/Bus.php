<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus extends CI_Controller {
  public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Bus');

    $this->load->model('M_Auth');
		if(!$this->M_Auth->current_user()){
			redirect('login');
		}
	}

  public function index(){
    if ($this->input->get('delete_id')) {
      $id = $this->input->get('delete_id');

      $respon = $this->M_Bus->deleteData($id);

      if ($respon == true) {
        $result['msg'] = 'Delete Success';
      } else {
        $result['msg'] = 'Delete Failed';
      }
    } 
    if ($this->input->post('filter') != ''){ 
      $result['filter'] = $this->input->post('filter');
      $result['data'] = $this->M_Bus->getAllDataByFilter($result['filter']);
    }else {
      $result['data'] = $this->M_Bus->getAllData();
    }
    $this->template->render('bus/data', $result);
  }

  public function add_bus(){
    if ($this->input->post()) {
      $data = $this->input->post();

      $respon = $this->M_Bus->insertData($data);
      if ($respon == true) {
        $result['msg'] = 'Add Success';
      } else {
        $result['msg'] = 'Add Failed';
      }
      $this->template->render('bus/add', $result);
    } else {
      $this->template->render('bus/add');
    }
  }

  public function edit_bus(){
    if ($id = $this->input->get('id')) {
      if ($data = $this->input->post()) {
        $respon = $this->M_Bus->editData($data, $id);
        if ($respon == true) {
          $result['msg'] = 'Edit Success';
        } else {
          $result['msg'] = 'Edit Failed';
        }
      }
      $result['data'] = $this->M_Bus->getDataById($id);
      $this->template->render('bus/edit', $result);
    }
  }

  public function status_bus(){

  }

}

?>