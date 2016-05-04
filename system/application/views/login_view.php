<?php
if(isset($_SESSION['username'])){
	if($_SESSION['level']=='pelanggan'){?>
		<div id="logout"></br>
		<center>
		<?php echo "hello ".$_SESSION['username']." , please press here to ".anchor("home/logout","[LOGOUT]");
		?>
		</center>
		</div>
	<?php
	}else{?>
		<div id="logout"></br>
		<center>
		<?php echo "hello ".$_SESSION['username']." , please press here to back ".anchor("admin/pegawai","[ADMIN MENU]") ;
		?>
		</center>
		</div>
	<?php
		}
}else{
?>
<script type="text/javascript">
$(document).ready(function () {	
	$('#username').focus(function(){
		$('#username').css('background','#fff');
	});
	
	$('#username').blur(function(){
		$('#username').val($.trim($('#username').val()));
		if($('#username').val()!=''){
			$('#username').css('background','#fff');
		}else{
			$('#username').css('background','#fff url(<?php echo base_url();?>system/application/views/template_web/images/username.jpg) no-repeat');
		}
	});
	
	$('#password').focus(function(){
		$('#password').css('background','#fff');
	});
	
	$('#password').blur(function(){
		$('#password').val($.trim($('#password').val()));
		if($('#password').val()!=''){
			$('#password').css('background','#fff');
		}else{
			$('#password').css('background','#fff url(<?php echo base_url();?>system/application/views/template_web/images/password.jpg) no-repeat');
		}
	});
	
	$('#username').val($.trim($('#username').val()));
	$('#password').val($.trim($('#password').val()));
	
	if($('#username').val()!=''){
		$('#username').focus();
	}else{
		$('#username').blur();
	}
	
	if($('#password').val()!=''){
		$('#password').focus();
	}else{
		$('#password').blur();
	}
});
</script>

<form method='post' action="<?=site_url('home/login')?>" align="right" style="margin 5px 0px 5px 0px" style="pading 5px 0px 5px 0px">

<div style= "text-align: right; float:left" >
	<div style= "text-align: left; font-family: Arial; font-size: 15px; color: #46484A; font-weight: 100; margin: 0px 0px 0px 0px; padding: 0px 0px 0px 0px ">
	&nbsp &nbsp 
	<!--<a href="# <?=site_url('account/add_account')?>" class="tetap">New account ?</a>-->
	</div>	
	<input class="small-input" type="text" id="username" name="username" size="60" maxlength="256" class="search" value="">
	<input class="small-input" id="password" name="password" type="password" size="60" maxlength="256" class="search" value="">
	<input type="submit" name="submit" value="" class="login">
</div>
<div style= "text-align: center;">
</div>
</form>
<?php
	}
?>