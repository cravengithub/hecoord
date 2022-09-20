<?php
class Login extends Controller {
    function index() {
        $this->load->model('Login_model','lm');
        $jquery_action = $this->input->post('jquery_action');
        if($jquery_action) {
            switch ($jquery_action) {
                case 'search':
                    $karyawan = bind_form('l',$_POST);
//                    pre($karyawan);
                    $res = $this->lm->get_karyawan_by_criteria($karyawan);

//                    pre($this->db->last_query());
                    if($res) {
                        $row = $res->row();
                        $data = array(
                                'kode_karyawan' => $row->kode_karyawan,
                                'id_kantor' =>$row->id_kantor,
                                'username' => $row->username,
                                'password' => $row->password,
                                'jabatan' => $row->jabatan
                        );
//                        pre($res->row());
                        $this->session->set_userdata('karyawan',$data);
                          redirect(base_url().'home');
                    }
//                    pre($this->session->userdata);

                    break;
            }
        }
        $templates = $this->load->view('login/form','',true);
        load_templates($templates, 'login/index.php');
    }
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'home');
    }

}
?>
