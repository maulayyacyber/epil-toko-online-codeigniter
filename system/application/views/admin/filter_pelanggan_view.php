<?php foreach($result_filter_pelanggan as $row):?>
<tr>
	<td width="50px"><center><?=$row->KodePelanggan;?></center></td>
	<td width="50px"><?=$row->NamaPelanggan;?></td>
	<td width="250px"><?=$row->AlmtPelanggan;?></td>
	<td width="50px"><center><?=$row->NoTelepon;?></center></td>
	<td width="50px"><?=$row->Email;?></td>
	<td><center>
		<!-- Icons -->
		 <a href="<?=site_url("admin/pelanggan/edit_pelanggan/".$row->KodePelanggan)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
		 <a href="<?=site_url("admin/pelanggan/delete_pelanggan/".$row->KodePelanggan)?>" title="Delete"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
	</center></td>
</tr>
<?php endforeach;?>
