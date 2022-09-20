<script type="text/javascript">
    $(function(){
        $('#kb_kode_barang').keypress(function(e){
            if(e.which==13){
                var param = $('#kb_kode_barang').val();
                $('#suggest_barang').load('<?php echo base_url()?>kirim_barang/suggest_barang/'+param).slideDown('slow');
            }
        });
        $('#btn_add').click(function(){
            //            alert('cek');
            $('#jquery_action').val('add');
            $('#main_form').submit();
        });
        $('.btn_delete').click(function(){
            //            alert('cek');
            var id =$(this).attr('id');
            var id_detail_kirim = $('#id_detail_kirim_'+id).val();
            $('#kb_id_detail_kirim').val(id_detail_kirim);
            $('#jquery_action').val('delete');
//            alert(id_detail_kirim);
            $('#main_form').submit();
        });
    });

</script>
<form id="main_form" name="main_form" method="post">
    <input type="hidden" id="jquery_action" name="jquery_action"/>
    <input type="hidden" id="kb_id_detail_kirim" name="kb_id_detail_kirim"/>
    <input type="hidden" id="kb_kode_kirim" name="kb_kode_kirim" value="<?php echo isset ($detail_kirim)?$detail_kirim->row()->kode_kirim:'';?>"/>
    <table>
        <tr>
            <td>Kode Barang</td>
            <td>:</td>
            <td><input type="text" id="kb_kode_barang" name="kb_kode_barang" /></td>
        </tr>
        <tr>
            <td colspan="3"><div id="suggest_barang"/></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td><input type="text" id="nama_barang" name="nama_barang" readonly/></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>:</td>
            <td><input type="text" id="kb_jumlah_barang" name="kb_jumlah_barang" /></td>
        </tr>
        <tr>
            <td><a href="#" id="btn_add" >Tambah Barang</a></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</form>
<?php
if(isset ($detail_kirim)) {

    ?>
<table class="table_common">
    <tr>
        <th>Kode barang</th>
        <th>Nama barang</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>
        <?php
        if($detail_kirim) {
            $i=1;
            foreach ($detail_kirim->result() as $row) {
                ?>
    <tr class="<?php echo ($i%2==0)?'even':'';?>">
        <td>
                        <?echo $row->kode_barang;?>
            <input type="hidden" id="kode_barang_n<?php echo $i?>" name="kode_barang_n<?php echo $i?>" value="<?php echo $row->kode_barang?>"/>
            <input type="hidden" id="nama_barang_n<?php echo $i?>" name="nama_barang_n<?php echo $i?>" value="<?php echo $row->nama_barang?>"/>
            <input type="hidden" id="id_detail_kirim_n<?php echo $i?>" name="id_detail_kirim_n<?php echo $i?>" value="<?php echo $row->id_detail_kirim?>"/>
        </td>
        <td><?php echo $row->nama_barang;?></td>
        <td><?php echo $row->jumlah_barang;?></td>
        <td> <a href="#" class="btn_delete" id="n<?php echo $i;?>">Hapus</a></td>
    </tr>
                <?php
                $i++;
            }
        }
    }
    ?>
</table>
<a href="<?echo base_url()?>kirim_barang">Kembali</a>