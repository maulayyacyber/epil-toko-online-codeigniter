<link rel="stylesheet" href="<?=base_url()?>system/application/js/colorbox/css/colorbox.css" type="text/css">
<script type="text/javascript" src="<?=base_url()?>system/application/js/colorbox/js/jquery.colorbox-min.js"></script>
<script type="text/javascript">
$(document).ready(function () {	
	$('#username2').focus(function(){
		$('#username2').css('background','#fff');
	});
	
	$('#username2').blur(function(){
		$('#username2').val($.trim($('#username2').val()));
		if($('#username2').val()!=''){
			$('#username2').css('background','#fff');
		}else{
			$('#username2').css('background','#fff url(<?php echo base_url();?>system/application/views/template_web/images/username.jpg) no-repeat');
		}
	});
	
	$('#password2').focus(function(){
		$('#password2').css('background','#fff');
	});
	
	$('#password2').blur(function(){
		$('#password2').val($.trim($('#password2').val()));
		if($('#password2').val()!=''){
			$('#password2').css('background','#fff');
		}else{
			$('#password2').css('background','#fff url(<?php echo base_url();?>system/application/views/template_web/images/password.jpg) no-repeat');
		}
	});
	
	$('#username2').val($.trim($('#username2').val()));
	$('#password2').val($.trim($('#password2').val()));
	
	if($('#username2').val()!=''){
		$('#username2').focus();
	}else{
		$('#username2').blur();
	}
	
	if($('#password2').val()!=''){
		$('#password2').focus();
	}else{
		$('#password2').blur();
	}
	$('.info').colorbox();
});
</script>

<div id="kategori_left"></div>
<div id="kategori_middle_left"><div style="padding: 9px 0px 0px 7px" class="lb">SHOPING CART</div><div style="padding: 9px 0px 0px 7px" class="lw">SHOPING CART</div></div>
	<div id="kategori_right"></div>
		<div style="clear: both;"></div>
	<div id="garis_left"></div>	
	<div id="isi_fitur">
		<center>
		<div id="shoping_cart">
		<?php echo form_open('shoping_cart/aksi_submit'); ?>
		<div id="header_shoping_cart1"><div style="padding: 9px 0px 0px 7px" class="lw">PRODUCTS</div></div>
		<div id="header_shoping_cart2"><div style="padding: 9px 0px 0px 7px" class="lw">WEIGHT</div></div>
		<div id="header_shoping_cart2"><div style="padding: 9px 0px 0px 7px" class="lw">AMOUNT</div></div>
		<div id="header_shoping_cart2"><div style="padding: 9px 0px 0px 7px" class="lw">PRICE</div></div>
		<div id="header_shoping_cart2"><div style="padding: 9px 0px 0px 7px" class="lw">SUB TOTAL</div></div>
		<div style="clear: both;"></div>
		<table align="center" style="font-size:15px ">
		<?php $i = 1; ?>

		<?php foreach($this->cart->contents() as $items): ?>

			<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
			
			<tr>
			  <td width="205px">
				<?php echo $items['name']; ?>
							
				<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
						
					<p>
						<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
							
							<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
							
						<?php endforeach; ?>
					</p>
					
				<?php endif; ?>
						
			  </td>
			  <td width="80px" style="text-align:center"><?php echo $this->cart->format_number($items['size']); ?>Kg</td>
			  <td width="80px" style="text-align:center"><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '6', 'size' => '4')); ?>Kg</td>
			  <td width="80px" style="text-align:center">USD &nbsp <?php echo $this->cart->format_number($items['price']); ?></td>
			  <td width="80px" style="text-align:center">USD &nbsp <?php echo $this->cart->format_number($items['subtotal']); ?></td>
			  <td width="25px"><a href='<?=site_url('shoping_cart/delete_item/'.$items['rowid'])?>'>
			  <img src="<?=base_url()?>system/application/views/template_admin/resources/images/icons/cross.png" width="16px" height="16px" border="0" alt="">
			  </a></td>
			</tr>

		<?php $i++;	?>
			
		<?php endforeach; ?>
		<tr><td colspan="6">
		<div style="clear: both;"></div>
		<div id="garis_batas_shoping_cart"></div>
		</td></tr>
		<tr>
		  <td colspan="3"> </td>
		  <td class="right"><strong>Total Item</strong></td>
		  <td style="text-align:center"><?php echo $this->cart->total_items(); ?></td>
		</tr>
		
		<tr>
		  <td colspan="3"> </td>
		  <td class="right"><strong>Total</strong></td>
		  <td style="text-align:center">USD &nbsp <?php echo $this->cart->format_number($this->cart->total()); ?></td>
		</tr>
		</table>
		
		</div>
		</center>
		<center></br></br></br>
		
		<?php echo form_submit('submit', '', "class='update'"); ?><!--<input type="submit" name="submit" class="update" value="">-->
		
		<?php
		if(isset($_SESSION['username']) && $_SESSION['level']=='pelanggan'){
		//$options = array('class'=>'checkout');
		//echo form_submit('submit', 'Check Out', $options);
		?>
		<input type="submit" name="submit" class="checkout" value=".">
		<?php
		}else{
			//echo '<input type="submit" name="submit" class="continue" value="">';
			echo '<a href="'.site_url("produk").'"  class="continue"><img src="'.base_url().'system/application/views/template_web/images/but_continue.jpg" width="60" height="23" border="0" alt=""></a>';
		}?>
		</center>
		</br>
		</form>
		<?php
		if(isset($_SESSION['username'])){?>
		<?php
		}else{
		?>
		<div id="garis_batas_shoping_cart" style="margin-left:50px"></div>
		<div id="fitur_left">
			<div id="fitur_left1" style="margin-left:30px">
			Haven't an account yet?</br>
			Please sign up here..
			</div>
			<div style="clear: both;"></div>
			<div id="fitur_left2">
			<a href="<?=site_url('account/add_account')?>"><img src="<?=base_url()?>system/application/views/template_web/images/but_sign_up.jpg" width="200" height="50" border="0" alt=""></a>
			</div>
		</div>
		<div id="garis_batas_v"></div>
		<div id="fitur_right">
			<div id="fitur_right1">
			Already have an account?</br>
			Please login here..
			</div>
			<div style="clear: both;"></div>
			<div id="fitur_right2">
			<form method='post' action="<?=site_url('home/login')?>" align="right" style="margin 5px 0px 5px 0px" style="pading 5px 0px 5px 0px">
			<input class="large-input" type="text" id="username2" name="username" size="100px" maxlength="256" value=""></br></br>
			<input class="large-input" id="password2" name="password" type="password" size="60px" maxlength="256" value=""></br></br>
			<div align='right' style="margin:0px 12px 0px 0px;"><input type="submit" name="submit" value="" class="login"></div>
			</form>
			</div>
			</div>
		<?php
		}
		?>
	</div>
		
		