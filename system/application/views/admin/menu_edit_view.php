<link rel="stylesheet" href="<?=base_url()?>system/application/views/template_admin/resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>system/application/views/template_admin/resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>system/application/views/template_admin/resources/css/invalid.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?=base_url()?>system/application/js/jquery.wysiwyg.js"></script>

<script>
	$(document).ready(function(){
		$(".wysiwyg").wysiwyg();
	});
</script>
<div class="tab-content default-tab" id="tab1">
<?php
	if($result_detail_menu){
		foreach ($result_detail_menu as $num_row => $row)
	{?>
	<?=form_open("admin/menu/edit_menu/".$row->KodeMenu)?>
		<center>
		<table id="tabel1" width="800px">
			<tr>
				<td>Kode Menu</td>
				<td>:</td>
				<td><?=($row->KodeMenu)?></td>
			</tr>
			<tr>
				<td>Nama Menu</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="75px" name="NamaMenu" value="<?=($row->NamaMenu)?>"><?php echo form_error('NamaMenu'); ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<?php
				if($result_enable_menu){
					if($result_enable_menu < 2){
				?>					
					<td>
				<?php 	
						echo form_radio('StatusMenu', 'Enable',(($row->StatusMenu=='Enable')?TRUE:FALSE));
						echo "Enable";
						echo form_radio('StatusMenu', 'Disable',(($row->StatusMenu=='Disable')?TRUE:FALSE));
						echo "Disable";
				?>
					</td>
				<?php
						}
					else
					{
				?>
					<td>
				<?php 	
						echo form_radio('StatusMenu', 'Enable',(($row->StatusMenu=='Enable')?TRUE:FALSE),($row->StatusMenu=='Enable')?'':'disabled');
						echo "Enable";
						echo form_radio('StatusMenu', 'Disable',(($row->StatusMenu=='Disable')?TRUE:FALSE));
						echo "Disable";
				?>
					</td>					
				<?php
					}
				}
				?>
			</tr>
			<tr>
				<td style="vertical-align:top">Keterangan</td>
				<td style="vertical-align:top">:</td>
				<td><textarea id="Keterangan" name="Keterangan" cols="79" rows="3"><?=($row->Keterangan)?><?php echo form_error('Keterangan'); ?></textarea></td>
			</tr>
			<tr>
				<td style="vertical-align:top">Isi Menu</td>
				<td style="vertical-align:top">:</td>
				<td><textarea class="text-input textarea wysiwyg" id="IsiMenu" name="IsiMenu" cols="79" rows="15"><?=($row->IsiMenu)?><?php echo form_error('IsiMenu'); ?></textarea></td>
			</tr>
		</table>
<?php
	};
	}else{
	}
?>
		<div id="button">
			<input type="button" class="button" style="width:80px" name="button" value="Batal" onClick="javascript:history.back()">&nbsp; 
			<input type="submit" class="button" style="width:90px" name="submit" value="Simpan">
		</div>
	</center>
</div>