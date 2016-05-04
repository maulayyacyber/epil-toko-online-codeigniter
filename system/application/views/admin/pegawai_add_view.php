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
<div class="tab-content default-tab" id="tab1">
	<?=form_open("admin/pegawai/add_pegawai/")?>
		<center>
		<table id="tabel1" width="800px">
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="75px" name="NamaPegawai" value="<?=set_value("NamaPegawai")?>"><?php echo form_error('NamaPegawai'); ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?php 	echo form_radio('JenisKelamin', 'L',TRUE,'set_value("JenisKelamin")');
							echo "Laki-Laki";
							echo form_radio('JenisKelamin', 'P',FALSE,'set_value("JenisKelamin")');
							echo "Perempuan";
					?>
				</td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="75px" name="TempatLahir" value="<?=set_value("TempatLahir")?>"><?php echo form_error('TempatLahir'); ?></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><input  type="text" size="75px" name="TanggalLahir" class='text-input medium-input2 datepicker' value="<?=set_value("TanggalLahir")?>"><?php echo form_error('TanggalLahir'); ?></td>
			</tr>
			<tr>
				<td style="vertical-align:top">Alamat</td>
				<td style="vertical-align:top">:</td>
				<td>
				<textarea id="AlmtPegawai" name="AlmtPegawai" width="75px" cols="3" rows="3" value="<?=set_value("AlmtPegawai")?>"></textarea>
				</td>
			</tr>
			<tr>
				<td>No Telepon</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="75px" name="NoTelepon" value="<?=set_value("NoTelepon")?>"><?php echo form_error('NoTelepon'); ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="75px" name="Email" value="<?=set_value("Email")?>"><?php echo form_error('Email'); ?></td>
			</tr>
			<tr>
				<td>Tanggal Masuk</td>
				<td>:</td>
				<td><input type="text" size="35px" name="TanggalMasuk" class='text-input medium-input2 datepicker' value="<?=set_value("TanggalMasuk")?>"><?php echo form_error('TanggalMasuk'); ?></td>
			</tr>
			<tr>
				<td>Level</td>
				<td>:</td>
				<td>
				<?php
						$data=array(
							'Admin'=>'Admin',
							'Pegawai'=>'Pegawai',
							'Manajer'=>'Manajer'
							);
						echo form_dropdown('Level',$data,'',"style='width:150px'"); 
				?>
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="75px" name="Username" value="<?=set_value("Username")?>"><?php echo form_error('Username'); ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="password" size="75px" name="Password" value=""><?php echo form_error('Password'); ?></td>
			</tr>
			<tr>
				<td>Konfirmasi Password</td>
				<td>:</td>
					<td><input class="text-input medium-input2" type="password" size="75px" name="Kota" value=""><?php echo form_error('Password'); ?></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align:center"><input type="button" class="button" style="width:80px" name="button" value="Batal" onClick="javascript:history.back()">&nbsp; 
				<input type="submit" class="button" style="width:80px" name="submit" value="Tambah Data"></td>
			</tr>
		</table>
	</center>
</div>