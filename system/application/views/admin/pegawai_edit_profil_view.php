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
<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
<?php if($result_detail_pegawai){
	foreach($result_detail_pegawai as $num_row => $row)
{?>
	<?=form_open("admin/pegawai/edit_pegawai/".$row->KodePegawai)?>
		<center>
		<table id="tabel1" width="600px">
			<tr><td colspan='3'><div id="header_tabel"> &nbsp == &nbsp DATA DIRI &nbsp == &nbsp </div></td></tr>
			<tr>
				<td width="150px">Nama Pegawai</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="px" name="NamaPegawai" value="<?=($row->NamaPegawai)?>"><?php echo form_error('NamaPegawai'); ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<?php 	echo form_radio('JenisKelamin', 'L',(($row->JenisKelamin=='L')?TRUE:FALSE));
					echo "Laki-Laki";
					echo form_radio('JenisKelamin', 'P', (($row->JenisKelamin=='P')?TRUE:FALSE));
					echo "Perempuan";
					?>
				</td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="30px" name="TempatLahir" value="<?=($row->TempatLahir)?>"><?php echo form_error('TempatLahir'); ?></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><input  type="text" size="33px" name="TanggalLahir" class='datepicker text-input medium-input2' value="<?=($row->TanggalLahir)?>"><?php echo form_error('TanggalLahir'); ?></td>
			</tr>
			<tr>
				<td style="vertical-align:top">Alamat</td>
				<td style="vertical-align:top">:</td>
				<td>
				<textarea id="AlmtPegawai" name="AlmtPegawai" width="75px" cols="79" rows="3"><?=($row->AlmtPegawai)?><?php echo form_error('AlmtPegawai'); ?></textarea>
				</td>
			</tr>
			<tr><td colspan='3'><div id="header_tabel"> &nbsp == &nbsp KONTAK &nbsp == &nbsp </div></td></tr>
			<tr>
				<td>No Telepon</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="30px" name="NoTelepon" value="<?=($row->NoTelepon)?>"><?php echo form_error('NoTelepon'); ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input class="text-input medium-input2" type="text" size="30px" name="Email" value="<?=($row->Email)?>"><?php echo form_error('Email'); ?></td>
			</tr>
			<tr>
				<td colspan="3" style="text-align:center"><input type="button" class="button" style="width:80px" name="button" value="Batal" onClick="javascript:history.back()">&nbsp; 
				<input type="submit" class="button" style="width:80px" name="submit" value="Simpan"></td>
			</tr>
		</table>
		</center>
	<?php
	};
	}else{
	}
	?>
</div>