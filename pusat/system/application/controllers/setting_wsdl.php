<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

class Setting_wsdl extends Controller {

    function index() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $this->load->model('Setting_wsdl_model','swm');
        $data=array();
        $kantor =  $this->swm->get_kantor();
        $kantor_option['']='Semua';
        if($kantor!=FALSE) {
            foreach ($kantor->result() as $row) {
                $kantor_option[$row->id_kantor] = $row->nama_kantor;
            }
        }
        $data['kantor_combo'] = form_dropdown('sw_id_kantor', $kantor_option);
        $data['kantor_list'] =$kantor;
        $templates = $this->load->view('setting_wsdl/search',$data,true);
        load_templates($templates);
    }
    function search() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $this->load->model('Setting_wsdl_model','swm');
        $jquery_action = $this->input->post('jquery_action');
        $data=array();
        if($jquery_action) {
            $post = bind_form('sw',$_POST);
            switch ($jquery_action) {
                case 'search':
                    $data['kantor_list'] = $this->swm->get_kantor_by_criteria($post);
                    break;
            }
        }
        $templates = $this->load->view('setting_wsdl/search',$data,true);
        load_templates($templates);
    }
    function process($action='save',$id='') {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data=array();
        $view='setting_wsdl/form';
        $this->load->model('Setting_wsdl_model','swm');
        if($action=='update') {
            $kantor = $this->swm->get_kantor_by_id($id)->row();
            $data['kantor'] = $kantor;
        }
        $jquery_action = $this->input->post('jquery_action');
        if($jquery_action) {
            switch ($jquery_action) {
                case 'update':
                    $this->_update($_POST);
                    break;
            }
        }
        $templates = $this->load->view($view,$data,true);
        load_templates($templates);

    }
    function _update($data) {
        $data = bind_form('sw', $data);
        $this->load->model('Setting_wsdl_model','swm');
        $res = $this->swm->update($data);
        if($res) {
            set_messages('messages_crud','success_update');
        }else {
            set_messages('messages_crud','failure_update');
        }
        redirect(base_url().'setting_wsdl');
    }
}

?>
