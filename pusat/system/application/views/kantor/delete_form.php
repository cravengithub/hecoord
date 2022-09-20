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
$k = isset ($kantor)?$kantor:'';
?>
<h3>Apakah Anda akan menghapus data ini ? ?</h3>
<form id="main_form" name="main_form" method="post">
    <input type="hidden" id="jquery_action" name="jquery_action" value=""/>
    <input type="hidden" name="k_id_kantor" value="<?php echo @$k->id_kantor?>"/>
    <table>
        <tr>
            <td><a href="#" id="btn_submit" class="">Ya</a></td>
            <td>&nbsp;</td>
            <td><a href="<?php echo base_url()?>kantor" id="btn_cancel" class="">Tidak</a></td>
        </tr>
    </table>

</form>