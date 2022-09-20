<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            $('#jquery_action').val('search');
            $('#main_form').submit();
        });
    });
</script>
<h3>
    <?php
    echo get_messages('message_crud');
    ?>
</h3>
<form  id="main_form" name="main_form" method="post" action="<?php echo base_url()?>memo/search">
    <input type="hidden" id ="jquery_action" name="jquery_action" value=""/>
    <table>
        <tr>
            <th>name</th>
            <td>:</td>
            <td><input type="text" id="m_name" name="m_name" /></td>
        </tr>
        <tr>
            <th>email</th>
            <td>:</td>
            <td><input type="text" id="m_email" name="m_email" /></td>
        </tr>
        <tr>
            <th>activated date</th>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>from</td>
            <td>:</td>
            <td><? echo isset ($date_combo_fr)?$date_combo_fr:'';?></td>
        </tr>
        <tr>
            <td>to</td>
            <td>:</td>
            <td><? echo isset ($date_combo_to)?$date_combo_to:'';?></td>
        </tr>
        <tr>
            <th>status</th>
            <td>:</td>
            <td><? echo isset ($status_combo)?$status_combo:'';?></td>
        </tr>
        <tr>
            <td><a href="#" id="btn_submit" class="">Search</a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>memo/process/save/" id="btn_add" class="">Add</a></td>
        </tr>
    </table>

</form>
<?php
if(isset ($memo_list))
    if($memo_list) {?>
<table border="1">
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Activated Date</th>
        <th>Created Date</th>
        <th>Comment</th>
        <th>Status</th>
        <th colspan="2">Action</th>
    </tr>
            <?php
            $i=1;
            foreach ($memo_list->result() as $row) {
                ?>
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $row->name;?></td>
        <td><?php echo $row->email;?></td>
        <td><?php echo $row->activated_date;?></td>
        <td><?php echo $row->created_date;?></td>
        <td><?php echo $row->comment;?></td>
        <td><?php echo $row->status;?></td>
        <td><?php echo anchor(base_url()."memo/process/update/".$row->memo_id,'Edit');?></td>
        <td><?php echo anchor(base_url()."memo/process/delete/".$row->memo_id,'Delete');?></td>
    </tr>
                <?php
                $i++;
            }
            ?>
</table>
        <?php }?>