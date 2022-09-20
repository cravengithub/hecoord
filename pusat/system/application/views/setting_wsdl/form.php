<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            //            alert('percobaan');
            $('#main_form').submit();
        });
    });
</script>
<?php
$k = isset ($kantor)?$kantor:'';
?>
<form  id="main_form" name="main_form" method="post">
    <input type="hidden" name="jquery_action" value="<?php echo isset ($kantor)?'update':'save'?>"/>
    <input type="hidden" name="sw_id_kantor" value="<?php echo @$k->id_kantor?>"/>
    <table>
        <tr>
            <td>Nama Kantor</td>
            <td>:</td>
            <td><input type="text" id="nama_kantor" name="sw_nama_kantor" readonly value="<?php echo @$k->nama_kantor?>"/></td>
        </tr>
        <tr>
            <td>Alamat WSDL</td>
            <td>:</td>
            <td>
                <input type="text" id="sw_alamat_wsdl" name="sw_alamat_wsdl" value="<?php echo @$k->alamat_wsdl?>"/>
            </td>
        </tr>
        <tr>
            <td><a href="#" class="btn" id="btn_submit" ><?php echo isset ($k->id_kantor)?'Perbarui':'Simpan';?></a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>setting_wsdl" class="btn" id="btn_cancel" class="">Batal</a></td>
        </tr>
    </table>

</form>