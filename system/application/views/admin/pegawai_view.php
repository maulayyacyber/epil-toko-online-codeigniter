<script type="text/javascript">
$(document).ready(function(){
	$(".input_filter").bind('keyup',function(){
		var id=$(this).attr('rel');
		var value_produk = $("#"+id).val();
		var data = "NamaField="+id+"&Value="+value_produk;
		$.ajax({
			data:data,
			type:"POST",
			url:'<?=site_url("admin/pegawai/filter")?>',
			success:function(respon){
				$("table tbody").html(respon);
			}
		});
	});
});
</script>
<div style="float:right;margin:5px 10px 25px 5px"><a class="button" href="<?=site_url("admin/pegawai/cetak_pegawai/") ?>" target="_blank" title="Cetak data pegawai">Cetak Data</a></div>
<div style="float:right;margin:5px 10px 25px 5px"><a class="button" href="<?=site_url("admin/pegawai/add_pegawai/")?>">Tambah Data</a></div>
<div class="clear"></div>
<div class="tab-content default-tab" id="tab1">
<?php
	if(isset($_SESSION['msg'])){
		echo	'
				<div class="notification success png_bg">
				<a href="#" class="close">
				<img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" />
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
			   <th width="12px"><center>Kode Pegawai</center></th>
			   <th width="30px"><center>Nama Pegawai</center></th>
			   <th width="45px"><center>Alamat</center></th>
			   <th width="15px"><center>Telepon</center></th>
			   <th width="10px"><center>Level</center></th>
			   <th></th>
			</tr>
			<tr>
			   <th><input type="text" size="12px" name="KodePegawai" class="input_filter" rel="KodePegawai" id="KodePegawai" value=""></th>
			   <th><input type="text" size="30px" name="NamaPegawai" class="input_filter" rel="NamaPegawai" id="NamaPegawai" value=""></th>
			   <th><input type="text" size="45px" name="AlmtPegawai" class="input_filter" rel="AlmtPegawai" id="AlmtPegawai" value=""></th>
			   <th><input type="text" size="15px" name="NoTelepon" class="input_filter" rel="NoTelepon" id="NoTelepon" value=""></th>
			   <th><input type="text" size="10px" name="Level" class="input_filter" rel="Level" id="Level" value=""></th>
			   <th></th>
			</tr>
		</thead>
		
		<tbody>
				<?php if($result_pegawai){
					foreach($result_pegawai as $num_row => $row)
				{?>
			<tr>
				<td><center><?=$row->KodePegawai;?></center></td>
				<td><?=$row->NamaPegawai;?></td>
				<td><?=$row->AlmtPegawai;?></td>
				<td><center><?=$row->NoTelepon;?></center></td>
				<td><center><?=$row->Level;?></center></td>
				<td><center>
					<!-- Icons -->
					 <a href="<?=site_url("admin/pegawai/edit_pegawai/".$row->KodePegawai)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
					 <a href="<?=site_url("admin/pegawai/delete_pegawai/".$row->KodePegawai)?>" title="Hapus" class="delete"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
				</center></td>
			</tr>
				<?php
				};
				}else{?>
					<div class="notification attention png_bg">
					<a href="#" class="close"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>
							Maaf, Saat ini tidak ada data pegawai yang tersedia.
						</div>
					</div>
				<?php	
				}
				?>
		</tbody>
	</table>
</div>
