<script type="text/javascript" src="<?=base_url()?>system/application/js/jquery-ui-1.8.11.custom.min.js"></script>		
<script type="text/javascript" src="<?=base_url()?>system/application/js/colorbox/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>system/application/js/colorbox/css/colorbox.css" type="text/css">		
<link rel="stylesheet" href="<?=base_url()?>system/application/css/ui-lightness/jquery-ui-1.8.11.custom.css">
<script>
	$(document).ready(function(){
		$( ".datepicker" ).datepicker({ 
			dateFormat: 'yy-mm-dd',
			showAnim:'slideDown',
			changeMonth: true,
			changeYear: true,
			yearRange:'-50:nn'
		});
	});
</script>
<div id="kategori_left"></div>
<div id="kategori_middle_left"><div style="padding: 9px 0px 0px 7px" class="lb">MEMBER ACCOUNT</div><div style="padding: 9px 0px 0px 7px" class="lw">MEMBER ACCOUNT</div></div>
	<div id="kategori_right"></div>
		<div style="clear: both;"></div>
	<div id="garis_left"></div>	
	<div id="isi_fitur">
<?=form_open("account/add_account")?>
<div id="cart">
</br>
<table align='center' border='0' width='400px' height='auto'>
<tr bgcolor="#e5f8f4"><td colspan='3'>MAIN INFORMATION</td></tr><tr>
<tr><td colspan='3'></td></tr>
<tr>
	<td width='150px'>Full Name</td>
	<td>:</td>
	<td><input type="text" size="30px" name="NamaPelanggan" value="<?=set_value("NamaPelanggan")?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('NamaPelanggan'); ?></td>
</tr>
<tr>
	<td>Sex</td>
	<td>:</td>
	<td><?php 	echo form_radio('JenisKelamin', 'Male',TRUE,'set_value("JenisKelamin")');
				echo "Male";
				echo form_radio('JenisKelamin', 'Female',FALSE,'set_value("JenisKelamin")');
				echo "Female";
		?>
	</td>
</tr>
<tr>
	<td>Place of Birth</td>
	<td>:</td>
	<td><input type="text" size="30px" name="TempatLahir" value="<?=set_value("TempatLahir")?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('TempatLahir'); ?></td>
</tr>
<tr>
	<td>Date of Birth</td>
	<td>:</td>
	<td><input type="text" readonly size="30px" name="TanggalLahir" class='datepicker' value="<?=set_value("TanggalLahir")?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('TanggalLahir'); ?></td>
</tr>
<tr><td colspan='3'></td></tr>
<tr bgcolor="#e5f8f4"><td colspan='3'>CONTACT INFORMATION</td></tr><tr>
<tr><td colspan='3'></td></tr>
<tr>
	<td>Address</td>
	<td>:</td>
	<td><input type="text" size="30px" name="AlmtPelanggan" value="<?=set_value("AlmtPelanggan")?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('AlmtPelanggan'); ?></td>
</tr>
<tr>
	<td>Phone</td>
	<td>:</td>
	<td><input type="text" size="30px" name="NoTelepon" value="<?=set_value("NoTelepon")?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('NoTelepon'); ?></td>
</tr>
<tr>
	<td>Email</td>
	<td>:</td>
	<td><input type="text" size="30px" name="Email" value="<?=set_value("Email")?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Email'); ?></td>
</tr>
<tr>
	<td>City</td>
	<td>:</td>
	<td><input type="text" size="30px" name="Kota" value="<?=set_value("Kota")?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Kota'); ?></td>
</tr>
<tr>
	<td>Country</td>
	<td>:</td>
	<td><input type="text" size="30px" name="Negara" value="<?=set_value("Negara")?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Negara'); ?></td>
</tr>
<tr>
	<td>Postal Code</td>
	<td>:</td>
	<td><input type="text" size="30px" name="KodePos" value="<?=set_value("KodePos")?>"></td>
</tr>
<tr><td colspan='3'></td></tr>
<tr bgcolor="#e5f8f4"><td colspan='3'>ADDITIONAL INFORMATION</td></tr><tr>
<tr><td colspan='3'></td></tr>
<tr>
	<td>Username</td>
	<td>:</td>
	<td><input type="text" size="30px" name="Username" value="<?=set_value("Username")?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Username'); ?></td>
</tr>
<tr>
	<td>Password</td>
	<td>:</td>
	<td><input type="password" size="30px" name="Password" value=""></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Password'); ?></td>
</tr>
<tr>
	<td>Confirm Password</td>
	<td>:</td>
	<td><input type="password" size="30px" name="ConfirmPassword"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('ConfirmPassword'); ?></td>
</tr>
</table>
</br>

<center>
<table border='0' width='100px'>
	<tr style="padding: 0px 0px 0px 400px">
		<td width="55px">
			<a href="<?=site_url("home/")?>" class="cancel"><img src="<?=base_url()?>system/application/views/template_web/images/but_cancel.jpg" width="53" height="23" border="0" alt=""></a>
		</td>
		<td>
			<input type="submit" name="submit" class="submit" value="">
		</td>
	</tr>
</table>
</center>

</div>
</div>