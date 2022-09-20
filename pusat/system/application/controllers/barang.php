<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

class Barang extends Controller {

    function index() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
//        $this->load->library('Percobaan');
        $this->load->model('barang_model','bm');
        $data=array();
        $data['barang_list'] = $this->bm->get_barang();
        $templates = $this->load->view('barang/search',$data,true);
        load_templates($templates);
    }
    function search() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $this->load->model('barang_model','bm');
        $jquery_action = $this->input->post('jquery_action');
        $data=array();
        if($jquery_action) {
            $post = bind_form('k',$_POST);
            switch ($jquery_action) {
                case 'search':
                    $data['barang_list'] = $this->bm->get_barang_by_criteria($post);
                    break;
            }
        }
        $templates = $this->load->view('barang/search',$data,true);
        load_templates($templates);
    }
    function process($action='save',$id='') {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data=array();
        $view='barang/form';
        $this->load->model('barang_model','bm');
        if($action=='update') {
            $barang = $this->bm->get_barang_by_id($id)->row();
            $data['barang'] = $barang;
        }else if($action=='delete') {
            $data['barang'] = $this->bm->get_barang_by_id($id)->row();
            $view = 'barang/delete_form';
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
        $data = bind_form('b', $data);
        $this->load->model('Barang_model','bm');
        $res = $this->bm->save($data);
        if($res) {
            set_messages('messages_crud','success_save');
        }else {
            set_messages('messages_crud','failure_save');
        }
        redirect(base_url().'barang');
    }

    function _delete($data) {
        $this->load->model('Barang_model','bm');
        $data = bind_form('k', $data);
        $res = $this->bm->delete($data);
        if($res) {
            set_messages('messages_crud','success_delete');
        }else {
            set_messages('messages_crud','failure_delete');
        }
        redirect(base_url().'barang');

    }

    function _update($data) {
        $data = bind_form('b', $data);
        $this->load->model('Barang_model','bm');
        $res = $this->bm->update($data);
        if($res) {
            set_messages('messages_crud','success_update');
        }else {
            set_messages('messages_crud','failure_update');
        }
        redirect(base_url().'barang');
    }
}

?>
