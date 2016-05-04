<div style="float:right;margin:5px 10px 25px 5px"><a class="button" href="<?=site_url("admin/menu/add_menu/")?>">Tambah Data</a></div>
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
			   <th width="100px"><center>Kode Menu</center></th>
			   <th width="180px"><center>Nama Menu</center></th>
			   <th width="500px"><center>Keterangan</center></th>
			   <th width="100px"><center>Satus Menu</center></th>
			   <th></th>
			</tr>
		</thead>
		
		<tbody>
				<?php if($result_menu){
					foreach($result_menu as $num_row => $row)
				{?>
				<td><center><?=$row->KodeMenu;?></center></td>
				<td><?=$row->NamaMenu;?></td>
				<td><?=$row->Keterangan;?></td>
				<td><center><?=$row->StatusMenu;?></center></td>
				<td><center>
					<!-- Icons -->
					 <a href="<?=site_url("admin/menu/edit_menu/".$row->KodeMenu)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
					 <a href="<?=site_url("admin/menu/delete_menu/".$row->KodeMenu)?>" title="Hapus" class="delete"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
				</center></td>
			</tr>
				<?php
				};
				}else{?>
					<div class="notification attention png_bg">
					<a href="#" class="close"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>
							Maaf, Saat ini tidak ada data menu yang tersedia.
						</div>
					</div>
				<?php	
				}
				?>
		</tbody>
	</table>
</div>