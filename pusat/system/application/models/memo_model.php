<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of memo
 *
 * @author craven
 */
class Memo_model  extends  Model {
    //put your code here

    function  __construct() {
        parent::Model();
    }
    function get_memo() {
        $res = $this->db->get('memo');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_memo_by_criteria($data,$from,$to) {
        $this->db->like($data);
        $this->db->where('activated_date >= ',$from);
        $this->db->where('activated_date <= ',$to);
        $res = $this->db->get('memo');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function get_memo_by_id($id) {
        $this->db->where('memo_id',$id);
        $res = $this->db->get('memo');
        if($res->num_rows()>0) {
            return $res;
        }
        return FALSE;
    }
    function save($data ) {
        $res = $this->db->insert('memo',$data);
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function update($data ) {
        $this->db->where('memo_id',$data['memo_id']);
        $res = $this->db->update('memo',$data);
        if($res) {
            return $res;
        }
        return FALSE;
    }
    function delete($data ) {
        $res = $this->db->delete('memo',array('memo_id'=>$data['memo_id']));
        if($res) {
            return $res;
        }
        return FALSE;
    }
}
?>
