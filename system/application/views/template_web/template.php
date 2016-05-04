<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title></title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<script type="text/javascript" src="<?=base_url()?>system/application/js/jquery-1.5.2.min.js"></script>
		<link href="<?=base_url()?>system/application/views/template_web/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript">
			function reload_shoping_cart(){
				$.ajax({
					url:"<?=site_url('shoping_cart/get_shoping_cart_mini')?>",
					success:function(respon){
						$("#shoping_cart_mini").html(respon);
					}
				})
			}
			$(document).ready(function(){
				reload_shoping_cart();
			})
		</script>
	</head>
	<body>
	<div id="wrap">
		<div id="header">
			<div id="header_left"></div>
			<div id="header_right"></div>
		</div>
		<div style="clear: both;"></div>
		<div id="menu">
			<div id="menu_left"></div>
			<div id="menu_middle1">
				<?=$this->load->view("menu_view")?>
			</div>
			<div id="menu_middle2">
				<?=$this->load->view("search_view")?>
			</div>
			<div id="menu_right"></div>
			<div style="clear: both;"></div>
		</div>
		<div id="content">
			<div id="content_left">
				<div id="kategori_left"></div>
				<!--<?=$this->load->view("mini_shoping_cart_view")?>-->
				<div id="shoping_cart_mini"></div>
					
				<div id="kategori_left"></div>
				<div id="kategori_middle"><div style="padding: 9px 0px 0px 7px" class="lb">BEST SELLER</div><div style="padding: 9px 0px 0px 7px" class="lw">BEST SELLER</div></div>
				<div id="kategori_right"></div>
					<div style="clear: both;"></div>
				
				<div id="isi_kategori"><?=$this->load->view("best_seller_view")?></div>
				
					<div style="clear: both;"></div>
				<div id="bottom_left"></div>
				<div id="bottom_middle"></div>
				<div id="bottom_right"></div>
					<div style="clear: both;"></div>
					
				<div id="kategori_left"></div>
				<div id="kategori_middle"><div style="padding: 9px 0px 0px 7px" class="lb">ONLINE CONTACT</div><div style="padding: 9px 0px 0px 7px" class="lw">ONLINE CONTACT</div></div>
				<div id="kategori_right"></div>
					<div style="clear: both;"></div>
				
				<div id="isi_kategori">
<?php 
// if ($_SERVER["HTTP_X_FORWARDED_FOR"]) { 
// $httpvia = "".$_SERVER["HTTP_VIA"].""; 
// $pisah = explode(" ", $httpvia); 
// $muncul = "$pisah[1]"; 
// echo "$muncul 
// ".$_SERVER['REMOTE_ADDR']." 
// ".$_SERVER["HTTP_X_FORWARDED_FOR"].""; 
// } 
// else { 
// $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
// echo "".$_SERVER['REMOTE_ADDR']." 
// ($hostname)"; 
// } 
 ?>
				</br>
				<!--Theres a problem or wanna
				</br> ask more?
				</br>
				</br>
				<a href="<?=site_url('statik/show/3')?>"><img src="<?=base_url()?>system/application/views/template_web/images/iconPhone_34x38.png" width="34" height="38" border="0" alt=""></a>
				</br>
				Call us?-->
				<center>
				<a href="ymsgr:sendIM?pinkylope"><img style="border:none;" src="<?=base_url()?>system/application/views/template_web/images/online.gif"></a>
				<!--<a href="ymsgr:sendIM?pinkylope"><img style="border:none;" src="http://opi.yahoo.com/online?u=pinkylope&amp;amp;m=g&amp;amp;t=14 border='0'" /></a>-->
				</center>
				
<!--				</br>
				<center>
					<a target="_blank" href="http://ymgen.com/chat.php?idne=pinkylope@yahoo.com">
					<img border="0" src="http://opi.yahoo.com/online?u=pinkylope@yahoo.com&m=g&t=2"></a>
				</center>
-->
				</div>
				
					<div style="clear: both;"></div>
				<div id="bottom_left"></div>
				<div id="bottom_middle"></div>
				<div id="bottom_right"></div>
					<div style="clear: both;"></div>
				<!--<div id="top_left"></div>
				<div id="top_middle"></div>
				<div id="top_right"></div>
					<div style="clear: both;"></div>
				
				
				<div id="isi_kategori2"></div>
					<div style="clear: both;"></div>
				<div id="bottom_left"></div>
				<div id="bottom_middle"></div>
				<div id="bottom_right"></div> -->
				
					<div style="clear: both;"></div>
				
			</div>
			<div id="content_right">				
				<?=(isset($content)?$content:'')?>
				
					<div style="clear: both;"></div>
				<div id="bottom_left"></div>
				<div id="bottom_middle_right"></div>
				<div id="bottom_right"></div>
			</div>
			<div style="clear: both;"></div>
		</div>
		<div id="footer">
			<div id="footer_left"></div>
			<div id="footer_middle"></div>
			<div id="footer_right"></div>
				<div style="clear: both;"></div>
			<div class="top11" align="center">Copyright © 2011</div>
			<div class="top11" align="center" style="padding: 0px 0px 10px 0px ">Okti Nindyati J2F006032</div>
		</div>
	</div>
	</body>
</html>