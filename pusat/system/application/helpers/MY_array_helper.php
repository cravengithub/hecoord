<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
function pre($data=array()) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function bind_form($prefix='',$data='') {
    $len = strlen($prefix);
    $res = array();
    if($data!='') {
        foreach ($data as $key=>$value) {
            if(substr($key,0,$len )==$prefix) {
                $res[substr($key,$len+1)] = $value;
            }
        }
    }
    return $res;
}
function bind_date($name=''){
    return $_POST[$name.'_yr']."-".$_POST[$name.'_mh']."-".$_POST[$name.'_dt'];
}

?>
