<?php 

class Driver extends CI_Controller 
{
  public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Driver');

    $this->load->model('M_Auth');
		if(!$this->M_Auth->current_user()){
			redirect('login');
		}
	}

  public function index(){
    if ($this->input->get('delete_id')) {
      $id = $this->input->get('delete_id');

      $respon = $this->M_Driver->deleteData($id);

      if ($respon == true) {
        $result['msg'] = 'Delete Success';
      } else {
        $result['msg'] = 'Delete Failed';
      }
    } 
    
    $result['data'] = $this->M_Driver->getAllData();
    $this->template->render('driver/data', $result);
  }

  public function penghasilan_driver(){
    if ($id = $this->input->get('id')) {
      if ($id_trans_upn = $this->input->get('delete_id')) {
        $respon = $this->M_Driver->deleteDataTrans($id_trans_upn);

        if ($respon == true) {
          $result['msg'] = 'Delete Success';
        } else {
          $result['msg'] = 'Delete Failed';
        }
      }
      if ($this->input->post()) {
        $data['id'] = $id;
        $data += $this->input->post();
        $result['data'] = $this->M_Driver->getDetailDataByIdAndDate($data, $id);
      } else {
        $result['data'] = $this->M_Driver->getDetailDataById($id);
      }
      
      $this->template->render('driver/penghasilan', $result);
    }
  }

  public function add_driver(){
    if ($this->input->post()) {
      $data = $this->input->post();

      $respon = $this->M_Driver->insertData($data);
      if ($respon == true) {
        $result['msg'] = 'Add Success';
      } else {
        $result['msg'] = 'Add Failed';
      }
      $this->template->render('driver/add', $result);
    } else {
      $this->template->render('driver/add');
    }
  }

  public function edit_driver(){
    if ($id = $this->input->get('id')) {
      if ($data = $this->input->post()) {
        $respon = $this->M_Driver->editData($data, $id);
        if ($respon == true) {
          $result['msg'] = 'Edit Success';
        } else {
          $result['msg'] = 'Edit Failed';
        }
      }
      $result['data'] = $this->M_Driver->getDataById($id);
      $this->template->render('driver/edit', $result);
    }
  }

}

?>