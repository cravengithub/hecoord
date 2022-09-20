<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

?>
<h3>Sinkronosasi Transaksi Penjualan</h3>
<b>
    <?php
    echo get_messages('synchronize');
    echo get_messages('error');
    ?>
</b>
<br>
Jika Anda akan melakukan sinkronisasi maka klik tombol di bawah ini :<br>
<a href="<?php echo base_url();?>lap_penjualan_perkantor/synchronize" class="btn">Sinkron</a>