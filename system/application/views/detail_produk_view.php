<script>
$(document).ready(function(){
	$("#tutup2").click(function(){
		$.colorbox.close();
		return false;
	});
});
</script>

		<?php foreach($result_detail_produk as $num_row=>$row){
		?>
		<div id="detail_produk">
			<div id="detail_produk_right">
				<div id="isi_detail_produk_right">
					> Product Code
				</div>
				<div id="isi_detail_produk_right">
					<?=$row->KodeProduk;?>
				</div>
				<div id="isi_detail_produk_right">
					> Product Name
				</div>
				<div id="isi_detail_produk_right">
					<?=$row->NamaProduk;?>
				</div>
				<div id="isi_detail_produk_right">
					> Grade
				</div>
				<div id="isi_detail_produk_right">
					<?=$row->Kualitas?>
				</div>
				<div id="isi_detail_produk_right">
					> Weight (Kg)
				</div>
				<div id="isi_detail_produk_right">
						<?php foreach($result_daftar_berat as $row){?>
							<div style=" width:'15px'; float:left; margin:0px 0px 0px 0px;  padding:0px 0px 0px 0px; font-family: Tahoma; font-size: 15px; color: #46484A; font-weight: 100;" id="<?=$row->KodeProduk?>"><?=$row->Berat?> &nbsp  </div>
						<?php }?>
					
				</div>
				<div id="isi_detail_produk_right">
					> Unit Price (/Kg)
				</div>
				<div id="isi_detail_produk_right">
					<td id="harga_hasil"><?=($row->HargaKiloan)?> USD &nbsp</td>
				</div>
				
				<div style="clear: both;"></div>
			</div>
		
			<div id="detail_produk_left">
				<div><center>
				<a href=""><img src="<?=base_url()?>./foto_ikan/<?=($row->NamaFoto!="")?$row->NamaFoto:'default.jpg'?>" width="140" height="140" border="0" alt=""></a>
				</div>
				</center>
			</div>
		</div>
<?php		
	}
?>