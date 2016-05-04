<table width="800px" align="center">
	<thead>
		<tr>
		   <th width="200px"><center>Kode Pemasok</center></th>
		   <th width="200px"><center>Nama Pemasok</center></th>
		   <th width="200px"><center>Kredibilitas</center></th>
		   <th width="200px"><center>Prosentase(%)</center></th>
		</tr>
		<tr>
			<td colspan="4"><hr width='800px'></td>
		</tr>
	</thead>
	<tbody>
		<?php
		if($result_summary_pemasok){
			$TotalBeli=0;
			foreach($result_summary_pemasok as $row1){
				$TotalBeli = $TotalBeli+$row1->JumlahBeli;
			}
			foreach($result_summary_pemasok as $num_row => $row)
		{?>
		<tr>
			<td><center><?=$row->KodePemasok;?></center></td>
			<td><center><?=$row->NamaPemasok;?></center></td>
			<td><center><?=$row->Kredibilitas;?></center></td>
			<td><center><?=number_format($row->JumlahBeli/$TotalBeli*100,2,',','');?> &nbsp %</center></td>
		</tr>
		<tr>
			<td colspan="4"><hr width='800px'></td>
		</tr>
		
		<?php
		};
		}else{?>
		<?php
		}
		?>
	</tbody>
</table>