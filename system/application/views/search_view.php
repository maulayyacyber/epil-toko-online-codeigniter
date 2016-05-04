<script type="text/javascript">
$(document).ready(function () {	
	$('#search_produk').focus(function(){
		$('#search_produk').css('background','#fff');
	});
	
	$('#search_produk').blur(function(){
		$('#search_produk').val($.trim($('#search_produk').val()));
		if($('#search_produk').val()!=''){
			$('#search_produk').css('background','#fff');
		}else{
			$('#search_produk').css('background','#fff url(<?php echo base_url();?>system/application/views/template_web/images/search.jpg) no-repeat');
		}
	});
	
	$('#search_produk').val($.trim($('#search_produk').val()));
	
	if($('#search_produk').val()!=''){
		$('#search_produk').focus();
	}else{
		$('#search_produk').blur();
	}
});
</script>

<form action="<?=site_url("search")?>" method='post'>
<div id="search"><input class="search-input" id="search_produk" type="text" name="search" size="17" maxlength="256" class="search" value=""></div>
<div id="go"><input type="submit" class="go" border="0" width="38" height="28" alt="" value=""></div>
</form>