<div class="tab-content default-tab" id="tab1">
	<?php if($result_detail_pemasok){
	foreach($result_detail_pemasok as $num_row => $row)
	{?>
	<?=form_open("admin/pemasok/edit_pemasok/".$row->KodePemasok)?>
		<center>
		<table id="tabel1" width="600px">
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="NamaPemasok" value="<?=($row->NamaPemasok)?>"><?php echo form_error('NamaPemasok'); ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?php 	echo form_radio('JenisKelamin', 'L',(($row->JenisKelamin=='L')?TRUE:FALSE));
							echo "Laki-Laki";
							echo form_radio('JenisKelamin', 'P',(($row->JenisKelamin=='P')?TRUE:FALSE));
							echo "Perempuan";
					?>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="AlmtPemasok" value="<?=($row->AlmtPemasok)?>"><?php echo form_error('AlmtPemasok'); ?></td>
			</tr>
			<tr>
				<td>No Telepon</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="NoTelepon" value="<?=($row->NoTelepon)?>"><?php echo form_error('NoTelepon'); ?></td>
			</tr>
			<tr>
				<td>Kredibilitas</td>
				<td>:</td>
				<td>
				<?php	echo form_radio('Kredibilitas', 'A',(($row->Kredibilitas=='A')?TRUE:FALSE));
						echo "A";
						echo form_radio('Kredibilitas', 'B',(($row->Kredibilitas=='B')?TRUE:FALSE));
						echo "B";
					?>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="Email" value="<?=($row->Email)?>"><?php echo form_error('Email'); ?></td>
			</tr>
			<tr>
				<td>Kota</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="Kota" value="<?=($row->Kota)?>"><?php echo form_error('Kota'); ?></td>
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