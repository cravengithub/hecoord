<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            $('#jquery_action').val('delete');
            $('#main_form').submit();
        });
    });
</script>
<?php
$b = isset ($kirim_barang)?$kirim_barang:'';
?>
<h3>Apakah Anda akan menghapus data ini ? ?</h3>
<form id="main_form" name="main_form" method="post">
    <input type="hidden" id="jquery_action" name="jquery_action" value=""/>
    <input type="hidden" name="kb_kode_kirim" value="<?php echo @$b->kode_kirim?>"/>
    <table>
        <tr>
            <td><a href="#" id="btn_submit" class="">Ya</a></td>
            <td>&nbsp;</td>
            <td><a href="<?php echo base_url()?>kirim_barang" id="btn_cancel" class="">Tidak</a></td>
        </tr>
    </table>

</form>