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
class Kirim_barang_model extends Model {
    //put your code here
    function  __construct() {
        parent::Model();
    }
    function get_detail_kirim_by_criteria($kode_kirim,$kode_barang) {
        $res = $this->db->get_where('detail_kirim_barang',
                array('kode_kirim'=>$kode_kirim,'kode_barang'=>$kode_barang));
        if($res->num_rows()>0)
            return $res;
        return FALSE;
    }
    function get_kirim_barang() {
        $this->db->join('kantor k','k.id_kantor = kb.id_kantor');
//        $this->db->join('detail_kirim_barang dkb','dkb.kode_kirim = kb.kode_kirim');
        $res = $this->db->get('kirim_barang kb');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_detail_kirim($kode_kirim) {
        $this->db->join('detail_kirim_barang dk','dk.kode_kirim = kb.kode_kirim');
        $this->db->join('barang b','b.kode_barang = dk.kode_barang');
        $this->db->where('kb.kode_kirim',$kode_kirim);
        $res = $this->db->get('kirim_barang kb');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_kantor_by_id($id) {
        $this->db->where('id_kantor',$id);
        $res = $this->db->get('kantor');
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
    function get_kirim_by_criteria($data,$status,$from,$to) {
        $this->db->join('kantor k','k.id_kantor = kb.id_kantor');
        if($status =='dikirim') {
            $this->db->where("kb.tanggal_terima",'0000-00-00');
        }else if($status =='diterima') {
            $this->db->where("kb.tanggal_terima != ",'0000-00-00');
        }
        $this->db->where('kb.tanggal_kirim >= ',$from);
        $this->db->where('kb.tanggal_kirim <= ',$to);
        $this->db->like('kb.id_kantor',$data['id_kantor']);
        $this->db->like('kb.kode_kirim',$data['kode_kirim']);
        $res = $this->db->get('kirim_barang kb');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_kirim_by_id($id) {
        $this->db->join('kantor k','k.id_kantor = kb.id_kantor');
        $this->db->where('kb.kode_kirim',$id);
        $res = $this->db->get('kirim_barang kb');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
     function get_kirim_by_id_kantor($id) {
        $this->db->join('kantor k','k.id_kantor = kb.id_kantor');
        $this->db->where('kb.id_kantor',$id);
        $res = $this->db->get('kirim_barang kb');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function save($data ) {
        $res = $this->db->insert('kirim_barang',$data);
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function save_barang($data) {
        $res = $this->db->insert('detail_kirim_barang',$data);
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function save_detail_kirim($data ) {
        $res = $this->db->insert('detail_kirim_barang',$data);
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function update($data ) {
        $res = $this->db->update('kirim_barang',$data,array('kode_kirim'=>$data['kode_kirim']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function update_detail_kirim($data ) {
        $res = $this->db->update('detail_kirim_barang',$data,array('id_detail_kirim'=>$data['id_detail_kirim']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function delete($data ) {
        $res = $this->db->delete('kirim_barang',array('kode_kirim'=>$data['kode_kirim']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
     function delete_detail_kirim($data ) {
        $res = $this->db->delete('detail_kirim_barang',array('id_detail_kirim'=>$data['id_detail_kirim']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function delete_detail_kirim_by_kode($data ) {
        $res = $this->db->delete('detail_kirim_barang',array('kode_kirim'=>$data['kode_kirim']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
}
?>
