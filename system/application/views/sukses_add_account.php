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
<div id="kategori_middle_left"><div style="padding: 9px 0px 0px 7px" class="lb">LOGIN</div><div style="padding: 9px 0px 0px 7px" class="lw">LOGIN</div></div>
<div id="kategori_right"></div>
<div style="clear: both;"></div>
	<div id="isi_fitur">
		<div id="fitur_left">
			<div id="fitur_left1">
			Thanks for join us, </br>
			you may login this form to</br> 
			start shoping. Regards..
			</div>
		</div>
		<div id="garis_batas_v"></div>
		<div id="fitur_right">
			<div id="fitur_right1">
			Already have an account?</br>
			Please login here..
			</div>
			<div style="clear: both;"></div>
			<form method='post' action="<?=site_url('home/login')?>">
			<div id="fitur_right2">
			<input class="large-input" type="text" id="username2" name="username" size="100px" maxlength="256" value=""></br></br>
			<input class="large-input" id="password2" name="password" type="password" size="60px" maxlength="256" value=""></br></br>
			<div align='right' style="margin:0px 12px 0px 0px;"><input type="submit" name="submit" value="" class="login"></div>
			</div>
			</form>
		</div>
	</div>
			
