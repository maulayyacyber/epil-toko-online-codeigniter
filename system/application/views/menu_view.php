<div id="isi_menu"><a href="<?=site_url("home")?>" class="aw"><center>Home</center></a></div>
<div id="batas_menu"></div>
<div id="isi_menu"><a href="<?=site_url("produk")?>" class="aw"><center>Product</center></a></div>
<div id="batas_menu"></div>
<div id="isi_menu"><a href="<?=site_url("shoping_cart")?>" class="aw"><center>Shoping Cart</center></a></div>
<div id="batas_menu"></div>
<?php
if(isset($_SESSION['username'])&&($_SESSION['level']=='pelanggan')){?>
<div id="isi_menu"><a href="<?=site_url("account")?>" class="aw"><center>Account</center></a></div>
<div id="batas_menu"></div>
<div id="isi_menu"><a href="<?=site_url("history")?>" class="aw"><center>History</center></a></div>
<div id="batas_menu"></div>
<?php
	}else{
	}
	
	$menu = $this->menu_model->get_menu_aktif();
	foreach ($menu as $row){
		echo "<div id='isi_menu'>".anchor("statik/show/".$row->KodeMenu,$row->NamaMenu,"class='aw'")."</div><div id='batas_menu'></div>";
	}
?>
<?php
if(isset($_SESSION['username']) && ($_SESSION['level']=='pelanggan')){?>
	<div id="isi_menu"><a href="<?=site_url("home/logout")?>" class="aw"><center>Logout</center></a></div>
	<div id="batas_menu"></div>
<?php
}else{
	if(isset($_SESSION['username']) && ($_SESSION['level']=='Admin'||$_SESSION['level']=='Pegawai'||$_SESSION['level']=='Manajer')){
	}
	else{
?>
	<div id="isi_menu"><a href="<?=site_url("menu_login")?>" class="aw"><center>Login</center></a></div>
	<div id="batas_menu"></div>
<?php
	}
}
?>
