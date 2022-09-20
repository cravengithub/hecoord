<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of barang_model
 *
 * @author craven
 */
class Barang_model extends Model {
    //put your code here
    function  __construct() {
        parent::Model();
    }
    function get_barang() {
        $res = $this->db->get('barang');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_barang_by_criteria($data) {
        $this->db->like($data);
        $res = $this->db->get('barang');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_barang_by_id($id) {
        $this->db->where('kode_barang',$id);
        $res = $this->db->get('barang');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function save($data ) {
        $res = $this->db->insert('barang',$data);
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function update($data ) {
//        $this->db->where('id_barang',$data['id_barang']);
        $res = $this->db->update('barang',$data,array('kode_barang'=>$data['kode_barang']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function delete($data ) {
        $res = $this->db->delete('barang',array('kode_barang'=>$data['kode_barang']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
}
?>
