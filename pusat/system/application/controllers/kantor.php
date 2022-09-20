<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

class Kantor extends Controller {

    function index() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        
        $this->load->model('Kantor_model','km');
        $data=array();
        $data['kantor_list'] = $this->km->get_kantor();
        $templates = $this->load->view('kantor/search',$data,true);
        load_templates($templates);
    }
    function search() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $this->load->model('Kantor_model','km');
        $jquery_action = $this->input->post('jquery_action');
        $data=array();
        if($jquery_action) {
            $post = bind_form('k',$_POST);
            switch ($jquery_action) {
                case 'search':
                    $data['kantor_list'] = $this->km->get_kantor_by_criteria($post);
                    break;
            }
        }
        $templates = $this->load->view('kantor/search',$data,true);
        load_templates($templates);
    }
    function process($action='save',$id='') {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data=array();
        $view='kantor/form';
        $this->load->model('Kantor_model','km');
        if($action=='update') {
            $kantor = $this->km->get_kantor_by_id($id)->row();
            $data['kantor'] = $kantor;
        }else if($action=='delete') {
            $data['kantor'] = $this->km->get_kantor_by_id($id)->row();
            $view = 'kantor/delete_form';
        }
        $jquery_action = $this->input->post('jquery_action');
        if($jquery_action) {
            switch ($jquery_action) {
                case 'save':
                    $this->_insert($_POST);
                    break;
                case 'update':
                    $this->_update($_POST);
                    break;
                case 'delete':
                    $this->_delete($_POST);
                    break;
            }
        }
        $templates = $this->load->view($view,$data,true);
        load_templates($templates);

    }
    function _insert($data) {
        $data = bind_form('k', $data);
        $this->load->model('Kantor_model','km');
        $res = $this->km->save($data);
        if($res) {
            set_messages('messages_crud','success_save');
        }else {
            set_messages('messages_crud','failure_save');
        }
        redirect(base_url().'kantor');
    }

    function _delete($data) {
        $this->load->model('Kantor_model','km');
        $data = bind_form('k', $data);
        $res = $this->km->delete($data);
        if($res) {
            set_messages('messages_crud','success_delete');
        }else {
            set_messages('messages_crud','failure_delete');
        }
        redirect(base_url().'kantor');

    }

    function _update($data) {
        $data = bind_form('k', $data);
        $this->load->model('Kantor_model','km');
        $res = $this->km->update($data);
        if($res) {
            set_messages('messages_crud','success_update');
        }else {
            set_messages('messages_crud','failure_update');
        }
        redirect(base_url().'kantor');
    }
}

?>
