<div class="tab-content default-tab" id="tab1"> 
<?php if($result_profil_pegawai){
	foreach($result_profil_pegawai as $num_row => $row)
{?>
	<?=form_open("admin/pegawai/edit_profil_pegawai/".$row->KodePegawai)?>
		<center>
		<table id="tabel1" width="600px">
			<tr><td colspan='3'><div id="header_tabel"> &nbsp == &nbsp DATA DIRI &nbsp == &nbsp </div></td></tr>

			<tr>
				<td width="175px">Nama Pegawai</td>
				<td width="15px">:</td>
				<td><?=($row->NamaPegawai)?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>
					<?php if($row->JenisKelamin=='L'){
						echo 'Laki-Laki';
					}else{
						echo 'Perempuan';
					}
					?>
				</td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td><?=($row->TempatLahir)?></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><?=substr($row->TanggalLahir,8,2).'-'.substr($row->TanggalLahir,5,2).'-'.substr($row->TanggalLahir,0,4);?></td>
			</tr>
			<tr><td colspan='3'><div id="header_tabel"> &nbsp == &nbsp KONTAK &nbsp == &nbsp </div></td></tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?=($row->AlmtPegawai)?></td>
			</tr>
			<tr>
				<td>No Telepon</td>
				<td>:</td>
				<td><?=($row->NoTelepon)?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?=($row->Email)?></td>
			</tr>
			<tr><td colspan='3'><div id="header_tabel"> &nbsp == &nbsp LAIN-LAIN &nbsp == &nbsp </div></td></tr>
			<tr>
				<td>Tanggal Masuk</td>
				<td>:</td>
				<td><?=substr($row->TanggalMasuk,8,2).'-'.substr($row->TanggalMasuk,5,2).'-'.substr($row->TanggalMasuk,0,4);?></td>
			</tr>
			<tr>
				<td>Level</td>
				<td>:</td>
				<td><?=($row->Level)?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><?=($row->Username)?></td>
			</tr>
		</table>
		</center>
	<?php
	};
	}else{
	}
	?>
	<div id="button">
		<a class="button" href="<?=site_url("admin/pegawai/change_password/".$row->KodePegawai)?>">Ubah Password</a>
		<a class="button" href="<?=site_url("admin/pegawai/edit_profil_pegawai/".$row->KodePegawai)?>">Edit Data</a>
	</div>
</div>