
<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            //            alert('percobaan');
            $('#main_form').submit();
        });
        $('#btn_add').click(function(){
            var kode = $('#kode_barang').val(),
            nama_barang =$('#nama_barang').val(),
            jumlah = $('#jumlah_barang').val();
            $('#suggest_list_barang').load('<?php echo base_url()?>kirim_barang/suggest_list_barang/'+kode+'/'
                +nama_barang.replace(" ","%20")+'/'+jumlah).slideDown('slow');

        });
        $('#kode_barang').keypress(function(e){
            if(e.which==13){
                var param = $('#kode_barang').val();
                $('#suggest_barang').load('<?php echo base_url()?>kirim_barang/suggest_barang/'+param).slideDown('slow');
            }
        });
    });
</script>
<?php
$k = isset ($karyawan)?$karyawan:'';
?>
<form  id="main_form" name="main_form" method="post">
    <input type="hidden" name="jquery_action" value="<?php echo isset ($karyawan)?'update':'save'?>"/>
    <table>
        <tr>
            <td>Kode kirim barang</td>
            <td>:</td>
            <td><input type="text" id="kb_kode_kirim" name="kb_kode_kirim" /></td>
        </tr>
        <tr>
            <td>Kantor</td>
            <td>:</td>
            <td><? echo isset ($kantor_combo)?$kantor_combo:'';?></td>
        </tr>
        <tr>
            <td>Tanggal kirim</td>
            <td>:</td>
            <td><? echo isset ($kirim_date_combo)?$kirim_date_combo:'';?></td>
        </tr>        
        <tr>
            <td>Kode barang</td>
            <td>:</td>
            <td><input type="text" id="kode_barang" name="kode_barang" value="<?php echo @$jc->kode_barang;?>" /></td>
        </tr>
        <tr>
            <td colspan="3"><div id="suggest_barang"/></td>
        </tr>
        <tr>
            <td>Nama barang</td>
            <td>:</td>
            <td><input type="text" id="nama_barang" name="nama_barang" value="<?php echo @$jc->nama_barang;?>" readonly/></td>
        </tr>
        <tr>
            <td>Jumlah barang</td>
            <td>:</td>
            <td><input type="text" id="jumlah_barang" name="jumlah_barang" value="<?php echo @$jc->nama_barang;?>"/></td>
        </tr>

        <tr>
            <td colspan="3" align="right" ><a href="#" class="btn_add_suggest" id="btn_add">Tambah Barang</a></td>
        </tr>
        <tr>
            <td colspan="3"><div id="suggest_list_barang"/></td>
        </tr>
        <tr>
            <td><a href="#" class="btn" id="btn_submit" ><?php echo isset ($k->kode_karyawan)?'Perbarui':'Simpan';?></a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>kirim_barang" id="btn_cancel" class="btn">Batal</a></td>
        </tr>
    </table>
</form>