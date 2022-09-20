<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of karyawan_model
 *
 * @author craven
 */
class Karyawan_ws_model extends Model {
    //put your code here
    function  __construct() {
        parent::Model();
    }
    function get_karyawan() {
        $this->db->join('kantor ka','ka.id_kantor=k.id_kantor');
        $res = $this->db->get('karyawan k');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_kantor() {
        $res = $this->db->get('kantor');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_karyawan_by_criteria($data) {
        $this->db->join('kantor ka','ka.id_kantor=k.id_kantor');
        $this->db->like('k.nama',$data['nama']);
        $this->db->like('k.username',$data['username']);
        $this->db->like('k.alamat',$data['alamat']);
        $this->db->like('k.kode_karyawan',$data['kode_karyawan']);
        if($data['id_kantor']!='') {
                $this->db->where('k.id_kantor',$data['id_kantor']);

        }
        $res = $this->db->get('karyawan k');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_karyawan_by_id($id) {
        $this->db->join('kantor ka','ka.id_kantor=k.id_kantor');
        $this->db->where('kode_karyawan',$id);
        $res = $this->db->get('karyawan k');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function save($data ) {
        $res = $this->db->insert('karyawan',$data);
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function update($data ) {
        $res = $this->db->update('karyawan',$data,array('kode_karyawan'=>$data['kode_karyawan']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function delete($data ) {
        $res = $this->db->delete('karyawan',array('kode_karyawan'=>$data['kode_karyawan']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
}
?>
