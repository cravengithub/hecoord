<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            $('#jquery_action').val('search');
            $('#main_form').submit();
        });
    });
</script>
<h2>Data Kantor</h2>
    <?php
    echo get_messages('message_crud')!=''?'<h3>'.get_messages('message_crud').'</h3>':'';
    ?>

<form  id="main_form" name="main_form" method="post" action="<?php echo base_url()?>kantor/search">
    <input type="hidden" id ="jquery_action" name="jquery_action" value=""/>
    <table>
        <tr>
            <th>Nama kantor</th>
            <td>:</td>
            <td><input type="text" id="k_nama_kantor" name="k_nama_kantor" /></td>
        </tr>     
        <tr>
            <th>Keterangan</th>
            <td>:</td>
            <td>
                <textarea id="k_keterangan" name="k_keterangan" cols="20" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td><a href="#" id="btn_submit" class="btn">Cari</a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>kantor/process/save/" id="btn_add" class="btn">Tambah</a></td>
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
        <th>Keterangan</th>
        <th colspan="2">Aksi</th>
    </tr>
            <?php
            $i=1;
            foreach ($kantor_list->result() as $row) {
                ?>
     <tr class="<?php echo ($i%2==0)?'even':'';?>">
        <td><?php echo $i;?></td>
        <td><?php echo $row->nama_kantor;?></td>
        <td><?php echo $row->keterangan;?></td>
        <td><?php echo anchor(base_url()."kantor/process/update/".$row->id_kantor,'Edit');?></td>
        <td><?php echo anchor(base_url()."kantor/process/delete/".$row->id_kantor,'Delete');?></td>
    </tr>
                <?php
                $i++;
            }
            ?>
</table>
        <?php }?>