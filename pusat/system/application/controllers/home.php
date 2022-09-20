<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class Home extends Controller {
    function index() {
        $employee = $this->session->userdata('karyawan');
        if($employee=='') {
            redirect(base_url().'login');
        }
        $data = $this->load->view('home/index','',true);
        load_templates($data);
    }
}

?>
