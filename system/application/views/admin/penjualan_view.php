<div style="float:left;margin:5px 5px 25px 5px;">
<?=form_open("admin/penjualan/search_penjualan/")?>
<?php
$data=array(
	'KodePenjualan'=>'Kode Penjualan',
	'NamaPelanggan'=>'Nama Pelanggan',
	'Tanggal'=>'Tanggal',
	'NamaPegawai'=>'Nama Pegawai',
	'Status'=>'Status'
	);
echo form_dropdown('NamaField',$data,'','class="combo"');
?>
</div>
<div style="float:left;margin:5px 5px 25px 5px;"><input type="text" size="15px" name="keyword" value=""></div>
<div style="float:left;margin:5px 5px 25px 5px;"><input type="submit" class="button" name="submit" style="width:80px" value="search"></div>
<div style="float:right;margin:5px 10px 25px 5px;"><a class="button" style="width:80px" href="<?=site_url("admin/penjualan/cetak_penjualan/")?>" target="_blank"><center>Cetak Data</center></a></div>
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
			   <th width="125px"><center>Kode Penjualan</center></th>
			   <th width="200px"><center>Nama Pelanggan</center></th>
			   <th width="100px"><center>Tanggal</center></th>
			   <th width="100px"><center>Total</center></th>
			   <th width="200px"><center>Nama Pegawai</center></th>
			   <th width="100px"><center>Status</center></th>
			   <th></th>
			</tr>
		</thead>
		
		<tbody>
				<?php if($result_penjualan){
					foreach($result_penjualan as $num_row => $row)
					
				{?>
			<tr>
				<td><center><?=$row->KodePenjualan;?></center></td>
				<td><center><?=$row->NamaPelanggan;?></center></td>
				<td><center><?=substr($row->Tanggal,8,2).'-'.substr($row->Tanggal,5,2).'-'.substr($row->Tanggal,0,4);?></center></td>
				<td><center>$<?=$row->TotalHarga;?></center></td>
				<td><center><?=$row->NamaPegawai;?></center></td>
				<td><center><?=$row->Status;?></center></td>
				<td>
					<a href="<?=site_url("admin/penjualan/edit_penjualan/".$row->KodePenjualan)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
					<a href="<?=site_url("admin/penjualan/delete_penjualan/".$row->KodePenjualan)?>" title="Hapus" class="delete"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
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
		<thead>
			<tr>
			    <th colspan="7"></th>
			</tr>
		</thead>
	</table>
<div style="clear: both;"></div>
<div class="pagination">
<?=$this->pagination->create_links()?>
</div>
</div>