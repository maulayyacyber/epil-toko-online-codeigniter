<script type="text/javascript" src="<?=base_url()?>system/application/js/jquery-ui-1.8.11.custom.min.js"></script>		
<script type="text/javascript" src="<?=base_url()?>system/application/js/colorbox/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="<?=base_url()?>system/application/js/colorbox/css/colorbox.css" type="text/css">		
<link rel="stylesheet" href="<?=base_url()?>system/application/css/ui-lightness/jquery-ui-1.8.11.custom.css">
<script>
	$(document).ready(function(){
		$( ".datepicker" ).datepicker({
			dateFormat: 'yy-mm-dd',
			showAnim:'slideDown',
			changeMonth: true,
			changeYear: true,
			yearRange:'-50:nn'
		});		
	});
</script>
<div id="modal_box">
<?php
	foreach($result_daftar_kode_pemasok as $row){
	}
?>
</div>
<div class="tab-content default-tab" id="tab1">
	<?=form_open("admin/pembelian/add_pembelian/")?>
	<center>
		<table class="tabel_header" width="400px">
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><input type="text" readonly size="30px" name="Tanggal" class='datepicker text-input medium-input' value="<?=set_value("Tanggal")?>"><?php echo form_error('Tanggal'); ?></td>
			</tr>
			<tr>
				<td width="170px">Kode Pemasok</td>
				<td>:</td>
				<td>
				<?=$this->fungsi_bantuan->create_combobox('daftar_kode_pemasok',$result_daftar_kode_pemasok,"KodePemasok","KodePemasok",'',"id='daftar_kode_pemasok' style='width:210px' ")?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</form>
	<div id="button">
		<input type="button" class="button" style="width:100px" name="button" value="Batal" onClick="javascript:history.back()">&nbsp; 
		<input type="submit" class="button" style="width:100px" name="submit" value="Tambah Data">
	</div>
	</center>
</div>