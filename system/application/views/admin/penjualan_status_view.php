<div style="float:left;margin:5px 5px 25px 5px;">
<?=form_open("admin/penjualan/search_penjualan_status/")?>
<?php
$data=array(
	'KodePenjualan'=>'Kode Penjualan',
	'KodePelanggan'=>'Kode Pelanggan',
	'Tanggal'=>'Tanggal',
	'Total'=>'Total',
	'KodePegawai'=>'Kode Pegawai',
	'Status'=>'Status'
	);
echo form_dropdown('NamaField',$data,'','class="combo"');
?>
</div>
<div style="float:left;margin:5px 5px 25px 5px;"><input type="text" size="15px" name="keyword" value=""></div>
<div style="float:left;margin:5px 5px 25px 5px;"><input type="submit" class="button" name="submit" style="width:80px" value="search"></div>
<div class="clear"></div>
<?=form_close();?>
<div class="tab-content default-tab" id="tab1">
<?php
	if(isset($_SESSION['msg'])){
		echo	'
				<div class="notification success png_bg">
				<a href="#" class="close">
				<img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross_grey_small.png" title="Tutup pemberitahuan" alt="close">
				</a>
					<div>
						'.$_SESSION['msg'].'
					</div>
				</div>
				';
		unset($_SESSION['msg']);
	}
?>
	<table width="100%">
		<thead>		
			
			<tr>
			   <th><center>Kode Penjualan</center></th>
			   <th><center>Kode Pelanggan</center></th>
			   <th><center>Tanggal</center></th>
			   <th><center>Total</center></th>
			   <th><center>Nama Pegawai</center></th>
			   <th><center>Status</center></th>
			   <th></th>
			</tr>
		</thead>
		<tbody>
				<?php if($result_penjualan_status){
					foreach($result_penjualan_status as $num_row => $row)
				{?>	
				<td><center><?=$row->KodePenjualan;?></center></td>
				<td><center><?=$row->KodePelanggan;?></center></td>
				<td><center><?=$row->Tanggal;?></center></td>
				<td><center>$<?=$row->TotalHarga;?></center></td>
				<td><center><?=$row->NamaPegawai;?></center></td>
				<td><center><?=$row->Status;?></center></td>
				<td><center>
					<!-- Icons -->
					 <a href="<?=site_url("admin/penjualan/edit_penjualan/".$row->KodePenjualan)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
					 <a href="<?=site_url("admin/penjualan/delete_penjualan/".$row->KodePenjualan)?>" title="Hapus"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
					</center>
				</td>
			</tr>
				<?php
				};
				}else{?>
					<div class="notification attention png_bg">
					<a href="#" class="close"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div>
							Maaf, Saat ini tidak ada transaksi yang tersedia.
						</div>
					</div>
				<?php	
				}
				?>
		</tbody>
	</table>
</div>