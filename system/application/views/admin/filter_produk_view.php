<?php foreach($result_filter_produk as $row):?>
<tr>
	<td width="150px"><center><?=$row->KodeProduk;?></center></td>
	<td width="300px"><center><?=$row->NamaProduk;?></center></td>
	<td width="100px"><center><?=$row->Kualitas;?></center></td>
	<td width="100px"><center><?=$row->Berat;?></center></td>
	<td width="100px"><center>$<?=$row->HargaKiloan;?></center></td>
	<td><center>
		<!-- Icons -->
		 <a href="<?=site_url("admin/produk/edit_produk/".$row->KodeProduk)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
		 <a href="<?=site_url("admin/produk/delete_produk/".$row->KodeProduk)?>" title="Delete"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
	</center></td>
</tr>
<?php endforeach;?>