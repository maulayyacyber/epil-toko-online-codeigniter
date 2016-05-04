<table width="825px" align="center">
	<thead>
		<tr>
		   <th width="25px"><center>No</center></th>
		   <th width="150px"><center>Kode Pembelian</center></th>
		   <th width="200px"><center>Nama Pemasok</center></th>
		   <th width="125px"><center>Tanggal</center></th>
		   <th width="125px"><center>Total</center></th>
		   <th width="200px"><center>Nama Pegawai</center></th>
		</tr>
		<tr>
			<td colspan="6"><hr width='825px'></td>
		</tr>
	</thead>
	
	<tbody>
			<?php if($result_pembelian){
				$no=1;
				foreach($result_pembelian as $num_row => $row)
			{?>
		<tr>
			<td><center><?=$no++;?></center></td>
			<td><center><?=$row->KodePembelian;?></center></td>
			<td><center><?=$row->NamaPemasok;?></center></td>
			<td><center><?=substr($row->Tanggal,8,2).'-'.substr($row->Tanggal,5,2).'-'.substr($row->Tanggal,0,4);?></center></td>
			<td><center>$<?=$row->Total;?></center></td>
			<td><center><?=$row->NamaPegawai;?></center></td>
		</tr>
		<tr>
			<td colspan="6"><hr width='825px'></td>
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