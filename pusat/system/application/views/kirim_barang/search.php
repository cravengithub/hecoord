<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            $('#jquery_action').val('search');
            $('#main_form').submit();
        });
        $('.check').click(function(){

            var id = $(this).attr('id');
            $('#kb_kode_kirim').val(id);
            $('#jquery_action').val('check');
            $('#main_form').submit();
        });
    });
</script>
<h3>
    <?php
    echo get_messages('message_crud');
    echo get_messages('check');
    ?>
</h3>
<form  id="main_form" name="main_form" method="post" action="<?php echo base_url()?>kirim_barang/search">
    <input type="hidden" id ="jquery_action" name="jquery_action" value=""/>
    <table>
        <tr>
            <th>Kode kirim barang</th>
            <td>:</td>
            <td><input type="text" id="kb_kode_kirim" name="kb_kode_kirim" /></td>
        </tr>
        <tr>
            <th>Kantor</th>
            <td>:</td>
            <td><? echo isset ($kantor_combo)?$kantor_combo:'';?></td>
        </tr>
        <tr>            
            <td colspan="3">
                <b>Tanggal dikirim</b>
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
            <th>Status</th>
            <td>:</td>
            <td><? echo isset ($status_combo)?$status_combo:'';?></td>
        </tr>

        <tr>
            <td><a href="#" id="btn_submit" class="btn">Cari</a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>kirim_barang/process/save/" id="btn_add" class="btn">Tambah</a></td>
        </tr>
    </table>

</form>
<?php
if(isset ($kirim_barang_list))
    if($kirim_barang_list) {?>
<table class="table_common">
    <tr>
        <th>No.</th>
        <th>Kode kirim</th>
        <th>Kantor</th>
        <th>Tanggal kirim</th>
        <th>Tanggal terima</th>
        <th>Terima</th>
        <th colspan="2">Aksi</th>
    </tr>
            <?php
            $i=1;
            foreach ($kirim_barang_list->result() as $row) {
                ?>
    <tr class="<?php echo ($i%2==0)?'even':'';?>">
        <td><?php echo $i;?></td>
        <td><?php echo $row->kode_kirim;?></td>
        <td><?php echo $row->nama_kantor;?></td>
        <td><?php echo $row->tanggal_kirim;?></td>
        <td><?php echo $row->tanggal_terima;?></td>
        <td>
                        <?php
                        if($row->tanggal_terima=='0000-00-00') {
                            ?>

            <input type="checkbox" class="check" id="<?php echo $row->kode_kirim;?>" name="<?php echo $row->kode_kirim;?>"/>
                            <?php
                        }else {
                            ?>

            <input type="checkbox" class="check" id="<?php echo $row->kode_kirim;?>" name="<?php echo $row->kode_kirim;?>" checked/>
                            <?php
                        }
                        ?>

        </td>
                    <?php
//                        pre($this->session->userdata);
                    $employee = $this->session->userdata('karyawan');
                    if($employee['jabatan']=='manager') {
                        
                        ?>
        <td>
                            <?php
                            echo anchor(base_url()."kirim_barang/detail_kirim/".$row->kode_kirim,'Detail barang');?>
        </td>
        <td><?php echo anchor(base_url()."kirim_barang/process/delete/".$row->kode_kirim,'Hapus');?></td>
                        <?}?>
    </tr>
                <?php
                $i++;
            }
            ?>
</table>
        <?php }?>