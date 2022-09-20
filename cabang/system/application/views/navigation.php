<ul id="menu_tab">	
	<li id="tab_barang"><?php echo anchor('barang', 'Barang');?></li>
	<li id="tab_karyawan"><?php echo anchor('karyawan', 'Karyawan');?></li>
	<li id="tab_pelanggan"><?php echo anchor('pelanggan', 'Pelanggan');?></li>
	<li id="tab_cart"><?php echo anchor('cart', 'Cart');?></li>
	<li id="tab_logout"><?php echo anchor('login/process_logout', 'Logout', array('onclick' => "return confirm('Anda yakin akan logout?')"));?></li>
</ul>