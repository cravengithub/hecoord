<h3>Laporan Penjualan Berdasarkan Seluruh Barang</h3>
<table>
    <tr>
        <td><b>dari tanggal</b></td>
        <td><b>:</b></td>
        <td><b> <?php echo isset($from)?$from:'';?></b></td>
    </tr>
    <tr>
        <td><b>sampai tanggal</b></td>
        <td><b>:</b></td>
        <td><b> <?php echo isset($to)?$to:'';?></b></td>
    </tr>
</table>
<?php
if(isset ($lap_penjualan_perbarang_list))
    if($lap_penjualan_perbarang_list) {?>
<table class="table_common">
    <tr>
        <th>No.</th>
        <th>Tanggal transaksi</th>
        <th>Cabang</th>
        <th>Kode barang</th>
        <th>Nama barang</th>
        <th>Harga satuan</th>
        <th>Jumlah</th>
        <th>Sub total</th>
    </tr>

            <?php
            $i=1;
            $total=0;
            $tot_item=0;
            foreach ($lap_penjualan_perbarang_list->result() as $row) {
                ?>
    <tr class="<?php echo ($i%2==0)?'even':'';?>">
        <td><?php echo $i;?></td>
        <td><?php echo $row->tanggal_transaksi;?></td>
        <td><?php echo $row->nama_kantor;?></td>
        <td><?php echo $row->kode_barang;?></td>
        <td><?php echo $row->nama_barang;?></td>
        <td><?php echo $row->harga;?></td>
        <td><?php echo $row->jumlah;?></td>
        <td><?php echo ($row->harga *$row->jumlah);?></td>
    </tr>
                <?php
                $tot_item+=$row->jumlah;
                $total+=($row->harga *$row->jumlah);
                $i++;
            }
            ?>
        
    <tr>
        <th>Total</th>
        <td colspan="5"></td>
        <td><?php echo $tot_item?></td>
        <td><?php echo $total?></td>
    </tr>
</table>
        <?php }?>
<a href="<?echo base_url()?>lap_penjualan_perbarang" class="btn">Kembali</a>