<div class="tab-content default-tab" id="tab1">
	<?=form_open_multipart("admin/produk/add_produk/")?>
		</br>
		<center>
		<table id="tabel1" width="600px">
			<tr>
				<td width="130px">Kode Produk</td>
				<td width="10px">:</td>
				<td width="260px"><input type="text" size="30px" name="KodeProduk" class="text-input medium-input" value="<?=set_value("KodeProduk")?>"><?php echo form_error('KodeProduk'); ?></td>
			</tr>
			<tr>
				<td>Nama Produk</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="NamaProduk" value="<?=set_value("NamaProduk")?>"><?php echo form_error('NamaProduk'); ?></td>
			</tr>
			<tr>
				<td>Kualitas</td>
				<td>:</td>
				<td><?php 	//DIBENARKAN
							echo form_radio('Kualitas', 'A',TRUE,'set_value("Kualitas")');
							echo "A"; 
							echo form_radio('Kualitas', 'B',FALSE,'set_value("Kualitas")');
							echo "B";
					echo form_error("Kualitas");
					?>
				</td>
			</tr>
			<tr>
				<td>Ukuran (Kg)</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="Berat" value="<?=set_value("Berat")?>"><?php echo form_error('Berat'); ?></td>
			</tr>
			<tr>
				<td>Harga per Kilo ($)</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="HargaKiloan" value="<?=set_value("HargaKiloan")?>"><?php echo form_error('HargaKiloan'); ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>* Harga bulat ditulis tanpa tanda koma atau titik</td>
			</tr>
			<tr>
				<td>Foto</td>
				<td>:</td>
				<td><input type="file" name="userfile" id='userfile' size="43px"><?php echo form_error('userfile'); ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>* Ukuran foto maksimal 1Mb dan jenis : gif, jpg, png</td>
			</tr>
			<tr>
				<td colspan="3" style="text-align:center"><input type="button"  style="width:100px"  class="button" name="button" value="Batal" onClick="javascript:history.back()">&nbsp; 
				<input type="submit" class="button" style="width:100px" name="submit" value="Tambah Data"></td>
			</tr>
		</table>
	</center>
</div>