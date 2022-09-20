<?php
//header('Location: http://localhost/content/cabang');
function pre($arr=array()) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';

}
function save_karyawan($data) {
    if (!$link = mysql_connect('localhost', 'root', '')) {
        echo 'Could not connect to mysql';
        exit;
    }

    if (!mysql_select_db('cabang', $link)) {
        echo 'Could not select database';
        exit;
    }

    $sql = 'select * from karyawan where kode_karyawan = "'.$data['KODE_KARYAWAN'].'"';
    $result = mysql_query($sql, $link);
    if(!mysql_num_rows($result)> 0) {
        $sql    = 'INSERT INTO karyawan values('.'"'.$data['KODE_KARYAWAN'].'",'.
                '"'.$data['NAMA'].'",'.
                '"'.$data['ALAMAT'].'",'.
                '"'.$data['TEMPAT_LAHIR'].'",'.
                '"'.$data['TANGGAL_LAHIR'].'",'.
                '"'.$data['JENIS_KELAMIN'].'",'.
                '"'.$data['AGAMA'].'",'.
                '"'.$data['USERNAME'].'",'.
                '"'.$data['PASSWORD'].'"'.
                ') ';
//        echo $sql;
        $result = mysql_query($sql, $link);
    }

    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }

    mysql_close();

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
//        echo $sql;
        $result = mysql_query($sql, $link);
    }

    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }

    mysql_close();

}
function update_jumlah_barang($data) {
    if (!$link = mysql_connect('localhost', 'root', '')) {
        echo 'Could not connect to mysql';
        exit;
    }

    if (!mysql_select_db('cabang', $link)) {
        echo 'Could not select database';
        exit;
    }

    $sql='update barang set jumlah_barang="'.$data['JUMLAH_BARANG'].'"'.' where kode_barang="'.$data['KODE_BARANG'].'"';
    $result = mysql_query($sql, $link);
    
    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }

    mysql_close();

}
function get_barang_by_id($id='') {

    if (!$link = mysql_connect('localhost', 'root', '')) {
        echo 'Could not connect to mysql';
        exit;
    }

    if (!mysql_select_db('cabang', $link)) {
        echo 'Could not select database';
        exit;
    }

    $sql    = 'SELECT * FROM barang WHERE KODE_BARANG = "'.$id.'"';
    $result = mysql_query($sql, $link);

    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }
    $res = array();
    $row = mysql_fetch_object($result);
    $res = array(
            'KODE_BARANG'=>$row->KODE_BARANG,
            'NAMA_BARANG'=>$row->NAMA,
            'HARGA'=>$row->HARGA,
            'JUMLAH_BARANG'=>$row->JUMLAH_BARANG,
            'LIMIT_BAWAH'=>$row->LIMIT_BAWAH);

    mysql_free_result($result);
    mysql_close();
    return $res;
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
function get_transaksi_penjualan() {

    if (!$link = mysql_connect('localhost', 'root', '')) {
        echo 'Could not connect to mysql';
        exit;
    }

    if (!mysql_select_db('cabang', $link)) {
        echo 'Could not select database';
        exit;
    }

    $sql    = 'SELECT * FROM transaksi_penjualan ';
    $result = mysql_query($sql, $link);

    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }
    $res = array();
    while($row = mysql_fetch_object($result)) {
        $res[] = array(
                'id_transaksi'=>$row->ID_TRANSAKSI,
                'kode_karyawan'=>$row->KODE_KARYAWAN,
                'id_pelanggan'=>$row->ID_PELANGGAN,
                'tanggal_transaksi'=>$row->TANGGAL_TRANSAKSI
        );
        $kode = $row->KODE_BARANG;
    }
    mysql_free_result($result);
    mysql_close();
    return $res;
}
function get_detail_transaksi() {

    if (!$link = mysql_connect('localhost', 'root', '')) {
        echo 'Could not connect to mysql';
        exit;
    }

    if (!mysql_select_db('cabang', $link)) {
        echo 'Could not select database';
        exit;
    }

    $sql    = 'SELECT * FROM detail_transaksi';
    $result = mysql_query($sql, $link);

    if (!$result) {
        echo "DB Error, could not query the database\n";
        echo 'MySQL Error: ' . mysql_error();
        exit;
    }
    $res = array();
    while($row = mysql_fetch_object($result)) {
        $res[] = array(
                'id_detail_transaksi'=>$row->id_detail_transaksi,
                'id_transaksi'=>$row->id_transaksi,
                'kode_barang'=>$row->kode_barang,
                'jumlah_barang'=>$row->jumlah_barang
        );
        $kode = $row->KODE_BARANG;
    }
    mysql_free_result($result);
    mysql_close();
    return $res;
}
?>