<table width="825px" align="center">
	<thead>
		<tr>
		   <th width="25px"><center>No</center></th>
		   <th width="150px"><center>Kode Penjualan</center></th>
		   <th width="200px"><center>Nama Pelanggan</center></th>
		   <th width="75px"><center>Tanggal</center></th>
		   <th width="75px"><center>Total</center></th>
		   <th width="200px"><center>Nama Pegawai</center></th>
		   <th width="100px"><center>Status</center></th>
		</tr>
		<tr>
			<td colspan="7"><hr width='825px'></td>
		</tr>
	</thead>
	<tbody>
			<?php if($result_penjualan){
				$no=1;
				foreach($result_penjualan as $num_row => $row)
			{?>
		<tr>
			<td><center><?=$no++;?></center></td>
			<td><center><?=$row->KodePenjualan;?></center></td>
			<td><center><?=$row->NamaPelanggan;?></center></td>
			<td><center><?=substr($row->Tanggal,8,2).'-'.substr($row->Tanggal,5,2).'-'.substr($row->Tanggal,0,4);?></center></td>
			<td><center>$<?=$row->TotalHarga;?></center></td>
			<td><center><?=$row->NamaPegawai;?></center></td>
			<td><center><?=$row->Status;?></center></td>
		</tr>
		<tr>
			<td colspan="7"><hr width='825px'></td>
		</tr>
			<?php
			};
			}else{?>
				<div>
					Tidak ada transaksi pembelian yang tersedia.
				</div>
			<?php	
			}
			?>
	</tbody>
</table>