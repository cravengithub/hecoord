<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

function load_templates($data=array(),$index='index') {
    $CI =& get_instance();
    $templates['main'] =$data;
    $CI->load->view('./../../../templates/'.$index,$templates);
}

function date_combo($name='',$selected_Y_m_d='',$extra='') {
    $date = array();
    for($i=1;$i<32;$i++) {
        $date[$i]=$i;
    }
    $month=array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli',
            'Agustus','September','Oktober','November','Desember');
    $year = array();
    for($i=date('Y');$i>1970;$i--) {
        $year[$i]=$i;
    }
    if($selected_Y_m_d!='') {
        $str = explode("-",$selected_Y_m_d);
        return form_dropdown($name."_dt", $date, $str[2], $extra)."&nbsp;"
                .form_dropdown($name."_mh", $month, $str[1], $extra)."&nbsp;"
                .form_dropdown($name."_yr", $year, $str[0], $extra);

    }
    return form_dropdown($name."_dt", $date, '', $extra)."&nbsp;"
            .form_dropdown($name."_mh", $month, '', $extra)."&nbsp;"
            .form_dropdown($name."_yr", $year, '', $extra);


}

?>
