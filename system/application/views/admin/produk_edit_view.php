<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

	<?php if($result_detail_produk){
	foreach($result_detail_produk as $num_row => $row)
	{?>
	<?=form_open_multipart("admin/produk/edit_produk/".$row->KodeProduk)?>
		</br>
		<center>
		<table id="tabel1" width="600px">
			<tr>
				<td width="130px">Kode Produk</td>
				<td width="10px">:</td>
				<td width="260px"><input class="text-input medium-input" type="text" size="30px" name="KodeProduk" value="<?=($row->KodeProduk)?>"><?php echo form_error('KodeProduk'); ?></td>
			</tr>
			<tr>
				<td>Nama Produk</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="NamaProduk" value="<?=($row->NamaProduk)?>"><?php echo form_error('NamaProduk'); ?></td>
			</tr>
			<tr>
				<td>Kualitas</td>
				<td>:</td>
				<td>
				<?php	echo form_radio('Kualitas', 'A',(($row->Kualitas=='A')?TRUE:FALSE));
						echo "A";
						echo form_radio('Kualitas', 'B',(($row->Kualitas=='B')?TRUE:FALSE));
						echo "B";
					?>
				</td>
			</tr>
			<tr>
				<td>Ukuran (Kg)</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="Berat" value="<?=($row->Berat)?>"><?php echo form_error('Berat'); ?></td>
			</tr>
			<tr>
				<td>Harga per Kilo ($)</td>
				<td>:</td>
				<td><input class="text-input medium-input" type="text" size="30px" name="HargaKiloan" value="<?=($row->HargaKiloan)?>"><?php echo form_error('HargaKiloan'); ?>
				*Harga ditulis tanpa tanda koma atau titik</td>
			</tr>
			<tr>
				<td style="vertical-align:top">Cari Foto</td>
				<td style="vertical-align:top">:</td>
				<td style="vertical-align:top">
				<img src="<?=base_url()?>./foto_ikan/<?=($row->NamaFoto!="")?$row->NamaFoto:'default.jpg'?>" width="90" height="90" border="0" alt="">
				<input style="vertical-align:top; align:right" type="file" name="userfile" size="0" value="<?=($row->NamaFoto)?>">
				 **Ukuran maksimal 1Mb dan jenis foto : gif, jpg, png
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