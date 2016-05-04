<table width="825px" align="center">
	<thead>
		<tr>
		   <th width="25px"><center>No</center></th>
		   <th width="150px"><center>Kode Produk</center></th>
		   <th width="200px"><center>Nama Produk</center></th>
		   <th width="150px"><center>Kualitas</center></th>
		   <th width="150px"><center>Ukuran(Kg)</center></th>
		   <th width="150px"><center>Harga($)</center></th>
		</tr>
		<tr>
			<td colspan="6"><hr width='825px'></td>
		</tr>
	</thead>
	<tbody>
			<?php if($result_produk){
				$no=1;
				foreach($result_produk as $num_row => $row)
			{?>
		<tr>
			<td><center><?=$no++;?></center></td>
			<td><center><?=$row->KodeProduk;?></center></td>
			<td><center><?=$row->NamaProduk;?></center></td>
			<td><center><?=$row->Kualitas;?></center></td>
			<td><center><?=$row->Berat;?></center></td>
			<td><center>$<?=$row->HargaKiloan;?></center></td>
		</tr>
		<tr>
			<td colspan="6"><hr width='825px'></td>
		</tr>
		<?php
		};
		}else{?>
			<div>
				Data produk tidak tersedia.
			</div>
		<?php
		}
		?>
	</tbody>
</table>
