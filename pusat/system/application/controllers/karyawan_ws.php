<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

class Karyawan_ws extends Controller {

    function index() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $this->load->model('karyawan_ws_model','km');
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
        $templates = $this->load->view('karyawan_ws/search',$data,true);
        load_templates($templates);
    }
    function search() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $this->load->model('karyawan_ws_model','km');
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
        $templates = $this->load->view('karyawan_ws/search',$data,true);
        load_templates($templates);
    }
    function synchronize($id='') {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data=array();
        $view='karyawan_ws/search';
        $this->load->model('karyawan_ws_model','kwm');
        if($id!='') {
            $row = $this->kwm->get_karyawan_by_id($id)->row();
            $par=array('endpoint'=>$row->alamat_wsdl,'wsdl'=>TRUE);
            $data = array(
                    'KODE_KARYAWAN'=>$row->kode_karyawan,
                    'NAMA'=>$row->nama,
                    'ALAMAT'=>$row->alamat,
                    'TEMPAT_LAHIR'=>$row->alamat,
                    'TANGGAL_LAHIR'=>$row->tanggal_lahir,
                    'JENIS_KELAMIN'=>$row->jenis_kelamin,
                    'AGAMA'=>$row->agama,
                    'USERNAME'=>$row->username,
                    'PASSWORD'=>$row->password
            );
            $this->load->library('nusoap/CI_soap_client',$par);
            $this->ci_soap_client->call('save_karyawan',array('data'=>$data));
            $err =$this->ci_soap_client->getError();
            if($err) {
                $this->session->set_flashdata('error',$err);
            }else {
                set_messages('synchronize', 'success_synch');
            }
        }
        else {
            $res = $this->kwm->get_karyawan();
            $err= FALSE;
            if($res) {
	      $par=array('endpoint'=>$res->row()->alamat_wsdl,'wsdl'=>TRUE);
              $this->load->library('nusoap/CI_soap_client',$par);
                foreach ($res->result() as $row) {
                    $data = array(
                            'KODE_KARYAWAN'=>$row->kode_karyawan,
                            'NAMA'=>$row->nama,
                            'ALAMAT'=>$row->alamat,
                            'TEMPAT_LAHIR'=>$row->alamat,
                            'TANGGAL_LAHIR'=>$row->tanggal_lahir,
                            'JENIS_KELAMIN'=>$row->jenis_kelamin,
                            'AGAMA'=>$row->agama,
                            'USERNAME'=>$row->username,
                            'PASSWORD'=>$row->password
                    );
                    if($row->alamat_wsdl) {
                        
			$this->ci_soap_client->set_soap_client(array('endpoint'=>$row->alamat_wsdl,'wsdl'=>TRUE));
                        $this->ci_soap_client->call('save_karyawan',array('data'=>$data));
                        $err =$this->ci_soap_client->getError();
			//echo $err;
                    }
                }
                if($err) {
                    $this->session->set_flashdata('error',$err);
                }else {
                    set_messages('synchronize', 'success_synch');
                }

            }
        }

        redirect(base_url().'karyawan_ws');


    }

}

?>
