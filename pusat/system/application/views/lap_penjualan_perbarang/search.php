<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            $('#jquery_action').val('search');
            $('#main_form').submit();
        });
        $('#lpb_kode_barang').keypress(function(e){
            if(e.which==13){
//                alert('cek');
                            var param = $('#lpb_kode_barang').val();
                            $('#suggest_barang').load('<?php echo base_url()?>lap_penjualan_perbarang/suggest_barang/'+
                                param.replace(" ", "%20")).slideDown('slow');
            }

        });
    });


</script>
<h3></h3>
<form  id="main_form" name="main_form" method="post" action="<?php echo base_url()?>lap_penjualan_perbarang/search">
    <input type="hidden" id ="jquery_action" name="jquery_action" value=""/>
    <table>
        <tr>
            <th>Kode barang</th>
            <td>:</td>
            <td><input type="text" id="lpb_kode_barang" name="lpb_kode_barang" value="<?php echo @$jc->kode_barang;?>" /></td>
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
            <td colspan="3">
                <b>Tanggal transaksi</b>
                <div class="legend_div">
                    <table>
                        <tr>
                            <td>dari</td>
                            <td>:</td>
                            <td><? echo isset ($date_combo_fr)?$date_combo_fr:'';?></td>
                        </tr>
                        <tr>
                            <td>sampai</td>
                            <td>:</td>
                            <td><? echo isset ($date_combo_to)?$date_combo_to:'';?></td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td><a href="#" id="btn_submit" class="btn">Cari</a></td>
            <td></td>
        </tr>
    </table>

</form>
