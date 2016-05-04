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
		
		$(".edit_produk").live("click",function(){
			var status = $("#status_edit").html();
			if(status == "0"){
				var kode_produk = $(this).attr('rel');
				$("#temp").html($("#pembelian_"+kode_produk).html());
				var kode_pembelian =  $("#kode_pembelian").html();
				var data = "KodeProduk="+kode_produk+"&KodePembelian="+kode_pembelian;
				$.ajax({
					data:data,
					type:"POST",
					url:'<?=site_url('admin/pembelian/respon_edit_detail_pembelian')?>',
					success:function(respon){
						$("#pembelian_"+kode_produk).html(respon);
						$("#status_edit").html("1");
					}
				});
			}
		});
		
		$(".cancel").live("click",function(){
			var kode_produk  = $(this).attr("rel");
			var temp = $("#temp").html();
			$("#pembelian_"+kode_produk).html(temp);
			$("#temp").html("");
			$("#status_edit").html("0");
		});
		
		
		
	});
</script>
<div id="temp" style="display:none"></div>
<div id="status_edit" style="display:none">0</div>
<div class="tab-content default-tab" id="tab1">
<?php
	if(isset($_SESSION['msg'])){
		echo	'
				<div class="notification success png_bg">
				<a href="#" class="close">
				<img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross_grey_small.png" title="Tutup pemberitahuan" alt="close">
				</a>
					<div>
						'.$_SESSION['msg'].'
					</div>
				</div>
				';
		unset($_SESSION['msg']);
	}
?>
<?php if($result_detail_pembelian){
foreach($result_detail_pembelian as $num_row => $row)
{?>
</br>
	<div class="header_info">INFORMASI PEMBELIAN</div>
	<div style="clear: both;"></div>
<div id="info">
	<div class="isi_info">Tanggal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : <?=substr($row->Tanggal,8,2).'-'.substr($row->Tanggal,5,2).'-'.substr($row->Tanggal,0,4);?></div>
	<div class="isi_info">Nama Pemasok &nbsp &nbsp  : <?=($row->NamaPemasok)?></div>
	<div class="isi_info">Kode Pembelian &nbsp &nbsp &nbsp &nbsp : <span id="kode_pembelian"><?=($row->KodePembelian)?></span></div>
	<div class="isi_info">Nama Pegawai &nbsp &nbsp &nbsp : <?=($row->NamaPegawai)?></div>
</div>
	<div class="header_info">INFORMASI PRODUK</div>
		<div style="clear: both;"></div>

<?php
};
}else{
}
?>

<?=form_open("admin/pembelian/edit_tambah_produk_detail_pembelian")?>
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
			<th width="18px"><center><?=$this->fungsi_bantuan->create_combobox('KodeProduk',$result_daftar_produk,"KodeProduk","KodeProduk",'',"id='daftar_kode_produk' style='width:165px' ")?></center></th>
			<th width="18px"><center><?=form_hidden("KodePembelian",$result_detail_pembelian[0]->KodePembelian)?><input type="text" size="20px" name="NamaProduk" rel="NamaProduk" id="NamaProduk" value=""></center></th>
			<th width="18px"><center><input type="text" size="20px" name="Berat" rel="Berat" id="Berat" value=""></center></th>
			<th width="18px"><center><input type="text" size="20px" name="BeratBeli" rel="BeratBeli" id="BeratBeli" value=""></center></th>
			<th width="18px"><center><input type="text" size="20px" name="HargaBeli" rel="HargaBeli" id="HargaBeli" value=""></center></th>
			<th width="18px"><input type="submit" class="button" style="width:100px" name="submit" value="Tambah Produk"></th>
		</tr>
		</thead>
	</table>
</form>

<?=form_open("admin/pembelian/edit_produk_detail_pembelian")?>
	<table width="100%">
<?php if($result_isi_detail_pembelian){
	foreach ($result_isi_detail_pembelian as $num_row => $row)
{?>
		<tbody>
			<tr id='pembelian_<?=$row->KodeProduk?>'>
				<td width="165px"><center><?=$row->KodeProduk;?></center></td>
				<td width="165px"><center><?=$row->NamaProduk;?></center></td>
				<td width="165px"><center><?=$row->Berat;?></center></td>
				<td width="155px" id='berat_beli'><center><?=$row->BeratBeli;?></center></td>
				<td width="155px" id='harga_beli'><center>$<?=$row->HargaBeli;?></center></td>
				<td>
				<center>
					<img class="edit_produk" src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" rel="<?=$row->KodeProduk?>" title="Edit" alt="Edit">
					<a href="<?=site_url("admin/pembelian/delete_detail_pembelian/".$result_detail_pembelian[0]->KodePembelian."/".$row->KodeProduk)?>"><img title="Hapus" class="delete_produk" src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete"></a>
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
	<div id="status_edit" style="display:none">0</div>
	<div id="temp" style="display:none">0</div>
</div>