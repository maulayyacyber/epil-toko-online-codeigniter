<link rel="stylesheet" href="<?=base_url()?>system/application/js/colorbox/css/colorbox.css" type="text/css">
<script type="text/javascript" src="<?=base_url()?>system/application/js/colorbox/js/jquery.colorbox-min.js"></script>
<script>
	$(document).ready(function(){
		$('.info').colorbox();
	});
</script>
<div id="kategori_left"></div>
<?php
	$data = $result_statik[0];
?>
<div id="kategori_middle_left">
	<div style="padding: 9px 0px 0px 7px" class="lb"><?=$data->NamaMenu?></div>
	<div style="padding: 9px 0px 0px 7px" class="lw"><?=$data->NamaMenu?></div>
</div>
<div id="kategori_right"></div>
<div style="clear: both;"></div>
<div id="isi_fitur">
<div id="cart2">
	<?=$data->IsiMenu?>
</div>
</div>