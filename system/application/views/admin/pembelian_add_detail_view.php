<script type="text/javascript" src="<?=base_url()?>system/application/js/jquery-ui-1.8.11.custom.min.js"></script>		
<script type="text/javascript" src="<?=base_url()?>system/application/js/colorbox/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>system/application/js/colorbox/css/colorbox.css" type="text/css">		
<link rel="stylesheet" href="<?=base_url()?>system/application/css/ui-lightness/jquery-ui-1.8.11.custom.css">
<script>
	$(document).ready(function(){
		$("#daftar_kode_produk").change(function(){
			var kode_produk = $(this).val();
			$("#HargaBeli").val($("#daftar_harga tr#"+kode_produk+" .harga_produk").html());
			$("#NamaProduk").val($("#daftar_harga tr#"+kode_produk+" .nama_produk").html());
			$("#Berat").val($("#daftar_harga tr#"+kode_produk+" .berat_produk").html());
		})
		
		$(".edit_produk").click(function(){
			var kode_produk = $(this).attr('rel');
			var kode_pembelian = '<?=$result_kode_pembelian?>';
			var data = "KodeProduk="+kode_produk+"&KodePembelian="+kode_pembelian;
			$.ajax({
				data:data,
				type:"POST",
				url:'<?=site_url('admin/pembelian/respon_edit_detail_pembelian')?>',
				success:function(respon){
					$("#pembelian_"+kode_produk).html(respon);
				}
			});
		});
		
		$(".delete_produk").click(function(){
			var kode_produk = $(this).attr('rel');
			var kode_penjualan = $("#kode_penjualan").html();
			var data = "KodeProduk="+kode_produk+"&KodePenjualan="+kode_penjualan;
			$.ajax({
				data:data,
				type:"POST",
				url:'<?=site_url('admin/penjualan/delete_edit_detail_penjualan')?>',
				success:function(respon){
					$("#"+kode_produk).html(respon);
				}
			});
		});
	});
</script>
<div class="tab-content default-tab" id="tab1">
<?=form_open("admin/pembelian/tambah_produk_detail_pembelian/".$result_kode_pembelian)?>
	<table width="100%">
		<thead>
		<tr>
			<th width="18px"><center>Kode Produk</center></th>
			<th width="18px"><center>Nama Produk</center></th>
			<th width="18px"><center>Ukuran(Kg)</center></th>
			<th width="18px"><center>Berat Pembelian(Kg)</center></th>
			<th width="18px"><center>Harga($)</center></th>
			<th width="18px"></th>
		</tr>
		</thead>
		<thead>
		<tr>
			<th width="18px"><center><?=$this->fungsi_bantuan->create_combobox('daftar_kode_produk',$result_daftar_produk,"KodeProduk","KodeProduk",'',"id='daftar_kode_produk' style='width:165px' ")?></center></th>
			<th width="18px"><center><input type="text" size="20px" name="NamaProduk" rel="NamaProduk" id="NamaProduk" value=""></center></th>
			<th width="18px"><center><input type="text" size="20px" name="Berat" rel="Berat" id="Berat" value=""></center></th>
			<th width="18px"><center><input type="text" size="20px" name="BeratBeli" rel="BeratBeli" id="BeratBeli" value=""></center></th>
			<th width="18px"><center><input type="text" size="20px" name="HargaBeli" rel="HargaBeli" id="HargaBeli" value=""></center></th>
			<th width="18px"><input type="submit" class="button" style="width:100px" name="submit" value="Tambah Produk"></th>
		</tr>
		</thead>
	</table>
</form>
<?=form_open("admin/pembelian/edit_produk_detail_pembelian")?>
<?=form_hidden("KodePembelian",$result_kode_pembelian)?>
	<table width="100%">
		<tbody>
			<?php if($result_isi_detail_pembelian){
				foreach ($result_isi_detail_pembelian as $num_row => $row)
			{?>
			<tr id='pembelian_<?=$row->KodeProduk?>'>
				<td width="164px"><center><?=$row->KodeProduk;?></center></td>
				<td width="164px"><center><?=$row->NamaProduk;?></center></td>
				<td width="155px"><center><?=$row->Berat;?></center></td>
				<td width="150px" id='berat_beli'><center><?=$row->BeratBeli;?></center></td>
				<td width="155px" id='harga_beli'><center>$<?=$row->HargaBeli;?></center></td>
				<td>
				<center>
					<img class="edit_produk" src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" rel="<?=$row->KodeProduk?>" alt="Edit">
					<img class="delete_produk" src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" rel="<?=$row->KodeProduk?>" alt="Delete">
				</center>
				</td>
			</tr>
		</tbody>
			<?php
				};
			}
			?>
	</table>
</form>
</form>
	<div id="button">
		<a href='<?=site_url('admin/pembelian')?>' class='button' style="width:100px">OK</a>
	</div>
	<table id="daftar_harga" style="display:none">
		<?php foreach($result_daftar_produk as $row){
		?>
		<tr id='<?=$row->KodeProduk?>'>
			<td class='nama_produk'><?=$row->NamaProduk?></td>
			<td class='berat_produk'><?=$row->Berat?></td>
		</tr>
		<?php
			}
		?>
	</table>
	
</div>