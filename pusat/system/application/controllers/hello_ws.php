<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of hello_client
 *
 * @author craven
 */
class Hello_ws extends Controller {
    //put your code here
    function client_wsdl() {
//        $par=array('endpoint'=>'http://localhost/content/pusat/endpoint/wsdl.xml','wsdl'=>TRUE);
        $par=array('endpoint'=>'http://localhost/content/cabang/web_services/index.php?wsdl','wsdl'=>TRUE);
        $this->load->library('nusoap/CI_soap_client',$par);
        // Check for an error

// Call the SOAP method
        $data = array(
                'KODE_BARANG'=>'A01',
                'NAMA_BARANG'=>'wedhus',
                'HARGA'=>1000000,
                'JUMLAH_BARANG'=>10,
                'LIMIT_BAWAH'=>4
        );
        $data = array(
                'KODE_KARYAWAN'=>'PA01',
                'NAMA'=>'Parjo',
                'ALAMAT'=>'Jogja',
                'TEMPAT_LAHIR'=>'Jogja',
                'TANGGAL_LAHIR'=>'1985-05-16',
                'JENIS_KELAMIN'=>1,
                'AGAMA'=>'Hindu',
                'USERNAME'=>'u',
                'PASSWORD'=>'p'
        );
//        $this->ci_soap_client->call('save_karyawan',array('data'=>$data));
        $result = $this->ci_soap_client->call('get_transaksi_penjualan');
//        $result = $this->ci_soap_client->call('get_detail_transaksi');
        //$result = $this->ci_soap_client->call('get_barang_by_id',array('id'=>'A01'));
        //$result['JUMLAH_BARANG']+=50;
        //$this->ci_soap_client->call('update_jumlah_barang',array('data'=>$result));
        $err = $this->ci_soap_client->getError();
        if ($err) {
            // Display the error
            echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
            // At this point, you know the call that follows will fail
        }

        pre($result);
        
    }

    function server() {


    }


}
?>
