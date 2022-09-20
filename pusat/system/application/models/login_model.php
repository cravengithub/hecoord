<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Login_model extends Model{
    function  __construct() {
        parent::Model();
    }

    function get_karyawan_by_criteria($data){
//        $this->db->where('username',$username);
//        $this->db->where('password',$password);
//        pre($data);
        $res = $this->db->get_where('karyawan',$data);
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
}
?>
