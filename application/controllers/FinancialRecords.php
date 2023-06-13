<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  @property form_validation $form_validation 
 *  @property M_Auth $M_Auth
 *  @property template $template
 *  @property session $session
 *  @property input $input
 *  @property M_FinancialRecords $M_FinancialRecords
 */

class FinancialRecords extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_Auth');
        $this->load->model('M_FinancialRecords'); // Memuat model M_FinancialRecords
        if(!$this->M_Auth->current_user()){
			redirect('login');
		}
    }

    public function index()
    {
        // Menampilkan daftar pengeluaran dan pemasukan
        if ($this->input->get('delete_id')) {
            $id = $this->input->get('delete_id');

            $respon = $this->M_FinancialRecords->deleteRecord($id);

            if ($respon == true) {
                $result['msg'] = 'Delete Success';
            } else {
                $result['msg'] = 'Delete Failed';
            }
        }
        $data['records'] = $this->M_FinancialRecords->getRecords($this->M_Auth->current_user()->id);
        $data['name'] = $this->M_Auth->current_user()->name;
        $this->template->render_admin('FinancialRecords/show', $data);
    }

    public function addRecord()
    {
        // Mengambil data dari form
        if ($this->input->post()) {
            $date = $this->input->post('date');
            $type = $this->input->post('type');
            $amount = $this->input->post('amount');
            $description = $this->input->post('description');
            $this->M_FinancialRecords->addRecord($type, $amount, $description, $date, $this->M_Auth->current_user()->id);

            $data['name'] = $this->M_Auth->current_user()->name;
            $this->template->render_admin('FinancialRecords/add', $data);
        } else {
            $data['name'] = $this->M_Auth->current_user()->name;
            $this->template->render_admin('FinancialRecords/add', $data);
        }
    }

    public function editRecord()
    {
        $result['name'] = $this->M_Auth->current_user()->name;
        $result['id_record'] = $this->input->get('id');
        if ($this->input->post()) {
            $data = $this->input->post();
            $respon = $this->M_FinancialRecords->edit($data, $result['id_record']);
            if ($respon == true) {
                $result['msg'] = 'Edit Success';
            } else {
                $result['msg'] = 'Edit Failed';
            }
        }

        $result['records'] = $this->M_FinancialRecords->getRecordsById($result['id_record']);
        $this->template->render_admin('FinancialRecords/edit', $result);
    }

    public function deleteRecord($id)
    {
        // Menghapus record berdasarkan ID
        $this->M_FinancialRecords->deleteRecord($id);
        redirect('financialrecords');
    }
}