<?php

use function PHPSTORM_META\type;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  @property form_validation $form_validation 
 *  @property M_Auth $M_Auth
 *  @property template $template
 *  @property input $input
 *  @property M_Planner $M_Planner
 *  @property M_FinancialRecords $M_FinancialRecords
 */


class Planner extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

		$this->load->model('M_Auth');
        $this->load->model('M_Planner');
        $this->load->model('M_FinancialRecords'); 
		if(!$this->M_Auth->current_user()){
			redirect('login');
		}
    }
    
    public function index()
    {
        if ($this->input->get('delete_id')) {
            $id = $this->input->get('delete_id');

            $respon = $this->M_Planner->delete_plan($id);

            if ($respon == true) {
                $result['msg'] = 'Delete Success';
            } else {
                $result['msg'] = 'Delete Failed';
            }
        }
        $data['plan'] = $this->M_Planner->getData( $this->M_Auth->current_user()->id);

        if ($data['plan']) {
            foreach ($data['plan']as $key => $plan) {
                $date = date("m-d-Y", strtotime($plan->target_tanggal));
                if ($date <= date("m-d-Y") || $plan->target_uang <= $plan->uang_now) {
                    $data['plan'][$key]->status = 'Telah Selesai';
                    $this->M_Planner->edit($data['plan'][$key], $data['plan'][$key]->id);
                } else {
                    $data['plan'][$key]->status = 'Sedang Berlangsung';
                    $this->M_Planner->edit($data['plan'][$key], $data['plan'][$key]->id);
                }
            }
        }
        
        $data['name'] = $this->M_Auth->current_user()->name;
		$this->template->render_admin('Planner/show', $data);
    }

    public function add_planner()
    {
        $result['name'] = $this->M_Auth->current_user()->name;
        if ($this->input->post()) {
            $data = $this->input->post();
            $data['id_user'] = $this->M_Auth->current_user()->id;
            $data['status'] = 'Sedang Berlangsung';
            $data['uang_now'] = '0';

            $respon = $this->M_Planner->insert_data($data);
            if ($respon == true) {
                $result['msg'] = 'Add Success';
            } else {
                $result['msg'] = 'Add Failed';
            }
            $this->template->render_admin('Planner/add', $result);
        } else {
            $this->template->render_admin('Planner/add', $result);
        }
    }

    public function update_planner()
    {
        $result['name'] = $this->M_Auth->current_user()->name;
        $result['id'] = $this->input->get('id');
        if ($this->input->post()) {
            $data = $this->input->post();

            $respon = $this->M_Planner->update_plan($data);

            $amount = $data['amount_money'];
            $type = 'Pemasukkan';
            $date_now = date("D M d, Y G:i");
            $description = $this->M_Planner->get_name_bill($data['id_plan']);

            $respon = $this->M_FinancialRecords->addRecord($type, $amount, $description[0]->name_bill, $date_now, $this->M_Auth->current_user()->id);
            
            if ($respon == true) {
                $result['msg'] = 'Update Success';

                $data_plan = $this->M_Planner->get_data_by_id($data['id_plan']);
                $data_plan[0]->uang_now = intval($data_plan[0]->uang_now) + intval($data['amount_money']);

                if ($data_plan[0]->uang_now >= intval($data_plan[0]->target_uang)) {
                    $data_plan[0]->status = 'Telah Selesai';
                }
                $data_plan[0]->uang_now = (string)$data_plan[0]->uang_now;

                $respon = $this->M_Planner->edit($data_plan[0], $data['id_plan']);
                if ($respon == false) {
                    $result['msg'] = 'Update Failed';
                }
            } else {
                $result['msg'] = 'Update Failed';
            }
            $this->template->render_admin('Planner/update_plan', $result);
        } else {
            $this->template->render_admin('Planner/update_plan', $result);
        }
    }

    public function edit_planner()
    {
        $result['name'] = $this->M_Auth->current_user()->name;
        $result['id_plan'] = $this->input->get('id');
        var_dump($result['id_plan']);
        if ($this->input->post()) {
            $data = $this->input->post();
            $respon = $this->M_Planner->edit($data, $result['id_plan']);
            if ($respon == true) {
                $result['msg'] = 'Edit Success';
            } else {
                $result['msg'] = 'Edit Failed';
            }
        }
        
        $result['plan_data'] = $this->M_Planner->get_data_by_id($result['id_plan']);
        
        $this->template->render_admin('Planner/edit', $result);
    }

    public function history_planner()
    {
        $result['name'] = $this->M_Auth->current_user()->name;
        $result['history_plan'] = $this->M_Planner->get_all_data_history($this->input->get('id'));
        $this->template->render_admin('Planner/history', $result);
    }

    
}

?>