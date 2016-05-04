<?php foreach($result_filter_pemasok as $row):?>
<tr>
	<td width="40px"><center><?=$row->KodePemasok;?></center></td>
	<td width="50px"><?=$row->NamaPemasok;?></td>
	<td width="260px"><?=$row->AlmtPemasok;?></td>
	<td width="50px"><center><?=$row->NoTelepon;?></center></td>
	<td width="50px"><?=$row->Email;?></td>
	<td><center>
		<!-- Icons -->
		 <a href="<?=site_url("admin/pemasok/edit_pemasok/".$row->KodePemasok)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
		 <a href="<?=site_url("admin/pemasok/delete_pemasok/".$row->KodePemasok)?>" title="Delete"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
	</center></td>
</tr>
<?php endforeach;?>