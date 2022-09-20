<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            //            alert('percobaan');
            $('#main_form').submit();
        });
    });
</script>
<?php
$b = isset ($barang)?$barang:'';
?>
<form  id="main_form" name="main_form" method="post">
    <input type="hidden" name="jquery_action" value="<?php echo isset ($barang)?'update':'save'?>"/>
    <table>
        <tr>
            <td>Kode Barang</td>
            <td>:</td>
            <td><input type="text" id="b_kode_barang" name="b_kode_barang" value="<?php echo @$b->kode_barang?>"/></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td><input type="text" id="b_nama_barang" name="b_nama_barang" value="<?php echo @$b->nama_barang?>"/></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>:</td>
            <td><input type="text" id="b_harga" name="b_harga" value="<?php echo @$b->harga?>"/></td>
        </tr>
        <tr>
            <td><a href="#" id="btn_submit" class="btn"><?php echo isset ($b->kode_barang)?'Perbarui':'Simpan';?></a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>barang" id="btn_cancel" class="btn">Batal</a></td>
        </tr>
    </table>
</form>