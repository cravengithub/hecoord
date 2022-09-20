<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of kantor_model
 *
 * @author craven
 */
class Kantor_model extends Model {
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
    function get_kantor_by_criteria($data) {
        $this->db->like($data);
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
            return $res;
        }
        return FALSE;
    }
    function save($data ) {
        $res = $this->db->insert('kantor',$data);
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function update($data ) {
//        $this->db->where('id_kantor',$data['id_kantor']);
        $res = $this->db->update('kantor',$data,array('id_kantor'=>$data['id_kantor']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function delete($data ) {
        $res = $this->db->delete('kantor',array('id_kantor'=>$data['id_kantor']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
}
?>
