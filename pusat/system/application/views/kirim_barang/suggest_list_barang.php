
<script type="text/javascript">
    $(function(){
        $('.kd').click(function(){
            var kd =$(this).attr('id');
            var kode_barang = $('#kode_barang_'+kd).val();
            var nama_barang = $('#nama_barang_'+kd).val();
            var rowid = $('#rowid_'+kd).val();

            $('#suggest_list_barang').load('<?php echo base_url()?>kirim_barang/suggest_list_barang/'+kode_barang+'/'
                +nama_barang.replace(" ","%20")+'/'+'1'+'/'+rowid).slideDown('slow');

        });
        $('#btn_close_list').click(function(){
            //            alert('cek');
            $('#suggest_list_barang').hide('slow');
        });
    });
</script>
<div class="wrap_suggest">
    <a href="#Sim" id="btn_close_list" class="btn_close_suggest">Tutup</a>
</div>
<table class="table_common">
    <tr>
        <th>No.</th>
        <th>Kode barang</th>
        <th>Nama barang</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>
    <?php
    if(isset ($barang_list)) {
        if($barang_list) {
            $i=1;
            foreach ($barang_list as $b=>$row) {
                ?>
    <tr class="<?php echo ($i%2==0)?'even':'';?>">
        <td>

            <?php echo $i;?>
            <input type="hidden" id="kode_barang_n<?php echo  $row['id']?>" name="kode_barang_n<?php echo $i?>" value="<?php echo $row['id']?>"/>
            <input type="hidden" id="rowid_n<?php echo  $row['id']?>" name="kode_barang_n<?php echo $i?>" value="<?php echo $row['rowid']?>"/>
            <input type="hidden" id="nama_barang_n<?php echo  $row['id']?>" name="nama_barang_n<?php echo $i?>" value="<?php echo $row['name']?>"/>
        </td>
        <td><?echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['qty']?></td>
        <td><a href="#" class="kd" id="n<?php echo $row['id'];?>">Hapus</a></td>
    </tr>
                <?php
                $i++;
            }
        }
    }
    ?>
</table>
