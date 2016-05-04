<div id="kategori_left"></div>
<div id="kategori_middle_left"><div style="padding: 9px 0px 0px 7px" class="lb">TRANSACTION DETAIL</div><div style="padding: 9px 0px 0px 7px" class="lw">TRANSACTION DETAIL</div></div>
	<div id="kategori_right"></div>
		<div style="clear: both;"></div>
	<div id="garis_left"></div>	
	<div id="isi_fitur">
<?php
	if(!isset($_SESSION['kode_user'])){
		}else{
	?>
<center>
<div id="cart">
<?php foreach($result_detail_penjualan as $num_row=>$row){
		$kode_penjualan = $row->KodePenjualan;
?>
<table align='center' border='0' width='500px' style="font-family: Tahoma; font-size: 20px; color: #46484A; font-weight: 100; padding: 0px 0px 0px 0px">
	<tr bgcolor="#e5f8f4"><td colspan='3'>MAIN INFORMATION</td></tr><tr>
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
		<td width="40px">Transaction Code</td>
		<td width="10px"><center>:</center></td>
		<td width="110px"><?=$row->KodePenjualan;?></td>
	</tr>
	<tr>
		<td width="40px">Transaction Date</td>
		<td width="10px"><center>:</center></td>
		<td width="105px"><?=substr($row->Tanggal,8,2).'-'.substr($row->Tanggal,5,2).'-'.substr($row->Tanggal,0,4);?></td>
	</tr>
	<tr>
		<td width="40px">Total Price</td>
		<td width="10px"><center>:</center></td>
		<td width="105px">USD &nbsp <?=$row->TotalHarga;?></td>
	</tr>
	<tr>
		<td width="40px">Transaction Status</td>
		<td width="10px"><center>:</center></td>
		<td width="105px">
		<?php if($row->Status=='Pesan'){
			echo 'Ordered';
		}else{
			if($row->Status=='Beli'){
				echo 'Delivered';
			}else{
				echo 'Canceled';
			}
		}
		?>
		</td>
	</tr>
	<tr><td colspan='3'></td></tr>
	<tr><td colspan='3'></td></tr>
	<tr bgcolor="#e5f8f4"><td colspan='3'>PRODUCT INFORMATION</td></tr><tr>
<?php }?>
</table>

<center>
<div id="detail_history">
	<div id="header_detail_history"><div style="padding: 9px 0px 0px 7px" class="lw">Product</div></div>
	<div id="header_detail_history"><div style="padding: 9px 0px 0px 7px" class="lw">Size(Kg)</div></div>
	<div id="header_detail_history"><div style="padding: 9px 0px 0px 7px" class="lw">Amount(Kg)</div></div>
	<div id="header_detail_history"><div style="padding: 9px 0px 0px 7px" class="lw">Price</div></div>
</div>
</center>
<?php foreach($result_isi_detail_penjualan as $num_row=>$row){?>
<table align='center' border='0' width='500px' style="font-family: Tahoma; font-size: 20px; color: #46484A; font-weight: 100; padding: 0px 0px 0px 0px">
	<tbody>
		<tr>
			<td width="135px"><center><?=$row->NamaProduk;?></center></td>
			<td width="125px"><center><?=$row->Berat;?></center></td>
			<td width="120px"><center><?=$row->BeratJual;?> &nbsp  Kg</center></td>
			<td width="120px"><center>USD &nbsp <?=$row->HargaJual;?></center></td>	
		</tr>
		<tr>
			<td colspan="4">
				<div id="garis_batas_shoping_cart"></div>
			</td>
		</tr>
	</tbody>
<?php }?>
		<tr><td colspan='3'></td></tr>
		<tr bgcolor="#e5f8f4" align="center">
			<td colspan='4'>
			</td>
		</tr>
		<tr></tr>
		<tr>
			<td colspan='4' align="center">
			<a href="<?=site_url("history")?>" class="cancel"><img src="<?=base_url()?>system/application/views/template_web/images/but_back.jpg" width="53" height="23" border="0" alt=""></a>
			<a href="<?=site_url("history/cetak_detail_history/".$kode_penjualan)?>" target="_blank"><img src="<?=base_url()?>system/application/views/template_web/images/but_print.jpg" width="55" height="23" border="0" alt=""></a>
			</td>
		</tr>
		<tr bgcolor="#e5f8f4" align="center">
			<td colspan='4'>
			</td>
		</tr>
		<tr><td colspan='3'></td></tr>
</table>
</div>
<center>
<?php
		}
	?>
</div>