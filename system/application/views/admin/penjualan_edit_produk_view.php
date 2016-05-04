<?=form_hidden("KodePenjualan",$this->input->post('KodePenjualan'))?>
<?php $row=$result_produk_detail_penjualan[0];?>
	<td width='225px'><center><?=$row->KodeProduk;?><?=form_hidden("KodeProduk",$row->KodeProduk)?></center></td>
	<td width='230px'><center><?=$row->NamaProduk;?></center></td>
	<td width='230px'><center><?=$row->Berat;?></center></td>
	<td width='170px' class='berat_jual'><center><input type="text" size="10px" name="BeratJual" rel="BeratJual" id="BeratJual" value="<?=($row->BeratJual)?>"></center></td>
	<td width='180px' class='harga_jual'><center><input type="text" size="10px" name="HargaJual" rel="HargaJual" id="HargaJual" value="<?=($row->HargaJual)?>"></center></td>
	<td>
	<center>
	<input type="button" class="button cancel" style="width:50px" name="cancel" value="Batal" rel="<?=$row->KodeProduk?>">
	<input type="submit" class="button" style="width:40px" name="submit" value="Simpan">
	</center>
	</td>