<script>
$(document).ready(function(){
	$.colorbox.resize();
	$("#tutup").click(function(){
		$.colorbox.close();
		return false;
	});
});
</script>
<div>
	<b>Transaksi telah sukses dilakukan</b>
	<input type="button" name="close" value="OK" id="tutup">
</div>