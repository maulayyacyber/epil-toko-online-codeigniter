<div id="kategori_left"></div>
<div id="kategori_middle_left"><div style="padding: 9px 0px 0px 7px" class="lb">TRANSACTION HISTORY</div><div style="padding: 9px 0px 0px 7px" class="lw">TRANSACTION HISTORY</div></div>
	<div id="kategori_right"></div>
		<div style="clear: both;"></div>
	<div id="garis_left"></div>	
	<div id="isi_fitur">
<?php
	if(!isset($_SESSION['kode_user'])){
		}else{
	?>
		<div id="cart">
		</br>
			<center>
			<table align="center" style="width:80%; font-size:15px; " border="0">
			<tr bgcolor="#e5f8f4"><td colspan='4'><center> -- &nbsp There is no history for your account &nbsp -- </center></td></tr>
			</table>
			</center>
		<?php
			}
		?>
		</div>
	</div>