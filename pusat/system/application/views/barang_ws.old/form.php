<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            $('#jquery_action').val('broadcast');
            $('#main_form').submit();
        });
        $('#bw_kode_barang').keypress(function(e){
            if(e.which==13){
                var param = $('#bw_kode_barang').val();
                $('#suggest_barang').load('<?php echo base_url()?>barang_ws/suggest_barang/'+param.replace(" ", "%20")).slideDown('slow');
            }
        });
        $('#semua_radio').click(function(){
            $('#bw_kode_barang').val('');
            $('#nama_barang').val('');
            $('#barang_opt').slideUp('slow');
        });
        $('#per_radio').click(function(){
            $('#barang_opt').slideDown('slow');
        });
    });
</script>
<?php
$jc = isset ($jatah_cabang)?$jatah_cabang:'';
?>
<form  id="main_form" name="main_form" method="post">
    <input type="hidden" id ="jquery_action" name="jquery_action" value=""/>
    <table>
        <tr>
            <th>Kantor</th>
            <td>:</td>
            <td><?php echo isset ($kantor_combo)?$kantor_combo:'';?></td>
        </tr>
        <tr>
            <th>Jenis Sinkronisasi</th>
            <td>:</td>
            <td>
                <input type="radio" id="per_radio" name="radio" checked />Per Barang
                <input type="radio" id="semua_radio" name="radio"/>Semua                
            </td>
        </tr>
    </table>
    <div id="barang_opt">
        <table>
            <tr>
                <th>Kode barang</th>
                <td>:</td>
                <td><input type="text" id="bw_kode_barang" name="bw_kode_barang" value="<?php echo @$jc->kode_barang;?>" /></td>
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
                <td colspan="3"><div id="suggest_barang"/></td>
            </tr>
        </table>
    </div>
    <table>
        <tr>
            <td><a href="#" id="btn_submit" class="btn" ><?php echo isset ($jc->id_jatah)?'Perbarui':'Simpan';?></a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>jatah_cabang" id="btn_cancel" class="btn">Batal</a></td>
        </tr>
    </table>
</form>
