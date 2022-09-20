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
<form  id="main_form" name="main_form" method="post" action="<?php echo base_url()?>setting_wsdl/search">
    <input type="hidden" id ="jquery_action" name="jquery_action" value=""/>
    <table>
        <tr>
           <th>Nama kantor</th>
            <td>:</td>
            <td><input type="text" id="sw_nama_kantor" name="sw_nama_kantor" /></td>
        </tr>     
        <tr>
            <th>Alamat WSDL</th>
            <td>:</td>
            <td>
                <input type="text" id="sw_alamat_wsdl" name="sw_alamat_wsdl" />
            </td>
        </tr>
        <tr>
            <td><a href="#" id="btn_submit" class="btn">Cari</a></td>
            <td></td>
            <td></td>
        </tr>
    </table>

</form>
<?php
if(isset ($kantor_list))
    if($kantor_list) {?>
<table class="table_common">
    <tr>
        <th>No.</th>
        <th>Nama Kantor</th>
        <th>Alamat WSDL</th>
        <th>Aksi</th>
    </tr>
            <?php
            $i=1;
            foreach ($kantor_list->result() as $row) {
                ?>
    <tr class="<?php echo ($i%2==0)?'even':'';?>">
        <td><?php echo $i;?></td>
        <td><?php echo $row->nama_kantor;?></td>
        <td><?php echo $row->alamat_wsdl;?></td>
        <td><?php echo anchor(base_url()."setting_wsdl/process/update/".$row->id_kantor,'Edit');?></td>
    </tr>
                <?php
                $i++;
            }
            ?>
</table>
        <?php }?>