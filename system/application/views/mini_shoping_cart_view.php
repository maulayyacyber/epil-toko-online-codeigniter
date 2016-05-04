<div id="kategori_middle"><div style="padding: 9px 0px 0px 7px" class="lb">SHOPING CART</div><div style="padding: 9px 0px 0px 7px" class="lw">SHOPING CART</div></div>
<div id="kategori_right"></div>
	<div style="clear: both;"></div>
<div id="isi_kategori2">
	<div class="shoping_cart">Now you have,</div>
	<div id="icon_mini_shoping_cart">
	<img src="<?=base_url()?>system/application/views/template_web/images/sc.gif?>" width="40" height="34" border="0" alt="">
	</div>
	<div id="isi_mini_shoping_cart"><?= $this->cart->total_items(); ?> items</div>
	<div style="clear: both;"></div>					
	<div id="icon_mini_shoping_cart">
	<img src="<?=base_url()?>system/application/views/template_web/images/dollar.jpg?>" width="40" height="34" border="0" alt="">
	</div>
	<div id="isi_mini_shoping_cart"><?=$this->cart->format_number($this->cart->total()); ?></div>
</div>

	<div style="clear: both;"></div>
<div id="bottom_left"></div>
<div id="bottom_middle"></div>
<div id="bottom_right"></div>
<div style="clear: both;"></div>