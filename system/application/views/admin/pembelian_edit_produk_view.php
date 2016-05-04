<?=form_hidden("KodePembelian",$this->input->post('KodePembelian'))?>
<?php $row=$result_produk_detail_pembelian[0];?>
	<td width='190px'><center><?=$row->KodeProduk;?><?=form_hidden("KodeProduk",$row->KodeProduk)?></center></td>
	<td width='180px'><center><?=$row->NamaProduk;?></center></td>
	<td width='180px'><center><?=$row->Berat;?></center></td>
	<td width='170px' class='berat_beli'><center><input type="text" size="10px" name="BeratBeli" rel="BeratBeli" id="BeratBeli" value="<?=($row->BeratBeli)?>"></center></td>
	<td width='170px' class='harga_beli'><center><input type="text" size="10px" name="HargaBeli" rel="HargaBeli" id="HargaBeli" value="<?=($row->HargaBeli)?>"></center></td>
	<td width='120px'>
	<center>
	<input type="button" class="button cancel" style="width:50px" name="cancel" value="Batal" rel="<?=$row->KodeProduk?>">
	<input type="submit" class="button" style="width:40px" name="submit" value="Simpan">
	</center>
	</td>