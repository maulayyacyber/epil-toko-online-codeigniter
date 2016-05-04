<script type="text/javascript" src="<?=base_url()?>system/application/js/jquery-ui-1.8.11.custom.min.js"></script>		
<link rel="stylesheet" href="<?=base_url()?>system/application/css/ui-lightness/jquery-ui-1.8.11.custom.css">
<link rel="stylesheet" href="<?=base_url()?>system/application/js/colorbox/css/colorbox.css" type="text/css">
<script type="text/javascript" src="<?=base_url()?>system/application/js/colorbox/js/jquery.colorbox-min.js"></script>
<script>
	$(document).ready(function(){
		$( ".datepicker" ).datepicker({
			dateFormat: 'yy-mm-dd',
			showAnim:'slideDown',
			changeMonth: true,
			changeYear: true,
			yearRange:'-50:nn'
		});
		$('.info').colorbox();
	});
</script>
<div id="kategori_left"></div>
<div id="kategori_middle_left"><div style="padding: 9px 0px 0px 7px" class="lb">CHANGE PASSWORD</div><div style="padding: 9px 0px 0px 7px" class="lw">CHANGE PASSWORD</div></div>
	<div id="kategori_right"></div>
		<div style="clear: both;"></div>
	<div id="garis_left"></div>	
	<div id="isi_fitur">
<?php
	if(!isset($_SESSION['kode_user'])){
		}else{
	?>
<div id="cart">
<?=form_open("account/change_password")?>
<table align='center' border='0' width='350px'></br>

<tr>
	<td width='120px'>Old Password</td>
	<td>:</td>
	<td><input type="password" size="30px" name="Password_lama"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Password_lama'); ?></td>
</tr>
<tr>
	<td>New Password</td>
	<td>:</td>
	<td><input type="password" size="30px" name="Password_baru"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Password_baru'); ?></td>
</tr>
<tr>
	<td>Confirm Password</td>
	<td>:</td>
	<td><input type="password" size="30px" name="Password_konfirm"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><?php echo form_error('Password_konfirm'); ?></td>
</tr>
</table>
</br>
<center>
<table border='0' width='50px'>
	<tr style="padding: 0px 0px 0px 300px">
		<td width="55px">
			<a href="<?=site_url("account/")?>"><img src="<?=base_url()?>system/application/views/template_web/images/but_cancel.jpg" width="53" height="23" border="0" alt=""></a>
		</td>
		<td>
			<input type="submit" name="submit" class="edit" value="">
		</td>
	</tr>
</table>
</center>
</div>
<?php
		}
	?>
</div>