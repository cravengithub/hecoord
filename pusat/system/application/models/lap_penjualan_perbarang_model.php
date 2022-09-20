<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of Lap_penjualan_perbarang_model
 *
 * @author craven
 */
class Lap_penjualan_perbarang_model extends Model {
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
    function get_suggest_barang($kode) {
        $this->db->like('kode_barang',$kode);
        $res = $this->db->get('barang',5);
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_rekap_by_criteria($post,$from,$to) {
        $this->db->join('detail_transaksi dt','dt.id_transaksi=r.id_transaksi and dt.id_kantor=r.id_kantor');
        $this->db->join('barang b','b.kode_barang=dt.kode_barang');
        $this->db->join('kantor k','k.id_kantor=r.id_kantor');
        $this->db->where('r.tanggal_transaksi >=',$from);
        $this->db->where('r.tanggal_transaksi <=',$to);
        $this->db->order_by('r.id_transaksi','desc');
        if($post['kode_barang']!='') {
            $this->db->where('dt.kode_barang',$post['kode_barang']);
        }
        $res = $this->db->get('rekap r');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;

    }
}
?>
