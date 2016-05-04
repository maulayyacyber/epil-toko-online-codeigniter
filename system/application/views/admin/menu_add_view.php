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
	<?=form_open("admin/menu/add_menu/")?>
		<center>
		<table id="tabel1" width="800px">
			<tr>
				<td>Nama Menu</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="75px" name="NamaMenu" value="<?=set_value("NamaMenu")?>"><?php echo form_error('NamaMenu'); ?></td>
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
						echo form_radio('StatusMenu', 'Enable',($this->input->post("StatusMenu")!='Disable'?TRUE:''));
						echo "Enable";
						echo form_radio('StatusMenu', 'Disable',($this->input->post("StatusMenu")=='Disable'?TRUE:''));
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
						echo form_radio('StatusMenu', 'Enable',($this->input->post("StatusMenu")=='Enable'?TRUE:''),'disabled');
						echo "Enable";
						echo form_radio('StatusMenu', 'Disable',($this->input->post("StatusMenu")!='Enable'?TRUE:''));
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
				<td><textarea id="Keterangan" name="Keterangan" cols="79" rows="3"></textarea></td>
			</tr>
			<tr>
				<td style="vertical-align:top">Isi Menu</td>
				<td style="vertical-align:top">:</td>
				<td><textarea class="text-input textarea wysiwyg" id="IsiMenu" name="IsiMenu" cols="79" rows="15"></textarea></td>
			</tr>
		</table>
		<div id="button">
			<input type="button" class="button" style="width:80px" name="button" value="Batal" onClick="javascript:history.back()">&nbsp; 
			<input type="submit" class="button" style="width:90px" name="submit" value="Tambah Data">
		</div>
	</center>
</div>