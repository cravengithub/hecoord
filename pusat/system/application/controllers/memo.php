<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

class Memo extends Controller {

    function index() {
        $this->load->model('memo_model','mm');
        $data=array();
        $options = array('active'=>'Active','pasive'=>'Pasive');
        $data['status_combo'] = form_dropdown('m_status', $options,'','id = m_status');
        $data['date_combo_fr'] = date_combo('activated_date_fr');
        $data['date_combo_to'] = date_combo('activated_date_to');
        $data['memo_list'] = $this->mm->get_memo();
        $templates = $this->load->view('memo/search',$data,true);
        load_templates($templates);
    }
    function search() {
        $this->load->model('memo_model','mm');
        $data=array();
        $options = array('active'=>'Active','pasive'=>'Pasive');
        $data['status_combo'] = form_dropdown('m_status', $options,'','id = m_status');
        $data['date_combo_fr'] = date_combo('activated_date_fr');
        $data['date_combo_to'] = date_combo('activated_date_to');
        $jquery_action = $this->input->post('jquery_action');
        if($jquery_action) {
            $post = bind_form('m',$_POST);
            $from = bind_date('activated_date_fr');
            $to = bind_date('activated_date_to');
            switch ($jquery_action) {
                case 'search':
                    $data['memo_list'] = $this->mm->get_memo_by_criteria($post,$from,$to);
                    break;
            }
        }
        $templates = $this->load->view('memo/search',$data,true);
        load_templates($templates);
    }
    function process($action='save',$id='') {
        $data=array();
        $view='memo/form';
        $this->load->model('memo_model','mm');
        $options = array('active'=>'Active','pasive'=>'Pasive');
        $data['status_combo'] = form_dropdown('m_status', $options,'','id = m_status');
        $data['date_combo'] = date_combo('activated_date');
        if($action=='update') {
            $data['jquery_action']='update';
            $memo = $this->mm->get_memo_by_id($id)->row();
            $data['memo'] = $memo;
            $data['status_combo'] = form_dropdown('m_status', $options,$memo->status,'id = m_status');
            $data['date_combo'] = date_combo('activated_date',$memo->activated_date);
        }else if($action=='delete') {
            $data['memo'] = $this->mm->get_memo_by_id($id)->row();
            $view = 'memo/delete_form';
        }
        $jquery_action = $this->input->post('jquery_action');
        if($jquery_action) {
            switch ($jquery_action) {
                case 'save':
                    $this->_insert($_POST);
                    break;
                case 'update':
                    $post['memo_id']=$id;
                    $this->_update($_POST);
                    break;
                case 'delete':
                    $post['memo_id']=$id;
                    $this->_delete($_POST);
                    break;
            }
        }
        $templates = $this->load->view($view,$data,true);
        load_templates($templates);

    }
    function _insert($data) {
        $data = bind_form('m', $data);
        $this->load->model('memo_model','mm');
        $data['created_date'] = date('Y-m-d');
        $data['activated_date'] = bind_date('activated_date');
        $res = $this->mm->save($data);
        if($res) {
            set_messages('messages_crud','success_save');
        }else {
            set_messages('messages_crud','failure_save');
        }
        redirect(base_url().'memo');
    }

    function _delete($data) {
        $this->load->model('memo_model','mm');
        $data = bind_form('m', $data);
        $res = $this->mm->delete($data);
        if($res) {
            set_messages('messages_crud','success_delete');
        }else {
            set_messages('messages_crud','failure_delete');
        }
        redirect(base_url().'memo');

    }

    function _update($data) {
        $data = bind_form('m', $data);
        $this->load->model('memo_model','mm');
        $data['activated_date'] = bind_date('activated_date');
        $res = $this->mm->update($data);
        if($res) {
            set_messages('messages_crud','success_update');
        }else {
            set_messages('messages_crud','failure_update');
        }
        redirect(base_url().'memo');
    }
}

?>
