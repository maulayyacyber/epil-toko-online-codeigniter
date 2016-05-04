<link rel="stylesheet" href="<?=base_url()?>system/application/js/colorbox/css/colorbox.css" type="text/css">
<script type="text/javascript" src="<?=base_url()?>system/application/js/colorbox/js/jquery.colorbox-min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.add_cart').colorbox({
			onClosed:function(){
				reload_shoping_cart();
			}
		});
		$('.gambar').colorbox();
		$('.info').colorbox();
	});

</script>
<div id="kategori_left"></div>
<div id="kategori_middle_left"><div style="padding: 9px 0px 0px 7px" class="lb">PRODUCTS</div><div style="padding: 9px 0px 0px 7px" class="lw">PRODUCTS</div></div>
	<div id="kategori_right"></div>
		<div style="clear: both;"></div>
	<div id="garis_left"></div>	
	<div id="isi_fitur">
<?php if($result_produk){
	foreach($result_produk as $num_row => $row){
		if(($num_row)%3==0 && $num_row>=3){
			echo '<div id="garis_batas_h"></div><div id="garis_batas_h"></div>
				<div id="garis_batas_h"></div>';
		}
?>
		<div id="fitur">
			<div id="fitur_gbr"><a href="<?=base_url()?>./foto_ikan/<?=($row->NamaFoto!="")?$row->NamaFoto:'default.jpg'?>" class="gambar"><img src="<?=base_url()?>./foto_ikan/<?=($row->NamaFoto!="")?$row->NamaFoto:'default.jpg'?>" width="80" height="80" border="0" alt=""></a></div>
			<div id="fitur_ket">
				<div class="item_name"><?=$row->NamaProduk;?></div>
				<div class="item_desc">grade : <?=$row->Kualitas?></div>
				<div class="item_price"><span class="top11">price &nbsp :</span> USD &nbsp <?=$row->HargaKiloan?></div>
				<div style="padding-bottom: 5px"><a href="<?=site_url("produk/detail_produk/".$row->KodeProduk)?>" class="info"><img src="<?=base_url()?>system/application/views/template_web/images/but_info.gif" width="53" height="23" border="0" alt=""></a>
				<a href="<?=site_url("shoping_cart/add/".$row->KodeProduk)?>" class='add_cart'><img src="<?=base_url()?>system/application/views/template_web/images/but_buy.gif" width="55" height="23" border="0" alt=""></a></div>
			</div>
		</div>
		
<?php
		if(($num_row+1)%3 != 0){
			echo '<div id="garis_batas_v"></div>';
		}	
	};
		if($num_row%2==0){
			echo '<div style="clear: both;"></div>';
		}
?>
		<div style="clear: both;"></div>
		<div class="pagination">
<?=$this->pagination->create_links()?>
		</div>
<?php
	}else{
?>
		</br>
		<center>
		</br>
		<table align="center" style="width:80%; font-size:15px; " border="0">
		<tr bgcolor="#e5f8f4"><td colspan='4'><center> -- &nbsp There is no product match with the search criteria &nbsp -- </center></td></tr>
		</table>
		</center>
<?php	}
?>
</div>