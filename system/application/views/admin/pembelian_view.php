<div style="float:left;margin:5px 5px 25px 5px;">
<?=form_open("admin/pembelian/search_pembelian/")?>
<?php
$data=array(
	'KodePembelian'=>'Kode Pembelian',
	'NamaPemasok'=>'Nama Pemasok',
	'Tanggal'=>'Tanggal',
	'NamaPegawai'=>'Nama Pegawai'
	);
echo form_dropdown('NamaField',$data,'','class="combo"');
?>
</div>
<div style="float:left;margin:5px 5px 25px 5px;"><input type="text" size="15px" name="keyword" value=""></div>
<div style="float:left;margin:5px 5px 25px 5px;"><input type="submit" class="button" name="submit" style="width:80px" value="Cari"></div>
<div style="float:right;margin:5px 10px 25px 5px;"><a class="button" style="width:80px" href="<?=site_url("admin/pembelian/cetak_pembelian/")?>" target="_blank"><center>Cetak Data</center></a></div>
<div style="float:right;margin:5px 10px 25px 5px;"><a class="button" style="width:80px" href="<?=site_url("admin/pembelian/add_pembelian/")?>">Tambah Data</a></div>
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
			   <th width="150px"><center>Kode Pembelian</center></th>
			   <th width="250px"><center>Nama Pemasok</center></th>
			   <th width="100px"><center>Tanggal</center></th>
			   <th width="100px"><center>Total</center></th>
			   <th width="200px"><center>Nama Pegawai</center></th>
			   <th></th>
			</tr>
		</thead>
		<tbody>
				<?php if($result_pembelian){
					foreach($result_pembelian as $num_row => $row)
				{?>
			<tr>
				<td><center><?=$row->KodePembelian;?></center></td>
				<td><center><?=$row->NamaPemasok;?></center></td>
				<td><center><?=substr($row->Tanggal,8,2).'-'.substr($row->Tanggal,5,2).'-'.substr($row->Tanggal,0,4);?></center></td>
				<td><center>$<?=$row->Total;?></center></td>
				<td><center><?=$row->NamaPegawai;?></center></td>
				<td>
				<center>
					<!-- Icons -->
					<a href="<?=site_url("admin/pembelian/edit_pembelian/".$row->KodePembelian)?>" title="Edit"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/pencil.png" alt="Edit" /></a>
					<a href="<?=site_url("admin/pembelian/delete_pembelian/".$row->KodePembelian)?>" title="Hapus" class="delete"><img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" alt="Delete" /></a> 
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
		<thead>
			<tr>
				<th colspan="6"></th>
			</tr>
		</thead>
	</table>
<div style="clear: both;"></div>
<div class="pagination">
<?=$this->pagination->create_links()?>
</div>
</div>
