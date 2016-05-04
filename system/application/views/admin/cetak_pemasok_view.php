<table width="1000px" align="center">
	<thead>
		<tr>
		   <th width="25px"><center>No</center></th>
		   <th width="150px"><center>Kode Pemasok</center></th>
		   <th width="200px"><center>Nama Pemasok</center></th>
		   <th width="325px"><center>Alamat</center></th>
		   <th width="125px"><center>No Telepon</center></th>
		   <th width="175px"><center>Email</center></th>
		</tr>		
		<tr>
			<td colspan="6"><hr width='1000px'></td>
		</tr>
	</thead>
	
	<tbody>
			<?php if($result_pemasok){
				$no=1;
				foreach($result_pemasok as $num_row => $row)
			{?>
		<tr>
			<td><center><?=$no++;?></center></td>
			<td><center><?=$row->KodePemasok;?></center></td>
			<td><?=$row->NamaPemasok;?></td>
			<td><?=$row->AlmtPemasok;?></td>
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
					Data pemasok tidak tersedia.
				</div>
			<?php	
			}
			?>
	</tbody>
</table>
