<table width="1000px" align="center">
	<thead>
		<tr>
		   <th width="50px"><center>No</center></th>
		   <th width="100px"><center>Kode Pegawai</center></th>
		   <th width="225px"><center>Nama Pegawai</center></th>
		   <th width="50px"><center>JK</center></th>
		   <th width="300px"><center>Alamat</center></th>
		   <th width="150px"><center>Telepon</center></th>
		   <th width="125px"><center>Level</center></th>
		   <th></th>
		</tr>
		<tr>
			<td colspan="7"><hr width='1000px'></td>
		</tr>
	</thead>
	
	<tbody>
			<?php if($result_pegawai){
				$no=1;
				foreach($result_pegawai as $num_row => $row)
			{?>
		<tr>
			<td><center><?=$no++;?></center></td>
			<td><center><?=$row->KodePegawai;?></center></td>
			<td><?=$row->NamaPegawai;?></td>
			<td><center><?=$row->JenisKelamin;?></center></td>
			<td><?=$row->AlmtPegawai;?></td>
			<td><center><?=$row->NoTelepon;?></center></td>
			<td><center><?=$row->Level;?></center></td>
		</tr>
		<tr>
			<td colspan="7"><hr width='1000px'></td>
		</tr>
			<?php
			};
			}else{?>
				<div>
					Data pegawai tidak tersedia.
				</div>
			<?php	
			}
			?>
	</tbody>
</table>
