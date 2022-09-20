<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            $('#main_form').submit();
        });
        $('#jc_kode_barang').keypress(function(e){
            if(e.which==13){
                var param = $('#jc_kode_barang').val();
                $('#suggest_barang').load('<?php echo base_url()?>jatah_cabang/suggest_barang/'+param.replace(" ", "%20")).slideDown('slow');
            }
        });
    });
</script>
<?php
$jc = isset ($jatah_cabang)?$jatah_cabang:'';
?>
<form  id="main_form" name="main_form" method="post">
    <input type="hidden" id ="jquery_action" name="jquery_action" value="<?php echo isset ($jatah_cabang)?'update':'save'?>"/>
    <input type="hidden" id ="jc_id_jatah" name="jc_id_jatah" value="<?php echo @$jc->id_jatah;?>"/>
    <table>
        <tr>
            <th>Kantor</th>
            <td>:</td>
            <td><?php echo isset ($kantor_combo)?$kantor_combo:'';?></td>
        </tr>
        <tr>
            <th>Kode barang</th>
            <td>:</td>
            <td><input type="text" id="jc_kode_barang" name="jc_kode_barang" value="<?php echo @$jc->kode_barang;?>" /></td>
        </tr>
        <tr>
            <td colspan="3"><div id="suggest_barang"/></td>
        </tr>

        <tr>
            <th>Nama barang</th>
            <td>:</td>
            <td><input type="text" id="nama_barang" name="nama_barang" value="<?php echo @$jc->nama_barang;?>" readonly/></td>
        </tr>
        <tr>
            <th>Limit atas</th>
            <td>:</td>
            <td><input type="text" id="jc_limit_atas" name="jc_limit_atas" value="<?php echo @$jc->limit_atas;?>"/></td>
        </tr>
        <tr>
            <th>Limit bawah</th>
            <td>:</td>
            <td><input type="text" id="jc_limit_bawah" name="jc_limit_bawah" value="<?php echo @$jc->limit_bawah;?>"/></td>
        </tr>
        <tr>
            <td><a href="#" id="btn_submit" class="btn" ><?php echo isset ($jc->id_jatah)?'Perbarui':'Simpan';?></a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>jatah_cabang" id="btn_cancel" class="btn">Batal</a></td>
        </tr>
    </table>
</form>
