	<table width="800px" align="center">
		<thead>
			<tr>
			   <th width="25%"><center>Bulan</center></th>
			   <th width="25%"><center>Total Penjualan</center></th>
			   <th width="25%"><center>Total Pembelian</center></th>
			   <th width="25%"><center>Laba</center></th>
			</tr>
			<tr>
				<td colspan="4"><hr width='800px'></td>
			</tr>
		</thead>
		<tbody>
<?php
	$total_penjualan =$total_pembelian = 0;
	foreach($result_laporan_bulanan as $bln=>$row){
		$total_penjualan = $total_penjualan+$row['penjualan'];
		$total_pembelian = $total_pembelian+$row['pembelian'];
?>
			</tr>
				<td><center><?=$bln?></center></td>
				<td><center>$<?=$row['penjualan']?></center></td>
				<td><center>$<?=$row['pembelian']?></center></td>
				<td><center>$<?=($row['penjualan']-$row['pembelian'])?></center></td>
			</tr>
			<tr>
				<td colspan="4"><hr width='800px'></td>
			</tr>
		</tbody>
<?php
	}
?>
		<thead>
			<tr>
				<td colspan="4"><hr width='800px'></td>
			</tr>
			<tr>
				<th><center>Total</center></th>
				<th><center>$<?=$total_penjualan?></center></th>
				<th><center>$<?=$total_pembelian?></center></th>
				<th><center>$<?=($total_penjualan-$total_pembelian)?></center></th>
			</tr>
		</thead>
	</table>