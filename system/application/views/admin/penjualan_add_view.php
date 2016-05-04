<div class="tab-content default-tab" id="tab1">
	<?=form_open("admin/penjualan/add_penjualan/")?>
		<center>
		<table id="tabel1" width="400px">
			<tr>
				<td>Kode Pelanggan</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="KodePelanggan" value="<?=set_value("KodePelanggan")?>"><?php echo form_error('KodePelanggan'); ?></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="Tanggal" value="<?=set_value("Tanggal")?>"><?php echo form_error('Tanggal'); ?></td>
			</tr>
			<tr>
				<td>Kode Pegawai</td>
				<td>:</td>
				<td><input type="text" size="30px" name="KodePegawai" value="<?=set_value("KodePegawai")?>"><?php echo form_error('KodePegawai'); ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td>
					<?php
					$data=array(
						'Pesan'=>'Pesan',
						'Beli'=>'Beli',
						'Batal'=>'Batal'
						);
					echo form_dropdown('Status',$data,''); 
					?>
				</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align:center">
					<input type="button" class="button" style="width:80px" name="button" value="Batal" onClick="javascript:history.back()">&nbsp; 
					<input type="submit" class="button" style="width:80px" name="submit" value="Tambah Data">
				</td>
			</tr>
		</table>
	</center>
</div>