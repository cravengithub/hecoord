<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            $('#jquery_action').val('search');
            $('#main_form').submit();
        });
        $('#semua_radio').click(function(){
            $('#per_karyawan').slideUp('slow');
            $('#btn_synch').slideDown('slow');
            $('#btn_submit').slideUp('slow');
        });
        $('#per_radio').click(function(){
            $('#btn_synch').slideUp('slow');
            $('#btn_submit').slideDown('slow');
            $('#per_karyawan').slideDown('slow');
        });
        $('#btn_synch').hide();
    });

</script>
<h3>
    <?php
    echo get_messages('synchronize');echo get_messages('error');
    ?>
</h3>
<form  id="main_form" name="main_form" method="post" action="<?php echo base_url()?>karyawan_ws/search">
    <input type="hidden" id ="jquery_action" name="jquery_action" value=""/>
    <table>
        <tr>
            <th>Kode karyawan</th>
            <td>:</td>
            <td><input type="text" id="k_kode_karyawan" name="k_kode_karyawan" /></td>
        </tr>
        <tr>
            <th>Nama karyawan</th>
            <td>:</td>
            <td><input type="text" id="k_nama" name="k_nama" /></td>
        </tr>
        <tr>
            <th>Username</th>
            <td>:</td>
            <td><input type="text" id="k_username" name="k_username" /></td>
        </tr>
        <tr>
            <th>Kantor</th>
            <td>:</td>
            <td>
                <!--<input type="text" id="k_id_kantor" name="k_id_kantor" />-->
                <?php echo isset ($kantor_combo)?$kantor_combo:''?>
            </td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>:</td>
            <td><input type="text" id="k_alamat" name="k_alamat" /></td>
        </tr>
        <tr>
            <th>Jenis Sinkronisasi</th>
            <td>:</td>
            <td>
                <input type="radio" id="per_radio" name="radio" checked />Per Karyawan
                <input type="radio" id="semua_radio" name="radio"/>Semua
            </td>
        </tr>
        <tr>
            <td><a href="#" id="btn_submit" class="btn">Cari</a></td>
            <td></td>
            <td><a href="<? echo base_url();?>karyawan_ws/synchronize/" id="btn_synch">Sinkronisasi</a></td>
        </tr>
    </table>

</form>
<div id="per_karyawan">
    <?php
    if(isset ($karyawan_list))
        if($karyawan_list) {?>
    <table class="table_common">
        <tr>
            <th>No.</th>
            <th>kode Karyawan</th>
            <th>Nama</th>
            <th>Kantor</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal lahir</th>
            <th >Aksi</th>
        </tr>
                <?php
                $i=1;
                foreach ($karyawan_list->result() as $row) {
                    ?>
        <tr class="<?php echo ($i%2==0)?'even':'';?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row->kode_karyawan;?></td>
            <td><?php echo $row->nama;?></td>
            <td><?php echo $row->nama_kantor;?></td>
            <td><?php echo $row->alamat;?></td>
            <td><?php echo ($row->jenis_kelamin==1)?'laki-laki':'perempuan';?></td>
            <td><?php echo $row->tanggal_lahir;?></td>
            <td><?php echo anchor(base_url()."karyawan_ws/synchronize/".$row->kode_karyawan,'Sinkronisasi');?></td>
        </tr>
                    <?php
                    $i++;
                }
                ?>
    </table>
            <?php }?>
</div>