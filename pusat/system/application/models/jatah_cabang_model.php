<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of jatah_cabang_model
 *
 * @author craven
 */
class Jatah_cabang_model extends Model {
    //put your code here
    function  __construct() {
        parent::Model();
    }
    function get_jatah_cabang() {
        $this->db->from('jatah_barang_cabang jc');
        $this->db->join('barang b','b.kode_barang=jc.kode_barang');
        $this->db->join('kantor k','k.id_kantor=jc.id_kantor');
        //$this->db->limit(5);
        $res = $this->db->get();
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
    function get_suggest_barang($kode) {
        $this->db->like('kode_barang',$kode);
        $res = $this->db->get('barang',5);
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_jatah_cabang_by_criteria($data) {
        $this->db->from('jatah_barang_cabang jc');
        $this->db->join('barang b','b.kode_barang=jc.kode_barang');
        $this->db->join('kantor k','k.id_kantor=jc.id_kantor');
        $this->db->where('k.id_kantor',$data['id_kantor']);
        $this->db->like('b.kode_barang',$data['kode_barang']);
        $this->db->limit(5);
        $res = $this->db->get();
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_jatah_cabang_by_id($id) {
         $this->db->join('barang b','b.kode_barang=jc.kode_barang');
        $this->db->join('kantor k','k.id_kantor=jc.id_kantor');
        $res = $this->db->get_where('jatah_barang_cabang jc',array('jc.id_jatah'=>$id));
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function save($data ) {
        $res = $this->db->insert('jatah_barang_cabang',$data);
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function update($data ) {
        $res = $this->db->update('jatah_barang_cabang',$data,array('id_jatah'=>$data['id_jatah']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function delete($data ) {
        $res = $this->db->delete('jatah_barang_cabang',array('id_jatah'=>$data['id_jatah']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
}
?>
