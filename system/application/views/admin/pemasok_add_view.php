<div class="tab-content default-tab" id="tab1">
<?php
	if(isset($_SESSION['msg'])){
		echo	'
				<div class="notification success png_bg">
				<a href="#" class="close">
				<img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close">
				</a>
					<div>
						'.$_SESSION['msg'].'
					</div>
				</div>	
				';
	}
?>
	<?=form_open("admin/pemasok/add_pemasok/")?>
		<center>
		<table id="tabel1" width="600px">
<!--			<tr>
				<td width="130px">Kode Pemasok</td>
				<td width="10px">:</td>
				<td width="260px"><input type="text" size="30px" name="KodePemasok" value="<?=set_value("KodePemasok")?>"><?php echo form_error('KodePemasok'); ?></td>
			</tr>
-->			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="NamaPemasok" value="<?=set_value("NamaPemasok")?>"><?php echo form_error('NamaPemasok'); ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?php 	echo form_radio('JenisKelamin', 'L',TRUE, 'set_value("JenisKelamin")');
							echo "Laki-Laki";
							echo form_radio('JenisKelamin', 'P',FALSE, 'set_value("JenisKelamin")');
							echo "Perempuan";
					?>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="AlmtPemasok" value="<?=set_value("AlmtPemasok")?>"><?php echo form_error('AlmtPemasok'); ?></td>
			</tr>
			<tr>
				<td>No Telepon</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="NoTelepon" value="<?=set_value("NoTelepon")?>"><?php echo form_error('NoTelepon'); ?></td>
			</tr>
			<tr>
				<td>Kredibilitas</td>
				<td>:</td>
				<td><?php 	echo form_radio('Kredibilitas', 'A',TRUE, 'set_value("Kredibilitas")');
							echo "A";
							echo form_radio('Kredibilitas', 'B',FALSE,'set_value("Kredibilitas")');
							echo "B";
					?>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="Email" value="<?=set_value("Email")?>"><?php echo form_error('Email'); ?></td>
			</tr>
			<tr>
				<td>Kota</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="Kota" value="<?=set_value("Kota")?>"><?php echo form_error('Kota'); ?></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align:center"><input type="button" class="button" style="width:80px" name="button" value="Batal" onClick="javascript:history.back()">&nbsp; 
				<input type="submit" class="button" style="width:80px" name="submit" value="Tambah Data"></td>
			</tr>
		</table>
	</center>
</div>