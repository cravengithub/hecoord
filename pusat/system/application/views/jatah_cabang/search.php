<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            $('#jquery_action').val('search');
            $('#main_form').submit();
        });
        $('#jc_kode_barang').keypress(function(e){
            if(e.which==13){
                var param = $('#jc_kode_barang').val();
                $('#suggest_barang').load('<?php echo base_url()?>jatah_cabang/suggest_barang/'+param).slideDown('slow');
            }
        });
    });
</script>
<h3>
    <?php
    echo get_messages('message_crud');
    ?>
</h3>
<form  id="main_form" name="main_form" method="post" action="<?php echo base_url()?>jatah_cabang/search">
    <input type="hidden" id ="jquery_action" name="jquery_action" value=""/>
    <table>
        <tr>
            <th>Kantor</th>
            <td>:</td>
            <td><?php echo isset ($kantor_combo)?$kantor_combo:'';?></td>
        </tr>
        <tr>
            <th>Kode barang</th>
            <td>:</td>
            <td><input type="text" id="jc_kode_barang" name="jc_kode_barang" /></td>
        </tr>
        <tr>
            <td colspan="3"><div id="suggest_barang"/></td>
        </tr>

        <tr>
            <th>Nama barang</th>
            <td>:</td>
            <td><input type="text" id="nama_barang" name="nama_barang" readonly/></td>
        </tr>
        <tr>
            <td><a href="#" id="btn_submit" class="btn">Cari</a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>jatah_cabang/process/save/" id="btn_add" class="btn">Tambah</a></td>
        </tr>
    </table>

</form>
<?php
if(isset ($jatah_cabang_list))
    if($jatah_cabang_list) {?>
<table class="table_common">
    <tr>
        <th>No.</th>
        <th>Kantor</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Limit atas</th>
        <th>Limit bawah</th>
        <th colspan="2">Aksi</th>
    </tr>
            <?php
            $i=1;
            foreach ($jatah_cabang_list->result() as $row) {
                ?>
    <tr class="<?php echo ($i%2==0)?'even':'';?>">
        <td><?php echo $i;?></td>
        <td><?php echo $row->nama_kantor;?></td>
        <td><?php echo $row->kode_barang;?></td>
        <td><?php echo $row->nama_barang;?></td>
        <td><?php echo $row->limit_atas;?></td>
        <td><?php echo $row->limit_bawah;?></td>
        <td><?php echo anchor(base_url()."jatah_cabang/process/update/".$row->id_jatah,'Edit');?></td>
        <td><?php echo anchor(base_url()."jatah_cabang/process/delete/".$row->id_jatah,'Delete');?></td>
    </tr>
                <?php
                $i++;
            }
            ?>
</table>
        <?php }?>