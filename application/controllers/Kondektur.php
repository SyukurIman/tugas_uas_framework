<?php 

class Kondektur extends CI_Controller{
  public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Kondektur');

    $this->load->model('M_Auth');
		if(!$this->M_Auth->current_user()){
			redirect('login');
		}
	}

  public function index(){
    if ($this->input->get('delete_id')) {
      $id = $this->input->get('delete_id');

      $respon = $this->M_Kondektur->deleteData($id);

      if ($respon == true) {
        $result['msg'] = 'Delete Success';
      } else {
        $result['msg'] = 'Delete Failed';
      }
    } 
    
    $result['data'] = $this->M_Kondektur->getAllData();
    $this->template->render('kondektur/data', $result);
  }

  public function penghasilan_kondektur(){
    if ($id = $this->input->get('id')) {
      if ($id_trans_upn = $this->input->get('delete_id')) {
        $respon = $this->M_Kondektur->deleteDataTrans($id_trans_upn);

        if ($respon == true) {
          $result['msg'] = 'Delete Success';
        } else {
          $result['msg'] = 'Delete Failed';
        }
      }
      if ($this->input->post()) {
        $data['id'] = $id;
        $data += $this->input->post();
        $result['data'] = $this->M_Kondektur->getDetailDataByIdAndDate($data, $id);
      } else {
        $result['data'] = $this->M_Kondektur->getDetailDataById($id);
      }
      
      $this->template->render('kondektur/penghasilan', $result);
    }
  }

  public function add_kondektur(){
    if ($this->input->post()) {
      $data = $this->input->post();

      $respon = $this->M_Kondektur->insertData($data);
      if ($respon == true) {
        $result['msg'] = 'Add Success';
      } else {
        $result['msg'] = 'Add Failed';
      }
      $this->template->render('kondektur/add', $result);
    } else {
      $this->template->render('kondektur/add');
    }
  }

  public function edit_kondektur(){
    if ($id = $this->input->get('id')) {
      if ($data = $this->input->post()) {
        $respon = $this->M_Kondektur->editData($data, $id);
        if ($respon == true) {
          $result['msg'] = 'Edit Success';
        } else {
          $result['msg'] = 'Edit Failed';
        }
      }
      $result['data'] = $this->M_Kondektur->getDataById($id);
      $this->template->render('kondektur/edit', $result);
    }
  }
}

?>