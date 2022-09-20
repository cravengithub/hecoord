<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
require_once '../nusoap/lib/nusoap.php';
header('Location: http://localhost/content/cabang/');

function pre($arr=array()) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';

}

function save_barang($data) {
  
    if (!$link = mysql_connect('localhost', 'root', '')) {
        echo 'Could not connect to mysql';
        exit;
    }

    if (!mysql_select_db('cabang', $link)) {
        echo 'Could not select database';
        exit;
    }

    $sql = 'select * from barang where kode_barang = "'.$data['KODE_BARANG'].'"';
    $result = mysql_query($sql, $link);
    if(!mysql_num_rows($result)> 0) {
        $sql    = 'INSERT INTO barang values('.'"'.$data['KODE_BARANG'].'",'.
                '"'.$data['NAMA_BARANG'].'",'.
                '"'.$data['HARGA'].'",'.
                '"'.$data['JUMLAH_BARANG'].'",'.
                '"'.$data['LIMIT_BAWAH'].'"'.
                ') ';
//    echo $sql;
        $result = mysql_query($sql, $link);
    }

    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }

    mysql_close();

}
function get_barang() {

    if (!$link = mysql_connect('localhost', 'root', '')) {
        echo 'Could not connect to mysql';
        exit;
    }

    if (!mysql_select_db('cabang', $link)) {
        echo 'Could not select database';
        exit;
    }

    $sql    = 'SELECT * FROM barang ';
    $result = mysql_query($sql, $link);

    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }
    $res = array();
    while($row = mysql_fetch_object($result)) {
        $res[] = array(
                'KODE_BARANG'=>$row->KODE_BARANG,
                'NAMA_BARANG'=>$row->NAMA,
                'HARGA'=>$row->HARGA,
                'JUMLAH_BARANG'=>$row->JUMLAH_BARANG,
                'LIMIT_BAWAH'=>$row->LIMIT_BAWAH);
        $kode = $row->KODE_BARANG;
    }
    mysql_free_result($result);
    mysql_close();
    return $res;
}

//save_barang($data);
echo mysql_error();
$server = new nusoap_server();
$server->configureWSDL('barangwsdl','urn:barangwdl');

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

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
