<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            $('#jquery_action').val('search');
            $('#main_form').submit();
        });
    });
</script>
<h3>
    <?php
    echo get_messages('message_crud');
    ?>
</h3>
<form  id="main_form" name="main_form" method="post" action="<?php echo base_url()?>barang/search">
    <input type="hidden" id ="jquery_action" name="jquery_action" value=""/>
    <table>
        <tr>
            <th>Kode barang</th>
            <td>:</td>
            <td><input type="text" id="b_kode_barang" name="b_kode_barang" /></td>
        </tr>
        <tr>
            <th>Nama barang</th>
            <td>:</td>
            <td><input type="text" id="b_nama_barang" name="b_nama_barang" /></td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>:</td>
            <td><input type="text" id="b_harga" name="b_harga" /></td>
        </tr>
        <tr>
            <td><a href="#" id="btn_submit" class="btn">Cari</a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>barang/process/save/" id="btn_add" class="btn">Tambah</a></td>
        </tr>
    </table>

</form>
<?php
if(isset ($barang_list))
    if($barang_list) {?>
<table class="table_common">
    <tr>
        <th>No.</th>
        <th>kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th colspan="2">Aksi</th>
    </tr>
            <?php
            $i=1;
            foreach ($barang_list->result() as $row) {

                ?>
    <tr class="<?php echo ($i%2==0)?'even':'';?>">
        <td><?php echo $i;?></td>
        <td><?php echo $row->kode_barang;?></td>
        <td><?php echo $row->nama_barang;?></td>
        <td><?php echo $row->harga;?></td>
        <td><?php echo anchor(base_url()."barang/process/update/".$row->kode_barang,'Edit');?></td>
        <td><?php echo anchor(base_url()."barang/process/delete/".$row->kode_barang,'Delete');?></td>
    </tr>
                <?php
                $i++;
            }
            ?>
</table>
        <?php }?>