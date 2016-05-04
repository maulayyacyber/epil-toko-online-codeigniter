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

<?php
	if(!isset($_SESSION['kode_user'])){
		}else{
	?>
<div id="cart">
<?=form_open("account/edit_account")?>
<table align='center' border='0'  width='500px'>
<?php foreach($result_detail_pelanggan as $num_row=>$row){?>

<tr bgcolor="#e5f8f4"><td colspan='3'>MAIN INFORMATION</td></tr><tr>
<tr><td colspan='3'></td></tr>
<tr>
	<td width="120px">Full Name</td>
	<td>:</td>
	<td><input type="text" size="55px" name="NamaPelanggan" value="<?=($row->NamaPelanggan)?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('NamaPelanggan'); ?></td>
</tr>
<tr>
	<td>Sex</td>
	<td>:</td>
	<td><?php 	echo form_radio('JenisKelamin', 'Male',(($row->JenisKelamin=='Male')?TRUE:FALSE));
				echo "Male";
				echo form_radio('JenisKelamin', 'Female', ($row->JenisKelamin=='Female')?TRUE:FALSE);
				echo "Female";
		?></td>
</tr>
<tr>
	<td>Place of Birth</td>
	<td>:</td>
	<td><input type="text" size="55px" name="TempatLahir" value="<?=($row->TempatLahir)?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('TempatLahir'); ?></td>
</tr>
<tr>
	<td>Date of Birth</td>
	<td>:</td>
	<td><input type="text" size="55px" name="TanggalLahir" class='datepicker' value="<?=($row->TanggalLahir)?>"></td>
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
	<td><textarea id="AlmtPelanggan" name="AlmtPelanggan" cols="52" rows="3" ><?=($row->AlmtPelanggan)?></textarea></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('AlmtPelanggan'); ?></td>
</tr>
<tr>
	<td>Phone</td>
	<td>:</td>
	<td><input type="text" size="55px" name="NoTelepon" value="<?=($row->NoTelepon)?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('NoTelepon'); ?></td>
</tr>
<tr>
	<td>Email</td>
	<td>:</td>
	<td><input type="text" size="55px" name="Email" value="<?=($row->Email)?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Email'); ?></td>
</tr>
<tr>
	<td>City</td>
	<td>:</td>
	<td><input type="text" size="55px" name="Kota" value="<?=($row->Kota)?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Kota'); ?></td>
</tr>
<tr>
	<td>Country</td>
	<td>:</td>
	<td><input type="text" size="55px" name="Negara" value="<?=($row->Negara)?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Negara'); ?></td>
</tr>
<tr>
	<td>Postal Code</td>
	<td>:</td>
	<td><input type="text" size="55px" name="KodePos" value="<?=($row->KodePos)?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('KodePos'); ?></td>
</tr>
<tr><td colspan='3'></td></tr>
<tr bgcolor="#e5f8f4"><td colspan='3'>ADDITIONAL INFORMATION</td></tr><tr>
<tr><td colspan='3'></td></tr>
	
<tr>
	<td>Username</td>
	<td>:</td>
	<td><input type="text" size="55px" name="Username" value="<?=($row->Username)?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Username'); ?></td>
</tr>
<?php }?>
</table>

<center>
<table border='0' width='100px'>
	<tr style="padding: 0px 0px 0px 400px">
		<td width="55px">
			<a href="<?=site_url("account/")?>" class="cancel"><img src="<?=base_url()?>system/application/views/template_web/images/but_cancel.jpg" width="53" height="23" border="0" alt=""></a>
		</td>
		<td>
			<input type="submit" name="submit" class="save" value="">
		</td>
	</tr>
</table>
</center>

</div>
<?php
		}
	?>
</div>