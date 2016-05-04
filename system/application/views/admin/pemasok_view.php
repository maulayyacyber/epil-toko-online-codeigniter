<script type="text/javascript">
$(document).ready(function(){
	$(".input_filter").bind('keyup',function(){
		var id=$(this).attr('rel');
		var value_produk = $("#"+id).val();
		var data = "NamaField="+id+"&Value="+value_produk;
		$.ajax({
			data:data,
			type:"POST",
			url:'<?=site_url("admin/pemasok/filter")?>',
			success:function(respon){
				$("table tbody").html(respon);
			}
		});
	});
});
</script>
<div style="float:right;margin:5px 10px 25px 5px"><a class="button" href="<?=site_url("admin/pemasok/cetak_pemasok/") ?>" target="_blank" title="Cetak data pemasok">Cetak Data</a></div>
<div style="float:right;margin:5px 10px 25px 5px;"><a class="button" href="<?=site_url("admin/pemasok/add_pemasok/")?>">Tambah Data</a></div>
<div class="clear"></div>
<div class="tab-content default-tab" id="tab1">
<?php
	if(isset($_SESSION['msg'])){
	echo 	'
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
			   <th width="40px"><center>Kode Pemasok</center></th>
			   <th width="50px"><center>Nama Pemasok</center></th>
			   <th width="260px"><center>Alamat</center></th>
			   <th width="50px"><center>No Telepon</center></th>
			   <th width="50px"><center>Email</center></th>
			   <th></th>
			</tr>		
			<tr>
			   <th><input type="text" size="13px" name="KodePemasok" class="input_filter" rel="KodePemasok" id="KodePemasok" value=""></th>
			   <th><input type="text" size="22px" name="NamaPemasok" class="input_filter" rel="NamaPemasok" id="NamaPemasok" value=""></th>
			   <th><input type="text" size="42px" name="AlmtPemasok" class="input_filter" rel="AlmtPemasok" id="AlmtPemasok" value=""></th>
			   <th><input type="text" size="15px" name="NoTelepon" class="input_filter" rel="NoTelepon" id="NoTelepon" value=""></th>
			   <th><input type="text" size="25px" name="Email" class="input_filter" rel="Email" id="Email" value=""></th>
			   <th></th>
			</tr>
		</thead>
		
		<tbody>
				<?php if($result_pemasok){
					foreach($result_pemasok as $num_row => $row)
				{?>
			<tr>
				<td><center><?=$row->KodePemasok;?></center></td>
				<td><?=$row->NamaPemasok;?></td>
				<td><?=$row->AlmtPemasok;?></td>
				<td><center><?=$row->NoTelepon;?></center></td>
				<td><?=$row->Email;?></td>
				<td>
				<center>
					<!-- Icons -->
					 <a href="<?=site_url("admin/pemasok/edit_pemasok/".$row->KodePemasok)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
					 <a href="<?=site_url("admin/pemasok/delete_pemasok/".$row->KodePemasok)?>" title="Hapus" class="delete"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
				</center>
				</td>
			</tr>
				<?php
				};
				}else{?>
					<div class="notification attention png_bg">
					<a href="#" class="close"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>
							Maaf, Saat ini tidak ada data pemasok yang tersedia.
						</div>
					</div>
				<?php	
				}
				?>
		</tbody>
	</table>
</div>