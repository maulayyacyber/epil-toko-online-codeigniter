<link rel="stylesheet" href="<?=base_url()?>system/application/js/colorbox/css/colorbox.css" type="text/css">
<script type="text/javascript" src="<?=base_url()?>system/application/js/colorbox/js/jquery.colorbox-min.js"></script>
<script>
	$(document).ready(function(){
		$('.info').colorbox();
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
<?php
	if(isset($_SESSION['msg_account'])){
		echo '<div class="notification success png_bg">
					<a href="#" class="close"></a>
						<div>
							'.$_SESSION['msg_account'].'
						</div>
					</div>
			';
		unset($_SESSION['msg_account']);
	}?>
<table align='center' border='0' width='500px' style="font-family: Tahoma; font-size: 20px; color: #46484A; font-weight: 100; padding: 8px 0px 8px 5px">
<?php foreach($result_detail_pelanggan as $num_row=>$row){?>
	<tr bgcolor="#e5f8f4"><td colspan='3'>MAIN INFORMATION</td></tr><tr>
	<tr><td colspan='3'></td></tr>
	<tr><td colspan='3'></td></tr>
	<tr>
		<td width="110px">Full Name</td>
		<td>:</td>
		<td><?=($row->NamaPelanggan)?></td>
	</tr>
	<tr>
		<td>Sex</td>
		<td>:</td>
		<td><?=($row->JenisKelamin)?></td>
	</tr>
	<tr>
		<td>Place of Birth</td>
		<td>:</td>
		<td><?=($row->TempatLahir)?></td>
	</tr>
	<tr>
		<td>Date of Birth</td>
		<td>:</td>
		<td><?=substr($row->TanggalLahir,8,2).'-'.substr($row->TanggalLahir,5,2).'-'.substr($row->TanggalLahir,0,4);?></td>
	</tr>
	<tr><td colspan='3'></td></tr>
	<tr><td colspan='3'></td></tr>
	<tr bgcolor="#e5f8f4"><td colspan='3'>CONTACT INFORMATION</td></tr><tr>
	<tr><td colspan='3'></td></tr>
	<tr><td colspan='3'></td></tr>
	<tr>
		<td style="vertical-align:top">Address</td>
		<td style="vertical-align:top">:</td>
		<td><?=($row->AlmtPelanggan)?></td>
	</tr>
	<tr>
		<td>Phone</td>
		<td>:</td>
		<td><?=($row->NoTelepon)?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?=($row->Email)?></td>
	</tr>
	<tr>
		<td>City</td>
		<td>:</td>
		<td><?=($row->Kota)?></td>
	</tr>
	<tr>
		<td>Country</td>
		<td>:</td>
		<td><?=($row->Negara)?></td>
	</tr>
	<tr>
		<td>Postal Code</td>
		<td>:</td>
		<td><?=($row->KodePos)?></td>
	</tr>
	<tr><td colspan='3'></td></tr>
	<tr><td colspan='3'></td></tr>
	<tr bgcolor="#e5f8f4"><td colspan='3'>ADDITIONAL INFORMATION</td></tr><tr>
	<tr><td colspan='3'></td></tr>
	<tr><td colspan='3'></td></tr>
	<tr>
		<td>Register Record</td>
		<td>:</td>
		<td><?=substr($row->TanggalDaftar,8,2).'-'.substr($row->TanggalDaftar,5,2).'-'.substr($row->TanggalDaftar,0,4);?></td>
	</tr>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><?=($row->Username)?></td>
	</tr>
<?php }?>
</table>

<table align='center' border='0' width='300px'>
	<tr>
		<td>
			<div id="tombol" align="center">
			<a href="<?=site_url("home/")?>" class="cancel"><img src="<?=base_url()?>system/application/views/template_web/images/but_back.jpg" width="53" height="23" border="0" alt=""></a>
			<a href="<?=site_url("account/edit_account/".$row->KodePelanggan)?>"><img src="<?=base_url()?>system/application/views/template_web/images/but_edit.jpg" width="55" height="23" border="0" alt=""></a>
			</div>
		</td>
	</tr>
</table>
<div id="cart" align="right" ><a href="<?=site_url("account/change_password")?>" class="tetap">Change Password?</a></div>
</div>
<?php
		}
	?>
</div>