<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            $('#jquery_action').val('search');
            $('#main_form').submit();
        });
        $('#bw_kode_barang').keypress(function(e){
            if(e.which==13){
                var param = $('#bw_kode_barang').val();
                $('#suggest_barang').load('<?php echo base_url()?>barang_ws/suggest_barang/'+param).slideDown('slow');
            }
        });
        $('#semua_radio').click(function(){
            $('#per_barang').slideUp('slow');
            $('#btn_synch').slideDown('slow');
            $('#btn_submit').slideUp('slow');
        });
        $('#per_radio').click(function(){
            $('#btn_synch').slideUp('slow');
            $('#btn_submit').slideDown('slow');
            $('#per_barang').slideDown('slow');
        });
        $('#btn_synch').hide();
    });
</script>
<h3>
    <?php
    echo get_messages('synchronize');
    echo get_messages('error');
?>
</h3>
<form  id="main_form" name="main_form" method="post" action="<?php echo base_url()?>barang_ws/search">
    <input type="hidden" id ="jquery_action" name="jquery_action" value=""/>
    <table>
        <tr>
            <th>Kantor</th>
            <td>:</td>
            <td><?php echo isset ($kantor_combo)?$kantor_combo:'';?></td>
        </tr>
        <tr>
            <th>Kode barang</th>
            <td>:</td>
            <td><input type="text" id="bw_kode_barang" name="bw_kode_barang" /></td>
        </tr>
        <tr>
            <td colspan="3"><div id="suggest_barang"/></td>
        </tr>

        <tr>
            <th>Nama barang</th>
            <td>:</td>
            <td><input type="text" id="nama_barang" name="nama_barang" readonly/></td>
        </tr>
        <tr>
            <th>Jenis Sinkronisasi</th>
            <td>:</td>
            <td>
                <input type="radio" id="per_radio" name="radio" checked />Per Barang
                <input type="radio" id="semua_radio" name="radio"/>Semua
            </td>
        </tr>
        <tr>
            <td><a href="#" id="btn_submit" class="btn">Cari</a></td>
            <td></td>
            <td><a href="<? echo base_url();?>barang_ws/synchronize/" id="btn_synch">Sinkronisasi</a></td>
        </tr>
    </table>

</form>
<div id="per_barang">
    <?php
    if(isset ($barang_ws_list))
    if($barang_ws_list) {?>
    <table class="table_common">
        <tr>
            <th>No.</th>
            <th>Kantor</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Limit atas</th>
            <th>Limit bawah</th>
            <th >Aksi</th>
        </tr>
                <?php
                $i=1;
                foreach ($barang_ws_list->result() as $row) {
            ?>
        <tr class="<?php echo ($i%2==0)?'even':'';?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row->nama_kantor;?></td>
            <td><?php echo $row->kode_barang;?></td>
            <td><?php echo $row->nama_barang;?></td>
            <td><?php echo $row->limit_atas;?></td>
            <td><?php echo $row->limit_bawah;?></td>
            <td><?php echo anchor(base_url()."barang_ws/synchronize/".$row->id_jatah,'Sinrkonisasi');?></td>
        </tr>
                    <?php
                    $i++;
                }
        ?>
    </table>
        <?php }?>
</div>