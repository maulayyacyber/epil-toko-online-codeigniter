<table width="800px" align="center">
	<thead>
		<tr>
		   <th width="100px"><center>Kode Produk</center></th>
		   <th width="200px"><center>Nama Produk</center></th>
		   <th width="75px"><center>Kualitas</center></th>
		   <th width="75px"><center>Ukuran(Kg)</center></th>
		   <th width="75px"><center>Harga($)</center></th>
		   <th width="75px"><center>Prosentase(%)</center></th>
		</tr>
		<tr>
			<td colspan="6"><hr width='800px'></td>
		</tr>
	</thead>
	<tbody>
		<?php
		if($result_summary_produk){
			$TotalJual=0;
			foreach($result_summary_produk as $row1){
				$TotalJual = $TotalJual+$row1->JumlahJual;
			}
			foreach($result_summary_produk as $num_row => $row)
		{?>
		<tr>
			<td><center><?=$row->KodeProduk;?></center></td>
			<td><center><?=$row->NamaProduk;?></center></td>
			<td><center><?=$row->Kualitas;?></center></td>
			<td><center><?=$row->Berat;?></center></td>
			<td><center>$ &nbsp <?=$row->HargaKiloan;?></center></td>
			<td><center><?=number_format($row->JumlahJual/$TotalJual*100,2,',','');?> &nbsp %</center></td>
		</tr>
		<tr>
			<td colspan="6"><hr width='800px'></td>
		</tr>
		<?php
		};
		}else{?>
		<?php
		}
		?>
	</tbody>
</table>
