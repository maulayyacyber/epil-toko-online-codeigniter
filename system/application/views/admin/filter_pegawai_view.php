<?php foreach($result_filter_pegawai as $row):?>
<tr>
	<td width="15px"><center><?=$row->KodePegawai;?></center></td>
	<td width="30px"><?=$row->NamaPegawai;?></td>
	<td width="45px"><?=$row->AlmtPegawai;?></td>
	<td width="15px"><center><?=$row->NoTelepon;?></center></td>
	<td width="10px"><center><?=$row->Level;?></center></td>
	<td><center>
		<!-- Icons -->
		 <a href="<?=site_url("admin/pegawai/edit_pegawai/".$row->KodePegawai)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
		 <a href="<?=site_url("admin/pegawai/delete_pegawai/".$row->KodePegawai)?>" title="Delete"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
	</center></td>
</tr>
<?php endforeach;?>