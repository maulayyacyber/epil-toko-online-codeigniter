<table border="1" align='center' width='90%' style="padding: 50px 50px 50px 50px; margin: 50px 50px 50px 50px">
<tr>
<td>
<?php
	if(!isset($_SESSION['kode_user'])){
		}else{
	?>
<center>
<?php foreach($result_detail_penjualan as $num_row=>$row){
		$kode_penjualan = $row->KodePenjualan;
?>
<table align='center' border='0' width='90%' style="font-family: Tahoma; font-size: 18px; color: #46484A; font-weight: 100; padding: 0px 0px 0px 0px; margin: 10px 10px 10px 10px">
	<tr bgcolor="#e5f8f4" border="1" align="left"><th colspan='3'>MAIN INFORMATION</th></tr><tr>
	<tr><td colspan='3'></td></tr>
	<tr><td colspan='3'></td></tr>
	<tr>
		<td width="25%">Customer</td>
		<td width="10px"><center>:</center></td>
		<td width="110px"><?=$row->NamaPelanggan;?></td>
	</tr>
	<tr>
		<td width="25%" style="vertical-align:top">Address</td>
		<td width="10px" style="vertical-align:top"><center>:</center></td>
		<td width="105px"><?=$row->AlmtPelanggan;?></td>
	</tr>
	<tr>
		<td width="25%">Transaction</td>
		<td width="10px"><center>:</center></td>
		<td width="110px"><?=$row->KodePenjualan;?></td>
	</tr>
	<tr>
		<td width="25%">Date</td>
		<td width="10px"><center>:</center></td>
		<td width="105px"><?=substr($row->Tanggal,8,2).'-'.substr($row->Tanggal,5,2).'-'.substr($row->Tanggal,0,4);?></td>
	</tr>
	<tr>
		<td width="25%">Total Price</td>
		<td width="10px"><center>:</center></td>
		<td width="105px">USD &nbsp <?=$row->TotalHarga;?></td>
	</tr>
	<tr>
		<td width="25%">Status</td>
		<td width="10px"><center>:</center></td>
		<td width="105px"><?=$row->Status;?></td>
	</tr>
	<tr><th colspan='3'> &nbsp </th></tr>
	<tr bgcolor="#e5f8f4" border="1" align="left"><th colspan='3'>PRODUCT INFORMATION</th></tr>
<?php }?>
</table>
<table align='center' border='0' width='90%' style="font-family: Tahoma; font-size: 20px; color: #46484A; font-weight: 100; padding: 0px 0px 0px 0px">
	<tbody>
		<tr>
			<th width="165px"><center>Products</center></th>
			<th width="165px"><center>Size</center></th>
			<th width="155px"><center>Amount</center></th>
			<th width="155px"><center>Price</center></th>	
		</tr>
		<tr><th colspan='4'> &nbsp </th></tr>
<?php foreach($result_isi_detail_penjualan as $num_row=>$row){?>
		<tr>
			<td width="165px"><center><?=$row->NamaProduk;?></center></td>
			<td width="165px"><center><?=$row->Berat;?></center></td>
			<td width="155px"><center><?=$row->BeratJual;?>&nbsp Kg</center></td>
			<td width="155px">USD &nbsp <center><?=$row->HargaJual;?></center></td>	
		</tr>
		<tr>
			<td colspan="4">
				<div id="garis_batas_shoping_cart"></div>
			</td>
		</tr>
<?php }?>
		<tr><td colspan='3'></td></tr>
		<tr bgcolor="#e5f8f4" align="center">
			<td colspan='4'>
			</td>
		</tr>
	</tbody>
</table>
</div>
<center>
<?php
		}
	?>

</td>
</tr>
</table>
