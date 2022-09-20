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
class Lap_penjualan_perkantor_model extends Model {
    //put your code here
    function  __construct() {
        parent::Model();
    }
    function get_kantor() {
        $res = $this->db->get('kantor');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_kantor_by_id($id) {
        $this->db->where('id_kantor',$id);
        $res = $this->db->get('kantor');
        if($res->num_rows()>0) {
            return $res->row();
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
        if($post['id_kantor']!='') {
            $this->db->where('r.id_kantor',$post['id_kantor']);
        }
        $res = $this->db->get('rekap r');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function is_rekap($id_kantor,$id_transaksi) {
        $this->db->where('id_kantor',$id_kantor);
        $this->db->where('id_transaksi',$id_transaksi);
        $res = $this->db->get('rekap');
        if($res->num_rows()>0)
            return TRUE;
        return FALSE;
    }
    function is_detail_transaksi($id_kantor,$id_transaksi,$id_detail_transaksi) {
        $this->db->where('id_kantor',$id_kantor);
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->where('id_detail_transaksi',$id_detail_transaksi);
        $res = $this->db->get('detail_transaksi');
        if($res->num_rows()>0)
            return TRUE;
        return FALSE;
    }
    function save_transaksi($data ) {
        $res = $this->db->insert('rekap',$data);
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function save_transaksi_batch($rs ,$id_kantor) {
        $this->db->trans_start();
        $data=array();
        foreach ($rs as $r) {
            $data['id_transaksi']=$r['id_transaksi'];
            $data['kode_karyawan']=$r['kode_karyawan'];
            $data['id_kantor'] =$id_kantor;
            $data['tanggal_transaksi']=$r['tanggal_transaksi'];
            if(!$this->is_rekap($data['id_kantor'],$data['id_transaksi'])) {
                $this->db->insert('rekap',$data);
            }
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function save_detail_transaksi($data ) {
        $res = $this->db->insert('detail_transaksi',$data);
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function save_detail_transaksi_batch($rs,$id_kantor ) {
//        pre($rs);
        $this->db->trans_start();
        $data=array();
        foreach ($rs as $r) {
            $data['id_transaksi']=$r['id_transaksi'];
            $data['kode_barang']=$r['kode_barang'];
            $data['jumlah']=$r['jumlah_barang'];
            $data['id_kantor'] =$id_kantor;
            if(!$this->is_detail_transaksi($data['id_kantor'],$data['id_transaksi'])) {
                $this->db->insert('detail_transaksi',$data);
            }
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function save_batch($rs_trans,$rs_detail,$id_kantor) {
        $this->db->trans_start();
        if(count($rs_trans)>0) {
            foreach ($rs_trans as $r) {
                $data['id_transaksi']=$r['id_transaksi'];
                $data['kode_karyawan']=$r['kode_karyawan'];
                $data['id_kantor'] =$id_kantor;
                $data['tanggal_transaksi']=$r['tanggal_transaksi'];
                if(!$this->is_rekap($data['id_kantor'],$data['id_transaksi'])) {
                    $this->db->insert('rekap',$data);
                }
            }
            foreach ($rs_detail as $rx) {
                $dt['id_detail_transaksi']=$rx['id_detail_transaksi'];
                $dt['id_transaksi']=$rx['id_transaksi'];
                $dt['kode_barang']=$rx['kode_barang'];
                $dt['jumlah']=$rx['jumlah_barang'];
                $dt['id_kantor'] =$id_kantor;
                if(!$this->is_detail_transaksi($dt['id_kantor'],$dt['id_transaksi'],$dt['id_detail_transaksi'])) {
                    $this->db->insert('detail_transaksi',$dt);
                }
            }
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

}
?>
