<script type="text/javascript" src="<?=base_url()?>system/application/js/jquery-ui-1.8.11.custom.min.js"></script>		
<script type="text/javascript" src="<?=base_url()?>system/application/js/colorbox/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>system/application/js/colorbox/css/colorbox.css" type="text/css">		
<link rel="stylesheet" href="<?=base_url()?>system/application/css/ui-lightness/jquery-ui-1.8.11.custom.css">
<script>
	$(document).ready(function(){
		
		$("#daftar_kode_produk").change(function(){
			var kode_produk = $(this).val();
			$("#HargaJual").val($("#daftar_harga tr#"+kode_produk+" .harga_produk").html());
			$("#NamaProduk").val($("#daftar_harga tr#"+kode_produk+" .nama_produk").html());
			$("#Berat").val($("#daftar_harga tr#"+kode_produk+" .berat_produk").html());
		})
		
		$(".edit_produk").click(function(){
			var status = $("#status_edit").html();
			if(status == "0"){
				var kode_produk = $(this).attr('rel');
				var kode_penjualan = $("#kode_penjualan").html();
				var data = "KodeProduk="+kode_produk+"&KodePenjualan="+kode_penjualan;
				$("#temp").html($("#"+kode_produk).html());
				$.ajax({
					data:data,
					type:"POST",
					url:'<?=site_url('admin/penjualan/respon_edit_detail_penjualan')?>',
					success:function(respon){
						$("#"+kode_produk).html(respon);
						$("#status_edit").html("1");
					}
				});
			};
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
		
		$(".cancel").live("click",function(){
			
			var kode_produk  = $(this).attr("rel");
			var temp = $("#temp").html();
			$("#"+kode_produk).html(temp);
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
<?php 
if($result_detail_penjualan){
	foreach($result_detail_penjualan as $num_row => $row){
?>
</br>
	<div class="header_info">INFORMASI PENJUALAN</div>
	<div style="clear: both;"></div>
<div id="info">
	<div class="isi_info">Tanggal &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : <?=substr($row->Tanggal,8,2).'-'.substr($row->Tanggal,5,2).'-'.substr($row->Tanggal,0,4);?></div>
	<div class="isi_info">Nama Pegawai &nbsp &nbsp &nbsp &nbsp : <?=($row->NamaPegawai)?></div>
	<div class="isi_info">Kode Penjualan &nbsp &nbsp &nbsp : <span id="kode_penjualan"><?=($row->KodePenjualan)?></span></div>
	<div class="isi_info">Nama Pelanggan &nbsp &nbsp : <?=($row->NamaPelanggan)?></div>
	<div class="isi_info">Status &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : <?=($row->Status)?></div>
	<div class="isi_info">Alamat Pengiriman &nbsp : <?=($row->AlmtPelanggan)?></div>
</div>
	<div class="header_info">INFORMASI PRODUK</div>
		<div style="clear: both;"></div>
<?php
	};
}
?>			
	
		<?=form_open("admin/penjualan/tambah_produk_detail_penjualan")?>
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
				<th width="18px"><center><?=form_hidden("KodePenjualan",$result_detail_penjualan[0]->KodePenjualan)?><input type="text" size="20px" name="NamaProduk" rel="NamaProduk" id="NamaProduk" value=""></center></th>
				<th width="18px"><center><input type="text" size="20px" name="Berat" rel="Berat" id="Berat" value=""></center></th>
				<th width="18px"><center><input type="text" size="20px" name="BeratJual" rel="BeratJual" id="BeratJual" value=""></center></th>
				<th width="18px"><center><input type="text" size="20px" name="HargaJual" rel="HargaJual" id="HargaJual" value=""></center></th>
				<th width="18px"><center><input type="submit" class="button" style="width:100px" name="submit" value="Tambah Produk"></center></th>
			</tr>
			</thead>
		</table>
		</form>
				
		<?=form_open("admin/penjualan/edit_produk_detail_penjualan")?>
		<?=form_hidden("KodePenjualan",$result_detail_penjualan[0]->KodePenjualan)?>
		<table width="100%">
			<tbody>
			<?php if($result_isi_detail_penjualan){
				foreach ($result_isi_detail_penjualan as $num_row => $row)
				{?>
			<tr id='<?=$row->KodeProduk?>'>
				<td width="200px"><center><?=$row->KodeProduk;?></center></td>
				<td width="200px"><center><?=$row->NamaProduk;?></center></td>
				<td width="200px"><center><?=$row->Berat;?></center></td>
				<td width="200px" id='berat_jual'><center><?=$row->BeratJual;?></center></td>
				<td width="200px" id='harga_jual'><center>$<?=$row->HargaJual;?></center></td>
				<td width="130px">
				<center>
					<img class="edit_produk" src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" title="Edit" rel="<?=$row->KodeProduk?>" alt="Edit">
					<a href="<?=site_url("admin/penjualan/delete_detail_penjualan/".$result_detail_penjualan[0]->KodePenjualan."/".$row->KodeProduk)?>"><img title="Hapus" class="delete_produk" src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete"></a>
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

<?php 
if($result_detail_penjualan){
	foreach($result_detail_penjualan as $num_row => $row){
?>
		
		<?php if(($row->Status)=='Pesan'){
		?>
		<?=form_open("admin/penjualan/edit_penjualan/".$row->KodePenjualan)?>
		<table width='100%'>
			<tbody>
				<tr>
					<td width='75px'>Status</td>
					<td width='1px'>:</td>
					<td>
						<?php
						$data=array(
							'Pesan'=>'Pesan',
							'Beli'=>'Beli',
							'Batal'=>'Batal'
							);
						echo form_dropdown('Status',$data,$result_detail_penjualan[0]->Status,"style='width:175px'"); 
						?>
					</td>
				</tr>
			<tbody>
		<table>
		<div id="button">
			<input type="button" class="button" style="width:100px" name="button" value="Batal" onClick="javascript:history.back()">&nbsp; 
			<input type="submit" class="button" style="width:100px" name="submit" value="Simpan">
		</div>
		</form>
		
		<?php
			}else{
		?>
				<div id="button">
				<a href='<?=site_url('admin/penjualan')?>' class="button" style="width:100px">OK</a>
				</div>
		<?php
			}
		?>
<?php
	};
}
?>
		
		<table id="daftar_harga" style="display:none">
		<?php foreach($result_daftar_produk as $row){
		?>
		<tr id='<?=$row->KodeProduk?>'>
			<td class='nama_produk'><?=$row->NamaProduk?></td>
			<td class='berat_produk'><?=$row->Berat?></td>
			<td class='harga_produk'><?=$row->HargaKiloan?></td>
		</tr>
		<?php
			}
		?>
		</table>
</div>