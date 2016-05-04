<div class="tab-content default-tab" id="tab1">
<?php
	echo form_open("admin/laporan_bulanan");
	echo "Pilih Tahun :  ";
	for($i=date('Y');$i>(date('Y')-10);$i--){
		$daftar_tahun[$i] = $i;
	}
	echo form_dropdown('tahun',$daftar_tahun,$this->input->post('tahun'))." ";
?>
<input type="submit" name="submit" class="button" value="submit">
<?php if($this->input->post('tahun')){?>
<div style="float:right;margin:5px 10px 25px 5px;"><a class="button" style="width:85px" target="_blank" href="<?=site_url("admin/laporan_bulanan/cetak_laporan_bulanan/".$this->input->post('tahun'))?>">Cetak Laporan</a></div>
<div style="float:right;margin:5px 10px 25px 5px;"><a class="button" style="width:80px" href="<?=site_url("admin/laporan_bulanan/get_grafik/".$this->input->post('tahun'))?>">Tampil Grafik</a></div>
<?php }?>
</form>
<div class="clear"></div>