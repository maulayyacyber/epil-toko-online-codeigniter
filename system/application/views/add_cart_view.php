<div id="modal_box">
<?php
	foreach($result_daftar_berat as $row){
?>
<?php
	}
?>
<script>
$(document).ready(function(){
	$.colorbox.resize();
	$("#tutup").click(function(){
		$.colorbox.close();
		return false;
	});
	
	$("#berat").change(function(){
		var harganya = $("#"+$(this).val().replace('.','')).html();
		$("#harga_hasil").html(harganya);
		$("#hidden_harga").val(harganya);
		$("#berat_pembelian").trigger("keyup");
	});
	
	$("#berat_pembelian").bind("keyup",function(){
		var hasil = parseFloat($(this).val()) * parseFloat($("#harga_hasil").html());
		if(isNaN(hasil)){
			hasil=0;
		}
		$("#total_pembelian b").html(hasil);
	});
	$("#submit").click(function(){
		var data = $("#form_add_cart").serialize();
		$.ajax({
			type:"POST",
			data:data,
			url:"<?=site_url("shoping_cart/add_cart")?>",
			success:function(html){
				$("#modal_box").html(html);
			}
		});
		return false;
	});
});
</script>
<div id="cart">
<div id="tabel_harga" style="display:none">
	<?php foreach($result_daftar_berat as $row){?>
		<span id="<?=str_replace('.','',$row->Berat)?>"><?=$row->HargaKiloan?></span>
	<?php }?>
</div>
	<form name="form_add_cart" id="form_add_cart"  method="POST">
	<table align='center' border='0' height='200px' width='300px'>
	<?php 
	$row = $result_detail_produk[0];?>
		<div class="">
		<tr>
			<td width="140px">Product Code</td>
			<td>:</td>
			<td><?=($row->KodeProduk)?></td>
		</tr>
		</div>
		<tr>
			<td>Product Name</td>
			<td>:</td>
			<td><?=($row->NamaProduk)?></td>
		</tr>
		<tr>
			<td>Grade</td>
			<td>:</td>
			<td><?=($row->Kualitas)?></td>
		</tr>
		<tr>
			<td>Weight (Kg)</td>
			<td>:</td>
			<td><?=$this->fungsi_bantuan->create_combobox('berat',$result_daftar_berat,"Berat","Berat","","id='berat' style='width:120px' ")?></td>
		</tr>
		<tr>
			<td>Price (/Kg)</td>
			<td>:</td>
			<td id="harga_hasil">USD &nbsp <?=($row->HargaKiloan)?></td>
		</tr>
		<tr>
			<td>Amount (Kg)</td>
			<td>:</td>
			<td><input type="text" size="15px" name="berat_pembelian" id="berat_pembelian"></td>
		</tr>
		
		<tr>
			<td>Total Payment</td>
			<td>:</td>
			<td id="total_pembelian">USD &nbsp <b></b></td>
		</tr>
		<tr>
			<td colspan="3">*Amount must be input in an even number.</td>
		</tr>
	</table>
	<input type='hidden' name='kode_produk' value='<?=$row->KodeProduk?>'>
	<input type='hidden' name='nama' value='<?=$row->NamaProduk?>'>
	<input type='hidden' name='harga' id="hidden_harga" value='<?=$row->HargaKiloan?>'>
	<table align='center' border='0' height='20px' width='300px'>
	</table>
</div>
</div>
	<table align='center' border='0' width='300px'>
		<tr>
			<td>
				<div id="tombol" align="center">
				<a href="<?=site_url("produk/")?>" id="tutup"><img src="<?=base_url()?>system/application/views/template_web/images/but_cancel.jpg" width="53" height="23" border="0" alt=""></a>
				<a href="<?=site_url("shoping_cart/get_cart/".$row->KodeProduk)?>" id="submit" class='add_cart'><img src="<?=base_url()?>system/application/views/template_web/images/but_buy.gif" width="55" height="23" border="0" alt=""></a>
				</div>
			</td>
		</tr>
	</table>
	</form>