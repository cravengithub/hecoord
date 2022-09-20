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
$m = isset ($memo)?$memo:'';
?>
<h3>Are you want to delete this data ?</h3>
<form id="main_form" name="main_form" method="post">
    <input type="hidden" id="jquery_action" name="jquery_action" value=""/>
    <input type="hidden" name="m_memo_id" value="<?php echo @$m->memo_id?>"/>
    <table>
        <tr>
            <td><a href="#" id="btn_submit" class="">Yes</a></td>
            <td>&nbsp;</td>
            <td><a href="<?php echo base_url()?>memo" id="btn_cancel" class="">No</a></td>
        </tr>
    </table>

</form>