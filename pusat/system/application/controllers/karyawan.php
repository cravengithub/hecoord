<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

class Karyawan extends Controller {

    function index() {
        $this->load->model('karyawan_model','km');
        $data=array();
        $options=array(''=>'Semua');
        $k = $this->km->get_kantor();
        if($k) {
            foreach ($k->result() as $row) {
                $options[$row->id_kantor] = $row->nama_kantor;
            }
        }
        $data['kantor_combo'] = form_dropdown('k_id_kantor', $options);
        $data['karyawan_list'] = $this->km->get_karyawan();
        $templates = $this->load->view('karyawan/search',$data,true);
        load_templates($templates);
    }
    function search() {
        $this->load->model('karyawan_model','km');
        $jquery_action = $this->input->post('jquery_action');
        $data=array();
        $options=array(''=>'Semua');
        $k = $this->km->get_kantor();
        if($k) {
            foreach ($k->result() as $row) {
                $options[$row->id_kantor] = $row->nama_kantor;
            }
        }
        $data['kantor_combo'] = form_dropdown('k_id_kantor', $options);
        if($jquery_action) {
            $post = bind_form('k',$_POST);
            switch ($jquery_action) {
                case 'search':
                    $data['karyawan_list'] = $this->km->get_karyawan_by_criteria($post);
//                    pre($this->db->last_query());
                    break;
            }
        }
        $templates = $this->load->view('karyawan/search',$data,true);
        load_templates($templates);
    }
    function process($action='save',$id='') {
        $data=array();
        $view='karyawan/form';
        $this->load->model('karyawan_model','km');
        $kantor = $this->km->get_kantor();
        if($kantor!=FALSE) {
            foreach ($kantor->result() as $row) {
                $kantor_option[$row->id_kantor] = $row->nama_kantor;
            }
        }
        $data['kantor_combo'] = form_dropdown('k_id_kantor', $kantor_option);
        $data['tanggal_lahir_combo'] = date_combo('tanggal_lahir');
        $jenis_kelamin_option = array('1'=>'laki-laki','0'=>'perempuan');
        $data['jenis_kelamin_combo'] = form_dropdown('k_jenis_kelamin',$jenis_kelamin_option);
        $agama_option = array('Islam'=>'Islam','Kristen'=>'Kristen','Katholik'=>'Katholik','Hindu'=>'Hindu','Budha'=>'Budha');
        $data['agama_combo'] = form_dropdown('k_agama',$agama_option);
	$jabatan_option=array('manager'=>'manager','kasir'=>'kasir','staf'=>'staf','admin'=>'admin');
	$data['jabatan_combo'] = form_dropdown('k_jabatan',$jabatan_option);
        if($action=='update') {
            $karyawan = $this->km->get_karyawan_by_id($id)->row();
            $data['karyawan'] = $karyawan;
            $data['kantor_combo'] = form_dropdown('k_id_kantor', $kantor_option,$karyawan->id_kantor);
            $data['tanggal_lahir_combo'] = date_combo('tanggal_lahir',$karyawan->tanggal_lahir);
            $data['jenis_kelamin_combo'] = form_dropdown('k_jenis_kelamin',$jenis_kelamin_option,$karyawan->jenis_kelamin);
            $data['agama_combo'] = form_dropdown('k_agama',$agama_option,$karyawan->agama);
	    $data['jabatan_combo'] = form_dropdown('k_jabatan',$jabatan_option,$karyawan->jabatan);
        }else if($action=='delete') {
            $data['karyawan'] = $this->km->get_karyawan_by_id($id)->row();
            $view = 'karyawan/delete_form';
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
        $data['tanggal_lahir'] = bind_date('tanggal_lahir');
//        $data['password'] = md5($data['password']);
        $this->load->model('Karyawan_model','km');
        $res = $this->km->save($data);
        if($res) {
            set_messages('messages_crud','success_save');
        }else {
            set_messages('messages_crud','failure_save');
        }
        redirect(base_url().'karyawan');
    }

    function _delete($data) {
        $this->load->model('Karyawan_model','km');
        $data = bind_form('k', $data);
        $res = $this->km->delete($data);
        if($res) {
            set_messages('messages_crud','success_delete');
        }else {
            set_messages('messages_crud','failure_delete');
        }
        redirect(base_url().'karyawan');

    }

    function _update($data) {
        $data = bind_form('k', $data);
        $data['tanggal_lahir'] = bind_date('tanggal_lahir');
//        $data['password'] = md5($data['password']);
        $this->load->model('Karyawan_model','km');
        $res = $this->km->update($data);
        //pre($this->db->last_query());
	if($res) {
            set_messages('messages_crud','success_update');
        }else {
            set_messages('messages_crud','failure_update');
        }
        //redirect(base_url().'karyawan');
    }
}

?>
