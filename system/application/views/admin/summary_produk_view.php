<div style="float:right;margin:5px 10px 25px 5px"><a class="button" href="<?=site_url("admin/summary_produk/cetak_summary_produk") ?>" target="_blank" title="Cetak Data">Cetak Summary Produk</a></div>
<div style="float:right;margin:5px 10px 25px 5px"><a class="button" href="<?=site_url("admin/summary_produk/get_grafik") ?>" title="Lihat grafik">Grafik</a></div>
<div class="clear"></div>
	<div class="tab-content default-tab" id="tab1">
		<table width="100%">
			<thead>
				<tr>
				   <th><center>Kode Produk</center></th>
				   <th><center>Nama Produk</center></th>
				   <th><center>Kualitas</center></th>
				   <th><center>Ukuran(Kg)</center></th>
				   <th><center>Harga($)</center></th>
				   <th><center>Prosentase(%)</center></th>
				   <th></th>
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
				<?php
				};
				}else{?>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>