<script type="text/javascript">
    $(function(){
        $('.kode').click(function(){
            var kd =$(this).attr('id');
            var kode_barang = $('#kode_barang_'+kd).val();
            var nama_barang = $('#nama_barang_'+kd).val();
            $('#kode_barang').val(kode_barang);
            $('#nama_barang').val(nama_barang);
            $('#kb_kode_barang').val(kode_barang);
            $('#suggest_barang').hide('slow');


        });
        $('#btn_close').click(function(){
            $('#suggest_barang').hide('slow');
        });
    });
</script>
<div class="wrap_suggest">
    <a href="#" class="btn_close_suggest" id="btn_close">Tutup</a>
    <a href="<?echo base_url()?>barang/process/save/" class="btn_add_suggest" >Tambah Barang</a>
</div>
<table class="table_common">
    <tr>
        <th>Kode barang</th>
        <th>Nama barang</th>
    </tr>
    <?php
    if(isset ($barang)) {
        if($barang) {
            $i=1;
            foreach ($barang->result() as $row) {

                ?>

    <tr class="<?php echo ($i%2==0)?'even':'';?>">
        <td>
            <a href="#" class="kode" id="n<?php echo $i;?>"><?echo $row->kode_barang;?></a>
            <input type="hidden" id="kode_barang_n<?php echo $i?>" name="kode_barang_n<?php echo $i?>" value="<?php echo $row->kode_barang?>"/>
            <input type="hidden" id="nama_barang_n<?php echo $i?>" name="nama_barang_n<?php echo $i?>" value="<?php echo $row->nama_barang?>"/>
        </td>
        <td><?php echo $row->nama_barang;?></td>
    </tr>
                <?php
                $i++;
            }
        }
    }
    ?>
</table>
