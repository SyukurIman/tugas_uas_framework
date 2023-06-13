<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graph extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->model('M_Auth');
        if(!$this->M_Auth->current_user()){
            redirect('login');
        }
    }

    public function index() {


        // Load view untuk menampilkan grafik
        $this->load->view('graph/graph_view');
        $data['name'] = $this->M_Auth->current_user()->name;
        $this->template->render_admin('graph_view', $data);
    }

}
