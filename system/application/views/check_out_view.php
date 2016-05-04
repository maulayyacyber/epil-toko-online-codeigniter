<link rel="stylesheet" href="<?=base_url()?>system/application/js/colorbox/css/colorbox.css" type="text/css">
<script type="text/javascript" src="<?=base_url()?>system/application/js/colorbox/js/jquery.colorbox-min.js"></script>
<script>
	$(document).ready(function(){
		$('.info').colorbox();
	});
</script>
<div id="kategori_left"></div>
<div id="kategori_middle_left"><div style="padding: 9px 0px 0px 7px" class="lb">CHECK OUT</div><div style="padding: 9px 0px 0px 7px" class="lw">CHECK OUT</div></div>
	<div id="kategori_right"></div>
		<div style="clear: both;"></div>
	<div id="garis_left"></div>	
	<div id="isi_fitur">
	<div style="margin:40px 0px 40px 0px; font-size:15px; ">
<?php foreach($result_detail_penjualan as $num_row=>$row){
?>
		<table align="center" style="width:80%; font-size:15px; " border="0">
		<tr bgcolor="#e5f8f4"><td colspan='3'>ORDER INFORMATION</td></tr>
		<tr><td colspan='3'></td></tr>
		<tr>
			<td> &nbsp </td>
		</tr>
		<tr>
			<td width="100px">Customer</td>
			<td>:</td>
			<td><?=$row->NamaPelanggan;?></td>
		</tr>
		<tr>
			<td style="vertical-align:top">Address</td>
			<td style="vertical-align:top">:</td>
			<td><?=$row->AlmtPelanggan;?></td>
		</tr>
		<tr>
			<td>Order Date</td>
			<td>:</td>
			<td><?=substr($row->Tanggal,8,2).'-'.substr($row->Tanggal,5,2).'-'.substr($row->Tanggal,0,4);?></td>
		</tr>
		<tr>
			<td> &nbsp </td>
		</tr>
		<tr bgcolor="#e5f8f4"><td colspan='4'>PRODUCT INFORMATION</td></tr><tr>
		
		</table>
<?php }?>
		</br>
		<?php echo form_open('shoping_cart/check_out'); ?>
		<center>
		<table style="width:80%" border="0">
		<tr>
		  <th style="text-align:center">Quantity</th>
		  <th style="text-align:center">Product</th>
		  <th style="text-align:center">Unit Price</th>
		  <th style="text-align:center">Sub-Total</th>
		</tr>
		<tr>
			<td colspan="4"><div id="garis_batas_shoping_cart"></div></td>
		</tr>
		<?php $i = 1; ?>
		<?php foreach($this->cart->contents() as $items): ?>
			<tr>
			  <td><center><?php echo $items['qty']; ?></center></td>
			  <td><center><?php echo $items['name']; ?></center></td>
			  <td style="text-align:right"><center>$<?php echo $this->cart->format_number($items['price']); ?></center></td>
			  <td style="text-align:right"><center>$<?php echo $this->cart->format_number($items['subtotal']); ?></center></td>
			</tr>
			<tr>
				<td colspan="4"><div id="garis_batas_shoping_cart"></div></td>
			</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
		<tr bgcolor="#e5f8f4">
		  <td colspan="2"> </td>
		  <td class="right"><center><strong>Total</strong></center></td>
		  <td class="right"><center>$<?php echo $this->cart->format_number($this->cart->total()); ?></center></td>
		</tr>
		<tr>
		</tr>
		</table>
		</center>
		</form>
		</br>&nbsp
			<div id="cart2">
			The order is confirm when there is money transfer to our bank account PT. Mitra Semesta :</br>
				Citybank - 110011231123
			</br>
			For further information you may go to <a href="<?=site_url('statik/show/2')?>">Term and Condition</a>, 
			and if you have a trouble you may go to <a href="<?=site_url('statik/show/3')?>">Contact Us</a>
			or make chat with us in the online contact box.
			</div>
		
		</div>
	</div>