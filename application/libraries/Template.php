<?php 

class Template {
  protected $_ci;

  function __construct()
  {
    $this->_ci = &get_instance();
  }

  function render_admin($template = NULL, $data = NULL){
    if ($template != NULL) {
      $data['_content'] = $this->_ci->load->view($template, $data, TRUE);
    }
    $data['_head'] = $this->_ci->load->view('template_admin/head', $data, TRUE);
    $data['_header'] = $this->_ci->load->view('template_admin/header', $data, TRUE);
    $data['_aside'] = $this->_ci->load->view('template_admin/aside', $data, TRUE);
    $data['_footer'] = $this->_ci->load->view('template_admin/footer', $data, TRUE);
    $data['_template'] = $this->_ci->load->view('template_admin/template', $data);
  }

  function render_home($template = NULL, $data = NULL){
    if ($template != NULL) {
      $data['_status']= $data;
      $data['_content'] = $this->_ci->load->view($template, $data, TRUE);
    }
    $data['_head'] = $this->_ci->load->view('template_home/head', $data, TRUE);
    $data['_header'] = $this->_ci->load->view('template_home/header', $data, TRUE);
    $data['_footer'] = $this->_ci->load->view('template_home/footer', $data, TRUE);
    $data['_template'] = $this->_ci->load->view('template_home/template', $data);
  }
}

?>