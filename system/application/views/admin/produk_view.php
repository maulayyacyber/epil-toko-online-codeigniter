<script type="text/javascript">
$(document).ready(function(){
	$(".input_filter").bind('keyup',function(){
		var id=$(this).attr('rel');
		var value_produk = $("#"+id).val();
		var data = "NamaField="+id+"&Value="+value_produk;
		$.ajax({
			data:data,
			type:"POST",
			url:'<?=site_url("admin/produk/filter")?>',
			success:function(respon){
				$("table tbody").html(respon);
			}
		});
	});
});
</script>
<div style="float:right;margin:5px 10px 25px 5px"><a class="button" href="<?=site_url("admin/produk/cetak_produk/") ?>" target="_blank" title="Cetak data produk">Cetak Data</a></div>
<div style="float:right;margin:5px 10px 25px 5px"><a class="button" href="<?=site_url("admin/produk/add_produk/") ?>" title="Tambah data produk">Tambah Data</a></div>
<div class="clear"></div>
	
	<div class="tab-content default-tab" id="tab1">
	<?php
	if(isset($_SESSION['msg'])){
		echo '<div class="notification success png_bg">
					<a href="#" class="close"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross_grey_small.png" title="Tutup pemberitahuan" alt="close" /></a>
						<div>
							'.$_SESSION['msg'].'
						</div>
					</div>
			';
		unset($_SESSION['msg']);
	}?>
		<table width="100%">
			<thead>
				<tr>
				   <th width="150px"><center>Kode Produk</center></th>
				   <th width="300px"><center>Nama Produk</center></th>
				   <th width="100px"><center>Kualitas</center></th>
				   <th width="100px"><center>Ukuran(Kg)</center></th>
				   <th width="100px"><center>Harga($)</center></th>
				   <th></th>
				</tr>
				<tr>
				   <th><center><input type="text" size="20px" name="KodeProduk" class="input_filter" rel="KodeProduk" id="KodeProduk" value=""></center></th>
				   <th><center><input type="text" size="45px" name="NamaProduk" class="input_filter" rel="NamaProduk" id="NamaProduk" value=""></center></th>
				   <th><center><input type="text" size="15px" name="Kualitas" class="input_filter" rel="Kualitas" id="Kualitas" value=""></center></th>
				   <th><center><input type="text" size="15px" name="Ukuran" class="input_filter" rel="Berat" id="Berat" value=""></center></th>
				   <th><center><input type="text" size="15px" name="Harga" class="input_filter" rel="HargaKiloan" id="HargaKiloan" value=""></center></th>
				   <th></th>
				</tr>
			</thead>
			<tbody>
					<?php if($result_produk){
						foreach($result_produk as $num_row => $row)
					{?>
				<tr>
					<td><center><?=$row->KodeProduk;?></center></td>
					<td><center><?=$row->NamaProduk;?></center></td>
					<td><center><?=$row->Kualitas;?></center></td>
					<td><center><?=$row->Berat;?></center></td>
					<td><center>$<?=$row->HargaKiloan;?></center></td>
					<td>
					<center>
					<!-- Icons -->
						 <a href="<?=site_url("admin/produk/edit_produk/".$row->KodeProduk)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
						 <a href="<?=site_url("admin/produk/delete_produk/".$row->KodeProduk)?>" title="Hapus" class="delete"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
					</center>
					</td>
				</tr>
				<?php
				};
				}else{?>
					<div class="notification attention png_bg">
					<a href="#" class="close"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross_grey_small.png" title="Tutup pemberitahuan" alt="close" /></a>
						<div>
							Maaf, Saat ini tidak ada data produk yang tersedia.
						</div>
					</div>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>