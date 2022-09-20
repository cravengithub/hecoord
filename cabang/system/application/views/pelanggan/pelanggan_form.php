<?php 
	echo ! empty($h2_title) ? '<h2>' . $h2_title . '</h2>': '';
	echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';

	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';
?>

<form name="pelanggan_form" method="post" action="<?php echo $form_action; ?>">
		
	<p>
		<label for="nama">Nama:</label>
		<input type="text" class="form_field" name="nama" size="30" value="<?php echo set_value('nama', isset($default['nama']) ? $default['nama'] : ''); ?>" />
		
	</p>
	<?php echo form_error('nama', '<p class="field_error">', '</p>');?>	

	<p>
		<label for="alamat">Alamat:</label>
		<input type="text" class="form_field" name="alamat" size="30" value="<?php echo set_value('alamat', isset($default['alamat']) ? $default['alamat'] : ''); ?>" />
		
	</p>
	
	<p>
		<label for="jenis_kelamin">Jenis Kelamin:</label>
		<input name="jenis_kelamin" type="radio" value="1" <?php echo set_radio('jenis_kelamin', '1', isset($default['jenis_kelamin']) && $default['jenis_kelamin'] == '1' ? TRUE : FALSE); ?> />Pria
		<input name="jenis_kelamin" type="radio" value="0" <?php echo set_radio('jenis_kelamin', '0', isset($default['jenis_kelamin']) && $default['jenis_kelamin'] == '0' ? TRUE : FALSE); ?> />Wanita
		
	</p>
	<?php echo form_error('jenis_kelamin', '<p class="field_error">', '</p>');?>
	
	<p>
		<label for="no_telepon">Nomor Telepon:</label>
		<input type="text" class="form_field" name="no_telepon" size="30" value="<?php echo set_value('no_telepon', isset($default['no_telepon']) ? $default['no_telepon'] : ''); ?>" />
		
	</p>
	
	

	<p>
		<input type="submit" name="submit" id="submit" value=" Simpan " />
	</p>
</form>

<?php
	if ( ! empty($link))
	{
		echo '<p id="bottom_link">';
		foreach($link as $links)
		{
			echo $links . ' ';
		}
		echo '</p>';
	}
?>