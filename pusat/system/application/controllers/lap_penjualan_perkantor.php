<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class  Lap_penjualan_perkantor extends Controller {
    function index() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $this->load->model('lap_penjualan_perkantor_model','lpk');
        $data=array();
        $res= $this->lpk->get_kantor();
        $options['']='Semua';
        if($res) {
            foreach ($res->result() as $row) {
                $options[$row->id_kantor]=$row->nama_kantor;
            }
        }

        $data['kantor_combo'] = form_dropdown('lpk_id_kantor', $options);
        $data['date_combo_fr'] = date_combo('tanggal_dari',date('Y-m-d'));
        $data['date_combo_to'] = date_combo('tanggal_sampai',date('Y-m-d'));
        $templates = $this->load->view('lap_penjualan_perkantor/search',$data,TRUE);
        load_templates($templates);
    }
    function synch_form() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $templates = $this->load->view('lap_penjualan_perkantor/synch',NULL,TRUE);
        load_templates($templates);
    }
    function synchronize() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data=array();
        $this->load->model('lap_penjualan_perkantor_model','lpk');
        $data=array();
        $k = $this->lpk->get_kantor();
	

        if($k) {
	  $par = array('endpoint'=>$k->row()->alamat_wsdl,'wsdl'=>TRUE);
	  $this->load->library('nusoap/CI_soap_client',$par);
            foreach($k->result() as $row) {
                $this->ci_soap_client->set_soap_client(array('endpoint'=>$row->alamat_wsdl,'wsdl'=>TRUE));
                $rs_trans = $this->ci_soap_client->call('get_transaksi_penjualan');
                $rs_detail = $this->ci_soap_client->call('get_detail_transaksi');
                if($this->ci_soap_client->getError()==FALSE) {
                    $this->_insert__batch($rs_trans, $rs_detail, $row->id_kantor);
                }
            }
        }

        redirect(base_url().'lap_penjualan_perkantor/synch_form');

    }
    function search() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data=array();
        $view='lap_penjualan_perkantor/report';
        $this->load->model('Lap_penjualan_perkantor_model','lpk');
        $jquery_action = $this->input->post('jquery_action');
        if($jquery_action) {
            $post = bind_form('lpk',$_POST);
            $from = bind_date('tanggal_dari');
            $to = bind_date('tanggal_sampai');
            $data['from'] = $from;
            $data['to'] = $to;
            switch ($jquery_action) {
                case 'search':
                    if($post['id_kantor']=='') {
                        $view='lap_penjualan_perkantor/all_report';
                    }else {
                        $row = $this->lpk->get_kantor_by_id($post['id_kantor']);
                        $data['nama_kantor']=$row->nama_kantor;
                    }
                    $data['lap_penjualan_perkantor_list'] = $this->lpk->get_rekap_by_criteria($post,$from,$to);
		    //pre($this->db->last_query());
                    break;
            }
        }
        $templates = $this->load->view($view,$data,true);
        load_templates($templates);
    }

    function _insert__batch($rs_trans,$rs_detail,$id_kantor) {
        $this->load->model('Lap_penjualan_perkantor_model','bm');
        return $this->bm->save_batch($rs_trans,$rs_detail,$id_kantor);
    }
    /*
    function _insert_transaksi($data) {

        $this->load->model('Lap_penjualan_perkantor_model','bm');
        $res = $this->bm->save_transaksi($data);
        if($res) {
            set_messages('messages_crud','success_save');
        }else {
            set_messages('messages_crud','failure_save');
        }
    }
    function _insert_transaksi_batch($rs,$id_kantor) {

        $this->load->model('Lap_penjualan_perkantor_model','bm');
        return $this->bm->save_transaksi_batch($rs,$id_kantor);
    }
    function _insert_detail_transaksi($data) {

        $this->load->model('Lap_penjualan_perkantor_model','bm');
        $res = $this->bm->save_detail_transaksi($data);
        if($res) {
            set_messages('messages_crud','success_save');
        }else {
            set_messages('messages_crud','failure_save');
        }

    }
    function _insert_detail_transaksi_batch($rs,$id_kantor) {

        $this->load->model('Lap_penjualan_perkantor_model','bm');
        return $this->bm->save_detail_transaksi_batch($rs,$id_kantor);
    }
     *
    */
}
?>
