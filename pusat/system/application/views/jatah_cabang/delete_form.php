<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            //            alert('percobaan');
            $('#jquery_action').val('delete');
            $('#main_form').submit();
        });
    });
</script>
<?php
$jc = isset ($jatah_cabang)?$jatah_cabang:'';
?>
<h3>Apakah Anda akan menghapus data ini ? ?</h3>
<form id="main_form" name="main_form" method="post">
    <input type="hidden" id="jquery_action" name="jquery_action" value=""/>
    <input type="hidden" name="jc_id_jatah" value="<?php echo @$jc->id_jatah?>"/>
    <table>
        <tr>
            <td><a href="#" id="btn_submit" class="">Ya</a></td>
            <td>&nbsp;</td>
            <td><a href="<?php echo base_url()?>jatah_cabang" id="btn_cancel" class="">Tidak</a></td>
        </tr>
    </table>

</form>