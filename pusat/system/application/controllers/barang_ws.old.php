<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

class Barang_ws extends Controller {

    function index() {
        $data=array();
        $this->load->model('barang_ws_model','bwm');
        $kantor = $this->bwm->get_kantor();
        $kantor_option[''] = 'Semua';
        if($kantor!=FALSE) {
            foreach ($kantor->result() as $row) {
                $kantor_option[$row->id_kantor] = $row->nama_kantor;
            }
        }
        $jquery_action = $this->input->post('jquery_action');
        if($jquery_action) {
            switch ($jquery_action) {
                case 'broadcast':
                    $this->_broadcast($_POST);
                    break;

            }
        }
        $data['kantor_combo'] = form_dropdown('bw_id_kantor', $kantor_option);
        $data['jatah_cabang_list'] = $this->bwm->get_jatah_cabang();
        $templates = $this->load->view('barang_ws/form',$data,true);
        load_templates($templates);
    }
    function suggest_barang($kode='') {
        $data=array();
        $this->load->model('barang_ws_model','bwm');
        $data['barang'] = $this->bwm->get_suggest_barang($kode);
        $this->load->view('barang_ws/suggest_barang',$data);
    }

    function process($action='save',$id='') {
        $data=array();
        $view='jatah_cabang/form';
        $this->load->model('jatah_cabang_model','jcm');
        $kantor = $this->jcm->get_kantor();
        if($kantor!=FALSE) {
            foreach ($kantor->result() as $row) {
                $kantor_option[$row->id_kantor] = $row->nama_kantor;
            }
        }
        $data['kantor_combo'] = form_dropdown('jc_id_kantor', $kantor_option);
        if($action=='update') {
            $jatah_cabang = $this->jcm->get_jatah_cabang_by_id($id)->row();
            $data['kantor_combo'] = form_dropdown('jc_id_kantor', $kantor_option,$jatah_cabang->id_kantor);
            $data['jatah_cabang'] = $jatah_cabang;
        }else if($action=='delete') {
            $data['jatah_cabang'] = $this->jcm->get_jatah_cabang_by_id($id)->row();
            $view = 'jatah_cabang/delete_form';
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
    function _broadcast($data) {
        $data = bind_form('bw', $data);
        $this->load->model('barang_ws_model','bwm');
        $par=array();
        if($data['id_kantor']!='') {
            $kantor = $this->bwm->get_kantor_by_id($data['id_kantor'])->row();
            $par = array('endpoint'=>$kantor->alamat_wsdl,'wsdl'=>TRUE);
            $this->load->library('nusoap/CI_soap_client',$par);
            // Check for an error
            $err = $this->ci_soap_client->getError();
            if ($err) {
                // Display the error
                echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
                // At this point, you know the call that follows will fail
            }
            if($data['kode_barang']!='') {
                $row=$this->bwm->get_barang_by_id($data['kode_barang'])->row();
                $data = array(
                        'KODE_BARANG'=>$row->kode_barang,
                        'NAMA_BARANG'=>$row->nama_barang,
                        'HARGA'=>1000000,
                        'JUMLAH_BARANG'=>10,
                        'LIMIT_BAWAH'=>4
                );
                $this->ci_soap_client->call('save_barang',array('data'=>$data));
            }
        }
        $res = $this->jcm->save($data);
//        pre($this->db->last_query());
        if($res) {
            set_messages('messages_crud','success_save');
        }else {
            set_messages('messages_crud','failure_save');
        }
        redirect(base_url().'jatah_cabang');
    }
    function _insert($data) {
        $data = bind_form('jc', $data);
        $this->load->model('Jatah_cabang_model','jcm');
        $res = $this->jcm->save($data);
//        pre($this->db->last_query());
        if($res) {
            set_messages('messages_crud','success_save');
        }else {
            set_messages('messages_crud','failure_save');
        }
        redirect(base_url().'jatah_cabang');
    }



    function _update($data) {
        $data = bind_form('jc', $data);
        $this->load->model('Jatah_cabang_model','jcm');
        $res = $this->jcm->update($data);
        if($res) {
            set_messages('messages_crud','success_update');
        }else {
            set_messages('messages_crud','failure_update');
        }
        redirect(base_url().'jatah_cabang');
    }
}

?>
