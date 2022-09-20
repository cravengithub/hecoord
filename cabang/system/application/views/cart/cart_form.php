<html>

<?php 
	echo ! empty($h2_title) ? '<h2>' . $h2_title . '</h2>': '';
	echo ! empty($message) ? '<p class="message">' . $message . '</p>': '';
	$flashmessage = $this->session->flashdata('message');
	echo ! empty($flashmessage) ? '<p class="message">' . $flashmessage . '</p>': '';

?>

<form name="cart_form" method="post" action="<?php echo $form_action; ?>">
	
	<p>
		<label for="kode_barang">Nama Barang:</label>
        
		<?php 
		
		echo form_dropdown('kode_barang', $options_barang, ''); ?>
	</p>
	<?php echo form_error('id_kelas', '<p class="field_error">', '</p>');?>
	
	<p>
		<label for="jumlah_beli">Jumlah Beli:</label>
		<input type="text" class="form_field" name="jumlah_beli" size="30" value="<?php echo set_value('jumlah_beli', isset($default['jumlah_beli']) ? $default['jumlah_beli'] : ''); ?>" />
	</p>
	<?php echo form_error('jumlah_beli', '<p class="field_error">', '</p>');?>
	
	<p>
		<input type="submit" name="submit" id="submit" value=" Wokeh " />
	</p>
</form>


<body>

<?php if ($cart = $this->cart->contents()): ?>
<?
echo ! empty($h2_title2) ? '<h2>' . $h2_title2 . '</h2>': '';


?>
<div id="cart">

<table align="left"> <tr>
<th>Nama Barang</th>
			<th>Jumlah Item</th>
			<th>Harga Satuan</th>
			<th>Sub Total</th>
			<th>Hapus</th>
			
			
		</tr>
		<?php foreach ($cart as $cartitem): ?>
		<tr>
			<td><?php echo $cartitem['name'];?></td>
			<td><?php echo $this->cart->format_number($cartitem['qty']); ?></td>
			<td><?php echo $this->cart->format_number($cartitem['price']); ?></td>
			<td>Rp <?php echo $this->cart->format_number($cartitem['subtotal']); ?></td>
			<td class="hapus"><?php echo anchor('cart/hapusbarang/'. $cartitem['rowid'], "Delete");?></td>
		</tr>
		<?php endforeach; ?>
			
		<tr> 
		  <td><strong>Total Harga</strong><td></td><td></td></td>
		<td class="totalcart"><h2><b>Rp <?php echo $this->cart->format_number($this->cart->total());?></b></h2></td>
		<td class="hapussemua"><h2><b><?php echo anchor('cart/hapussemua/', "HAPUS SEMUA DATA");?></b></h2></td>
		
		</tr>
		
		
		
		
</table>
</div>


<form name="cart_form" method="post" action="<?php echo $form_action2; ?>">
	
	<p><label for="pelanggan">Pelanggan:</label>
        
		<?php 
		echo form_dropdown('id_pelanggan', $options_pelanggan, isset($default['id_pelanggan']) ? $default['id_pelanggan'] : ''); ?>
		<br><br>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="commit" id="commit" value=" Commit Terjual " />
		
	</p>
</form>

<?php endif; ?>

</body>

</html>
