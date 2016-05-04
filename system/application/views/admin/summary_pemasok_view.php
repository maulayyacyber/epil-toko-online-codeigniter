<div style="float:right;margin:5px 10px 25px 5px"><a class="button" href="<?=site_url("admin/summary_pemasok/cetak_summary_pemasok") ?>" target="_blank" title="Cetak Data">Cetak Summary Pemasok</a></div>
<div style="float:right;margin:5px 10px 25px 5px"><a class="button" href="<?=site_url("admin/summary_pemasok/get_grafik") ?>" title="Lihat grafik">Grafik</a></div>
<div class="clear"></div>
	<div class="tab-content default-tab" id="tab1">
		<table width="100%">
			<thead>
				<tr>
				   <th><center>Kode Pemasok</center></th>
				   <th><center>Nama Pemasok</center></th>
				   <th><center>Kredibilitas</center></th>
				   <th><center>Prosentase(%)</center></th>
				   <th></th>
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
				<?php
				};
				}else{?>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>