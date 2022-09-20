<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class  Lap_penjualan_perbarang extends Controller {
    function index() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
//        $this->load->model('lap_penjualan_perbarang_model','lpb');
        $data=array();
        $data['date_combo_fr'] = date_combo('tanggal_dari',date('Y-m-d'));
        $data['date_combo_to'] = date_combo('tanggal_sampai',date('Y-m-d'));
        $templates = $this->load->view('lap_penjualan_perbarang/search',$data,true);
        load_templates($templates);
    }

    function suggest_barang($kode='') {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data=array();
        $this->load->model('Lap_penjualan_perbarang_model','lpb');
        $data['barang'] = $this->lpb->get_suggest_barang($kode);
        $this->load->view('lap_penjualan_perbarang/suggest_barang',$data);
    }
    
    function search() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data=array();
        $view='lap_penjualan_perbarang/report';
        $this->load->model('Lap_penjualan_perbarang_model','lpb');
        $jquery_action = $this->input->post('jquery_action');
        if($jquery_action) {
            $post = bind_form('lpb',$_POST);
            $from = bind_date('tanggal_dari');
            $to = bind_date('tanggal_sampai');
            $data['from'] = $from;
            $data['to'] = $to;
            switch ($jquery_action) {
                case 'search':
                    if($post['kode_barang']=='') {
                        $view='lap_penjualan_perbarang/all_report';
                    }else {
                        $data['kode_barang']=$post['kode_barang'];
                        $data['nama_barang']=$_POST['nama_barang'];
                    }
                    $data['lap_penjualan_perbarang_list'] = $this->lpb->get_rekap_by_criteria($post,$from,$to);

//                    pre($this->db->last_query());
                    break;
            }
        }
        $templates = $this->load->view($view,$data,true);
        load_templates($templates);
    }

}
?>
