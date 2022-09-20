<script type="text/javascript">
    $(function(){
        $('#btn_submit').click(function(){
            //            alert('percobaan');
            $('#main_form').submit();
        });
    });
</script>
<h2>
    <?php
    $k = isset ($kantor)?$kantor:'';
    echo isset ($kantor)?'Edit Data Kantor':'Input Data Kantor';
    ?>
</h2>
<form  id="main_form" name="main_form" method="post">
    <input type="hidden" name="jquery_action" value="<?php echo isset ($kantor)?'update':'save'?>"/>
    <input type="hidden" name="k_id_kantor" value="<?php echo @$k->id_kantor?>"/>
    <table>
        <tr>
            <td>Nama Kantor</td>
            <td>:</td>
            <td><input type="text" id="k_nama_kantor" name="k_nama_kantor" value="<?php echo @$k->nama_kantor?>"/></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td>
                <textarea id="k_keterangan" name="k_keterangan" cols="20" rows="5"><?php echo @$k->keterangan?></textarea>
            </td>
        </tr>
        <tr>
            <td><a href="#" class="btn" id="btn_submit" ><?php echo isset ($k->id_kantor)?'Perbarui':'Simpan';?></a></td>
            <td></td>
            <td><a href="<?php echo base_url()?>kantor" class="btn" id="btn_cancel" class="">Batal</a></td>
        </tr>
    </table>

</form>