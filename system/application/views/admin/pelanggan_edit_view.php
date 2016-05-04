<div class="tab-content default-tab" id="tab1">
	<?php if($result_detail_pelanggan){
	foreach($result_detail_pelanggan as $num_row => $row)
	{?>
	<?=form_open("admin/pelanggan/edit_pelanggan/".$row->KodePelanggan)?>
		<center>
		<table id="tabel1" width="600px">
			<tr>
				<td width="130px">Nama Lengkap</td>
				<td width="10px">:</td>
				<td width="260px"><input class="text-input medium-input2" type="text" size="30px" name="NamaPelanggan" value="<?=($row->NamaPelanggan)?>"><?php echo form_error('NamaPelanggan'); ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
				<?php 	echo form_radio('JenisKelamin', 'Male',(($row->JenisKelamin=='Male')?TRUE:FALSE));
						echo "Laki-Laki";
						echo form_radio('JenisKelamin', 'Female', (($row->JenisKelamin=='Female')?TRUE:FALSE));
						echo "Perempuan";
				?>
				</td>
			</tr>
			<tr>
				<td>No Telepon</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="30px" name="NoTelepon" value="<?=($row->NoTelepon)?>"><?php echo form_error('NoTelepon'); ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="30px" name="Email" value="<?=($row->Email)?>"><?php echo form_error('Email'); ?></td>
			</tr>
			<tr>
				<td>Kota</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="30px" name="Kota" value="<?=($row->Kota)?>"><?php echo form_error('Kota'); ?></td>
			</tr>
			<tr>
				<td>Negara</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="30px" name="Negara" value="<?=($row->Negara)?>"><?php echo form_error('Negara'); ?></td>
			</tr>
			<tr>
				<td>Kode Pos</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="30px" name="KodePos" value="<?=($row->KodePos)?>"><?php echo form_error('KodePos'); ?></td>
			</tr>
			<tr>
				<td style="vertical-align:top">Alamat</td>
				<td style="vertical-align:top">:</td>
				<td>
				<textarea id="AlmtPelanggan" name="AlmtPelanggan" cols="1" rows="4"><?=($row->AlmtPelanggan)?><?php echo form_error('AlmtPelanggan'); ?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align:center"><input type="button" class="button" style="width:80px" name="button" value="Batal" onClick="javascript:history.back()">&nbsp; 
				<input type="submit" class="button" style="width:80px" name="submit" value="Simpan"></td>
			</tr>
		</table>
		</center>
	<?php
	};
	}else{
	}
	?>
	
</div>