<script>
	$(document).ready(function(){
		$('.info').colorbox();
	});
</script>
<?php 
$result_best_seller = $this->detail_penjualan_model->best_seller();
foreach($result_best_seller as $num_row=>$row){
?>
<div class="lmenu">
	<img src="<?=base_url()?>system/application/views/template_web/images/ico2.gif" width="7" height="5" border="0" alt="" hspace="6">
	<a href="<?=site_url("produk/detail_produk/".$row->KodeProduk)?>" class="info"><?=$row->NamaProduk?></a>
</div>

<div><img src="<?=base_url()?>system/application/views/template_web/images/line_h2.gif" width="186" height="1" border="0" alt=""></div>
<?php	
	}
?>