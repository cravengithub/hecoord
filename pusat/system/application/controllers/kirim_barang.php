<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class Kirim_barang extends Controller {
    function index() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $this->load->model('kirim_barang_model','kbm');
        $data=array();

        $status_options = array(''=>'Semua','diterima'=>'Diterima','dikirim'=>'Dikirim');
        $data['status_combo'] = form_dropdown('m_status', $status_options,'','id = m_status');
        $kantor_option=array();
        $employee = $this->session->userdata('karyawan');
        //pre($employee['jabatan']);
        if($employee['jabatan']=='kasir') {
            $kantor = $this->kbm->get_kantor_by_id($employee['id_kantor']);
            $data['kirim_barang_list'] = $this->kbm->get_kirim_by_id_kantor($employee['id_kantor']);
//            pre($this->db->last_query());
        }else {
            $kantor = $this->kbm->get_kantor();
            $kantor_option=array(''=>'Semua');
            $data['kirim_barang_list'] = $this->kbm->get_kirim_barang();
        }
	//pre($this->db->last_query());
        if($kantor!=FALSE) {
            foreach ($kantor->result() as $row) {
                $kantor_option[$row->id_kantor] = $row->nama_kantor;
            }
        }
	//pre($this->session->userdata);
        $data['kantor_combo'] = form_dropdown('kb_id_kantor', $kantor_option);
        
        $data['date_combo_fr'] = date_combo('tanggal_dari',date('Y-m-d'));
        $data['date_combo_to'] = date_combo('tanggal_sampai',date('Y-m-d'));
        $templates = $this->load->view('kirim_barang/search',$data,true);
        load_templates($templates);
    }
    function suggest_barang($kode='') {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data=array();
        $this->load->model('kirim_barang_model','kbm');
        $data['barang'] = $this->kbm->get_suggest_barang($kode);
        $this->load->view('kirim_barang/suggest_barang',$data);
    }
    function suggest_list_barang($kode='',$name='',$jumlah='',$rowid='') {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $this->load->library('cart');
        $data=array();
        $arr = array(
                'id'      => $kode,
                'qty'     => $jumlah,
                'price'   => $jumlah,
                'name'    => $name
        );
        if($rowid!='') {
            $this->cart->update(array('rowid'=>$rowid,'qty'=>0));
        }else {
            $this->cart->insert($arr);
        }
        $data['barang_list'] =$this->cart->contents();
        $this->load->view('kirim_barang/suggest_list_barang',$data);
    }
    function detail_kirim($kode_kirim='') {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data = array();
        $this->load->model('Kirim_barang_model','kbm');
        $jquery_action = $this->input->post('jquery_action');
        if($jquery_action) {
            switch ($jquery_action) {
                case 'add':
                    $this->_insert_detail_kirim($_POST);
                    break;
                case 'delete':
                    $this->_delete_detail_kirim($_POST);
                    break;
            }

        }
        if($kode_kirim!='') {
            $data['detail_kirim'] = $this->kbm->get_detail_kirim($kode_kirim);
        }
        $templates = $this->load->view('kirim_barang/detail_item',$data,true);
        load_templates($templates);
    }
    function search() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $this->load->model('kirim_barang_model','kbm');
        $jquery_action = $this->input->post('jquery_action');
        $data=array();

        $status_options = array(''=>'Semua','diterima'=>'Diterima','dikirim'=>'Dikirim');
        $data['status_combo'] = form_dropdown('m_status', $status_options,'','id = m_status');
        $kantor_option=array();
        $employee = $this->session->userdata('karyawan');
        if($employee['jabatan']=='kasir') {
            $kantor = $this->kbm->get_kantor_by_id($employee['id_kantor']);
            $data['kirim_barang_list'] = $this->kbm->get_kirim_by_id_kantor($employee['id_kantor']);
        }else {
            $kantor = $this->kbm->get_kantor();
            $kantor_option=array(''=>'Semua');
            $data['kirim_barang_list'] = $this->kbm->get_kirim_barang();
        }
        if($kantor!=FALSE) {
            foreach ($kantor->result() as $row) {
                $kantor_option[$row->id_kantor] = $row->nama_kantor;
            }
        }
        $data['kantor_combo'] = form_dropdown('kb_id_kantor', $kantor_option);
        
        $data['date_combo_fr'] = date_combo('tanggal_dari',date('Y-m-d'));
        $data['date_combo_to'] = date_combo('tanggal_sampai',date('Y-m-d'));
        if($jquery_action) {
            $post = bind_form('kb',$_POST);
            $status=$_POST['m_status'];
            $from = bind_date('tanggal_dari');
            $to = bind_date('tanggal_sampai');
            switch ($jquery_action) {
                case 'search':
                    $data['kirim_barang_list'] = $this->kbm->get_kirim_by_criteria($post,$status,$from,$to);
//                    pre($this->db->last_query());
                    break;
                case 'check':
                    $this->_accept($_POST);
                    break;
            }
        }
        $templates = $this->load->view('kirim_barang/search',$data,true);
        load_templates($templates);
    }
    function process($action='save',$id='') {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data=array();

        $view='kirim_barang/form';
        $this->load->model('kirim_barang_model','kbm');
        $kantor = $this->kbm->get_kantor();
        if($kantor!=FALSE) {
            foreach ($kantor->result() as $row) {
                $kantor_option[$row->id_kantor] = $row->nama_kantor;
            }
        }
        $data['kantor_combo'] = form_dropdown('kb_id_kantor', $kantor_option);
        $data['kirim_date_combo'] = date_combo('tanggal_kirim',date('Y-m-d'));
        if($action=='delete') {
            $data['kirim_barang'] = $this->kbm->get_kirim_by_id($id)->row();
            $view = 'kirim_barang/delete_form';
        }
        $jquery_action = $this->input->post('jquery_action');
        if($jquery_action) {
            switch ($jquery_action) {
                case 'save':
                    $this->_insert($_POST);
                    break;
                case 'delete':
                    $this->_delete($_POST);
                    break;
            }
        }
        $templates = $this->load->view($view,$data,true);
        load_templates($templates);

    }
    function _insert_detail_kirim($data) {
        $this->load->model('Kirim_barang_model','kbm');
        $data = bind_form('kb',$data);
        $flag = $this->kbm->get_detail_kirim_by_criteria($data['kode_kirim'],$data['kode_barang']);
        if($flag) {
            $data['id_detail_kirim'] = $flag->row()->id_detail_kirim;
            $this->kbm->update_detail_kirim($data);
        }else {
            $this->kbm->save_detail_kirim($data);
        }
        redirect(base_url().'kirim_barang/detail_kirim/'.$data['kode_kirim']);
    }
    function _delete_detail_kirim($data) {
        $this->load->model('Kirim_barang_model','kbm');
        $data = bind_form('kb',$data);
        $flag = $this->kbm->get_kirim_by_id($data['kode_kirim']);
//        pre($this->db->last_query());
        if($flag) {
            if($flag->row()->tanggal_terima=='0000-00-00') {
                $res = $this->kbm->delete_detail_kirim($data);
            }
        }
//        pre($this->db->last_query());

        redirect(base_url().'kirim_barang/detail_kirim/'.$data['kode_kirim']);
    }
    function _insert($data) {
        $this->load->library('cart');
        $data = bind_form('kb', $data);
        $data['tanggal_kirim'] = bind_date('tanggal_kirim');
        $this->load->model('Kirim_barang_model','kbm');
        $arr = array();
        $item = $this->cart->contents();
        if($item) {
            foreach ($item as $itm=>$it) {
                $arr[$it['id']]=array('kode_kirim'=>$data['kode_kirim'],'kode_barang'=>$it['id'],'jumlah_barang'=>$it['qty']);

            }
        }
//        pre($data);
        //simpan surat kirim ke tabel kirim_barang
        $res = $this->kbm->save($data);
        //simpan barang ke tabel detail barang
        if($arr) {
            foreach ($arr as $r=>$d) {
                $res = $this->kbm->save_barang($d);
            }
        }
        //hilangkan session cart
        if($item) {
            $this->cart->destroy();
        }
        if($res) {
            set_messages('messages_crud','success_save');
        }else {
            set_messages('messages_crud','failure_save');
        }
        redirect(base_url().'kirim_barang');
    }

    function _delete($data) {
        $this->load->model('Kirim_barang_model','kbm');
        $data = bind_form('kb', $data);
        //hapus data pada tabel kirim_barang
        $this->kbm-> delete_detail_kirim_by_kode($data);
        //hapus data pada tabel detail_kirim_barang
        $res = $this->kbm->delete($data);

        if($res) {
            set_messages('messages_crud','success_delete');
        }else {
            set_messages('messages_crud','failure_delete');
        }
        redirect(base_url().'kirim_barang');

    }
    function _accept($data) {
        $this->load->model('Kirim_barang_model','kbm');
        $data = bind_form('kb', $data);
        $flag = $this->kbm->get_kirim_by_id($data['kode_kirim']);

        $par = array('endpoint'=>$flag->row()->alamat_wsdl,'wsdl'=>TRUE);
        $this->load->library('nusoap/CI_soap_client',$par);
        $detail_kirim = $this->kbm->get_detail_kirim($data['kode_kirim']);
//        pre($this->db->last_query());
        if($flag) {
            if($flag->row()->tanggal_terima=='0000-00-00') {
                $dt =array('kode_kirim'=>$data['kode_kirim'],'tanggal_terima'=>date('Y-m-d'));
                if($detail_kirim) {
                    foreach($detail_kirim->result() as $row) {
                        $barang = $this->ci_soap_client->call('get_barang_by_id',array('id'=>$row->kode_barang));
                        $barang['JUMLAH_BARANG'] += $row->jumlah_barang;
                        $this->ci_soap_client->call('update_jumlah_barang',array('data'=>$barang));
                    }
                }
                $res=$this->kbm->update($dt);
//                pre($this->db->last_query());
            }
        }

        if(isset ($res)) {
            set_messages('check','succes_accept');
        }
        redirect(base_url().'kirim_barang');

    }
}
?>
