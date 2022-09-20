<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
function set_messages($name='',$type='') {
    $CI =&get_instance();
    $CI->load->library('session');
    switch ($name) {
        case 'messages_crud':
            if($type=='success_save') {
                $CI->session->set_flashdata('message_crud', 'Data berhasil disimpan');
            }else if($type=='failure_save') {
                $CI->session->set_flashdata('message_crud', 'Data gagal disimpan');
            }else if($type=='success_update') {
                $CI->session->set_flashdata('message_crud', 'Data berhasil diperbarui');
            }else if($type=='failure_update') {
                $CI->session->set_flashdata('message_crud', 'Data gagal diperbarui');
            }elseif ($type=='success_delete') {
                $CI->session->set_flashdata('message_crud', 'Data berhasil dihapus');
            }elseif ($type=='failure_delete') {
                $CI->session->set_flashdata('message_crud', 'Data gagal dihapus');
            }
            break;
        case 'check':
            if ($type=='succes_accept') {
                $CI->session->set_flashdata('check', 'Barang telah diterima');
            }
            break;
        case 'synchronize':
            if($type=='success_synch') {
                $CI->session->set_flashdata('synchronize', 'Data berhasil disinkronisasi');
            }else if($type=='failure_synch') {
                $CI->session->set_flashdata('message_crud', 'Data gagal disinkronisasi');

            }
            break;
    }
}


function get_messages($name='') {
    $CI =&get_instance();
    $CI->load->library('session');
    return $CI->session->flashdata($name);
}


?>
