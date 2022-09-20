<?php
require_once '../nusoap/lib/nusoap.php';
require_once '../web_services/cabang_services.php';


$server = new nusoap_server();
$server->configureWSDL('barangwsdl','urn:barangwdl');

$server->wsdl->addComplexType('karyawan_arr',
        'complexType',
        'array',
        'all',
        '',array(
        'KODE_KARYAWAN'=>array('name'=>'KODE_KARYAWAN','type'=>'xsd:string'),
        'NAMA'=>array('name'=>'NAMA','type'=>'xsd:string'),
        'ALAMAT'=>array('name'=>'ALAMAT','type'=>'xsd:string'),
        'TEMPAT_LAHIR'=>array('name'=>'TEMPAT_LAHIR','type'=>'xsd:string'),
        'TANGGAL_LAHIR'=>array('name'=>'TANGGAL_LAHIR','type'=>'xsd:string'),
        'JENIS_KELAMIN'=>array('name'=>'JENIS_KELAMIN','type'=>'xsd:int'),
        'AGAMA'=>array('name'=>'AGAMA','type'=>'xsd:string'),
        'USERNAME'=>array('name'=>'USERNAME','type'=>'xsd:string'),
        'PASSWORD'=>array('name'=>'PASSWORD','type'=>'xsd:string')
));
$server->wsdl->addComplexType('barang_arr',
        'complexType',
        'array',
        'all',
        '',array(
        'KODE_BARANG'=>array('name'=>'KODE_BARANG','type'=>'xsd:string'),
        'NAMA_BARANG'=>array('name'=>'NAMA_BARANG','type'=>'xsd:string'),
        'HARGA'=>array('name'=>'HARGA','type'=>'xsd:int'),
        'JUMLAH_BARANG'=>array('name'=>'JUMLAH_BARANG','type'=>'xsd:int'),
        'LIMIT_BAWAH'=>array('name'=>'LIMIT_BAWAH','type'=>'xsd:int')

));
$server->wsdl->addComplexType('barang_struct',
        'complexType',
        'struct',
        'all',
        '',array(
        'KODE_BARANG'=>array('name'=>'KODE_BARANG','type'=>'xsd:string'),
        'NAMA_BARANG'=>array('name'=>'NAMA_BARANG','type'=>'xsd:string'),
        'HARGA'=>array('name'=>'HARGA','type'=>'xsd:int'),
        'JUMLAH_BARANG'=>array('name'=>'JUMLAH_BARANG','type'=>'xsd:int'),
        'LIMIT_BAWAH'=>array('name'=>'LIMIT_BAWAH','type'=>'xsd:int')

));
$server->wsdl->addComplexType('transaksi_arr',
        'complexType',
        'array',
        'all',
        '',array(
        'id_transaksi'=>array('name'=>'id_transaksi','type'=>'xsd:int'),
        'kode_karyawan'=>array('name'=>'kode_karyawan','type'=>'xsd:string'),
        'id_pelanggan'=>array('name'=>'id_pelanggan','type'=>'xsd:int'),
        'tanggal_transaksi'=>array('name'=>'tanggal_transaksi','type'=>'xsd:string')
));
$server->wsdl->addComplexType('detail_transaksi_arr',
        'complexType',
        'array',
        'all',
        '',array(
        'id_detail_transaksi'=>array('name'=>'id_detail_transaksi','type'=>'xsd:int'),
        'id_transaksi'=>array('name'=>'id_transaksi','type'=>'xsd:int'),
        'kode_barang'=>array('name'=>'kode_barang','type'=>'xsd:string'),
        'jumlah_barang'=>array('name'=>'jumlah_barang','type'=>'xsd:int')
));
$server->register('get_barang',                // method name
        array(),        // input parameters
        array('return' => 'tns:barang_arr'),      // output parameters
        'urn:barangwdl',                      // namespace
        'urn:barangwdl#barang',                // soapaction
        'rpc',                                // style
        'encoded',                            // use
        'Says hello to the caller'            // documentation
);
$server->register('save_barang',array('data'=>'tns:barang_arr'));
$server->register('save_karyawan',array('data'=>'tns:karyawan_arr'));
$server->register('get_transaksi_penjualan',array(),array('data'=>'tns:transaksi_arr'));
$server->register('get_detail_transaksi',array(),array('data'=>'tns:detail_transaksi_arr'));
$server->register('get_barang_by_id',array('id'=>'xsd:string'),array('data'=>'tns:barang_struct'));
$server->register('update_jumlah_barang',array('data'=>'tns:barang_struct'),array());
//$data = array(
//        'KODE_KARYAWAN'=>'K01',
//        'NAMA'=>'Pariyo',
//        'ALAMAT'=>'Jogja',
//        'TEMPAT_LAHIR'=>'Jogja',
//        'TANGGAL_LAHIR'=>'1978-04-28',
//        'JENIS_KELAMIN'=>'1',
//        'AGAMA'=>'Islam',
//        'USERNAME'=>'a',
//        'PASSWORD'=>'p'
//);
//pre(get_detail_transaksi());
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
$data =array
        (
        'KODE_BARANG' => 'A01',
        'NAMA_BARANG' => 'Laptop A',
        'HARGA' => '500',
        'JUMLAH_BARANG' => '150',
        'LIMIT_BAWAH' => '10',
);
//update_jumlah_barang($data);
//pre(get_barang_by_id('A01'));
?>
