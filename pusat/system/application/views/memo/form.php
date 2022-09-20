<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            //            alert('percobaan');
            $('#main_form').submit();
        });
    });
</script>
<?php
$m = isset ($memo)?$memo:'';
?>
<form  id="main_form" name="main_form" method="post">
    <input type="hidden" name="jquery_action" value="<?php echo isset ($memo)?'update':'save'?>"/>
    <input type="hidden" name="m_memo_id" value="<?php echo @$m->memo_id?>"/>
    <table>
        <tr>
            <td>name</td>
            <td>:</td>
            <td><input type="text" id="m_name" name="m_name" value="<?php echo @$m->name?>"/></td>
        </tr>
        <tr>
            <td>email</td>
            <td>:</td>
            <td><input type="text" id="m_email" name="m_email" value="<?php echo @$m->email?>"/></td>
        </tr>
        <tr>
            <td>activated date</td>
            <td>:</td>
            <td><?php echo isset ($date_combo)?$date_combo:'';?></td>
        </tr>
        <tr>
            <td>status</td>
            <td>:</td>
            <td><?php echo isset ($status_combo)?$status_combo:'';?></td>
        </tr>        
        <tr>
            <td>comment</td>
            <td>:</td>
            <td>
                <textarea id="m_comment" name="m_comment" cols="20" rows="5"><?php echo @$m->comment?></textarea>
            </td>
        </tr>
        <tr>
            <td><a href="#" id="btn_submit" ><?php echo isset ($m->memo_id)?"Update":"Save";?></a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>memo" id="btn_cancel" class="">Cancel</a></td>
        </tr>
    </table>

</form>