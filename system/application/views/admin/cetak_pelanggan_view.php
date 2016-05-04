<table width="1000px" align="center">
	<thead>
		<tr>
		   <th width="25px"><center>No</center></th>
		   <th width="125px"><center>Kode Pelanggan</center></th>
		   <th width="125px"><center>Nama Pelanggan</center></th>
		   <th width="350px"><center>Alamat</center></th>
		   <th width="150px"><center>No Telepon</center></th>
		   <th width="175px"><center>Email</center></th>
		</tr>
		<tr>
			<td colspan="6"><hr width='1000px'></td>
		</tr>
	</thead>
	
	<tbody>
			<?php if($result_pelanggan){
				$no=1;
				foreach($result_pelanggan as $num_row => $row)
			{?>
		<tr>
			<td><center><?=$no++;?></center></td>
			<td><center><?=$row->KodePelanggan;?></center></td>
			<td><?=$row->NamaPelanggan;?></td>
			<td><?=$row->AlmtPelanggan;?></td>
			<td><center><?=$row->NoTelepon;?></center></td>
			<td><?=$row->Email;?></td>
		</tr>
		<tr>
			<td colspan="6"><hr width='1000px'></td>
		</tr>
			<?php
			};
			}else{?>
				<div>
					Data pelanggan tidak tersedia.
				</div>
			<?php	
			}
			?>
	</tbody>
</table>
