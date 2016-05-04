<script type="text/javascript">
$(document).ready(function(){
	$(".input_filter").bind('keyup',function(){
		var id=$(this).attr('rel');
		var value_produk = $("#"+id).val();
		var data = "NamaField="+id+"&Value="+value_produk;
		$.ajax({
			data:data,
			type:"POST",
			url:'<?=site_url("admin/pelanggan/filter")?>',
			success:function(respon){
				$("table tbody").html(respon);
			}
		});
	});
});
</script>
<div style="float:right;margin:5px 10px 25px 5px"><a class="button" href="<?=site_url("admin/pelanggan/cetak_pelanggan/") ?>" target="_blank" title="Cetak data pelanggan">Cetak Data</a></div>
<div class="clear"></div>
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
	<table width="100%">
		<thead>
			<tr>
			   <th width="50px"><center>Kode Pelanggan</center></th>
			   <th width="50px"><center>Nama Pelanggan</center></th>
			   <th width="250px"><center>Alamat</center></th>
			   <th width="50px"><center>No Telepon</center></th>
			   <th width="50px"><center>Email</center></th>
			   <th></th>
			</tr>
			<tr>
			   <th><input type="text" size="15px" name="KodePelanggan" class="input_filter" rel="KodePelanggan" id="KodePelanggan" value=""></th>
			   <th><input type="text" size="22px" name="NamaPelanggan" class="input_filter" rel="NamaPelanggan" id="NamaPelanggan" value=""></th>
			   <th><input type="text" size="40px" name="AlmtPelanggan" class="input_filter" rel="AlmtPelanggan" id="AlmtPelanggan" value=""></th>
			   <th><input type="text" size="15px" name="NoTelepon" class="input_filter" rel="NoTelepon" id="NoTelepon" value=""></th>
			   <th><input type="text" size="20px" name="Email" class="input_filter" rel="Email" id="Email" value=""></th>
			   <th></th>
			</tr>
		</thead>
		
		<tbody>
				<?php if($result_pelanggan){
					foreach($result_pelanggan as $num_row => $row)
				{?>
			<tr>
				<td><center><?=$row->KodePelanggan;?></center></td>
				<td><?=$row->NamaPelanggan;?></td>
				<td><?=$row->AlmtPelanggan;?></td>
				<td><center><?=$row->NoTelepon;?></center></td>
				<td><?=$row->Email;?></td>
				<td>
				<center>
					<!-- Icons -->
					 <a href="<?=site_url("admin/pelanggan/edit_pelanggan/".$row->KodePelanggan)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
					 <a href="<?=site_url("admin/pelanggan/delete_pelanggan/".$row->KodePelanggan)?>" title="Hapus" class="delete"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
				</center>
				</td>
			</tr>
				<?php
				};
				}else{?>
					<div class="notification attention png_bg">
					<a href="#" class="close"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>
							Maaf, Saat ini tidak ada data pelanggan yang tersedia.
						</div>
					</div>
				<?php	
				}
				?>
		</tbody>
	</table>
</div>
