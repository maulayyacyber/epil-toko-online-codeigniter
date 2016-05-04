<div id="kategori_left"></div>
<div id="kategori_middle_left"><div style="padding: 9px 0px 0px 7px" class="lb">TRANSACTION HISTORY</div><div style="padding: 9px 0px 0px 7px" class="lw">TRANSACTION HISTORY</div></div>
	<div id="kategori_right"></div>
		<div style="clear: both;"></div>
	<div id="garis_left"></div>	
	<div id="isi_fitur">
<?php
	if(!isset($_SESSION['kode_user'])){
		}else{
	?>
<center>	
<div id="cart">
<?php
	if(isset($_SESSION['msg_history'])){
		echo '<div class="notification success png_bg">
					<a href="#" class="close"></a>
						<div>
							'.$_SESSION['msg_history'].'
						</div>
					</div>
			';
		unset($_SESSION['msg_history']);

				
		
	}?>

<div id="shoping_cart">
	<div id="header_shoping_cart3"><div style="padding: 9px 0px 0px 7px" class="lw">Transaction</div></div>
	<div id="header_shoping_cart3"><div style="padding: 9px 0px 0px 7px" class="lw">Date</div></div>
	<div id="header_shoping_cart3"><div style="padding: 9px 0px 0px 7px" class="lw">Total</div></div>
	<div id="header_shoping_cart3"><div style="padding: 9px 0px 0px 7px" class="lw">Status</div></div>
</div>
<?php 

foreach($result_history_penjualan as $num_row=>$row){?>
<table align='center' border='0' width='500px' style="font-family: Tahoma; font-size: 20px; color: #46484A; font-weight: 100; padding: 0px 0px 0px 0px">
	<tr>
		<td width="110px"><center><?=$row->KodePenjualan;?></center></td>
		<td width="105px"><center><?=substr($row->Tanggal,8,2).'-'.substr($row->Tanggal,5,2).'-'.substr($row->Tanggal,0,4);?></center></td>
		<td width="105px"><center>USD &nbsp   <?=$row->TotalHarga;?></center></td>
		<td width="105px"><center>
		<?php if($row->Status=='Pesan'){
			echo 'Ordered';
		}else{
			if($row->Status=='Beli'){
				echo 'Delivered';
			}else{
				echo 'Canceled';
			}
		}
		?>
		</center></td>
		<td width="75px"><center>
		<a href="<?=site_url("history/detail_penjualan/".$row->KodePenjualan)?>" title="Transaction detail"><img src="<?=base_url()?>system/application/views/template_web/images/paper_content_pencil_48.png" width="16" height="16" border="0" alt=""></a>
		</center></td>
	</tr>
	<tr>
		<td colspan="5">
			<div id="garis_batas_shoping_cart"></div>
		</td>
	</tr>
<?php }?>
	<tr>
		<td colspan="5">
		<div class="pagination">
			<?=$this->pagination->create_links()?>
		</div>
		</td>
	</tr>
</table>
</div>
<center>	
<?php
	}

	?>
</div>
