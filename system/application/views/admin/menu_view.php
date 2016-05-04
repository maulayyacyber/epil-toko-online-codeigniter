<ul id="main-nav">  <!-- Accordion Menu -->
<?php 
switch($_SESSION['level']){
	case 'Admin':
?>
	<li>
		<a href="#" class="nav-top-item <?=($this->uri->segment('2')=='produk'||$this->uri->segment('2')=='pemasok'||$this->uri->segment('2')=='pelanggan'||$this->uri->segment('2')=='pegawai')?'current':''?>">
		Data Master
		</a>
		<ul>
			<li><a class="<?=($this->uri->segment('2')=='pegawai')?'current':''?>" class="<?=($this->uri->segment('2')=='pegawai')?'current':''?>"href="<?=site_url('admin/pegawai')?>">Data Pegawai</a></li>
		</ul>
	</li>
	<li>
		<a href="#" class="nav-top-item <?=($this->uri->segment('2')=='menu')?'current':''?>">
		Pengaturan Menu
		</a>
		<ul>
			<li><a class="<?=($this->uri->segment('2')=='menu')?'current':''?>" href="<?=site_url('admin/menu')?>">Menu Website</a></li>
		</ul>
	</li>
<?php
	break;
	case 'Pegawai' :
?>
	<li>
		<a href="#" class="nav-top-item <?=($this->uri->segment('2')=='produk'||$this->uri->segment('2')=='pemasok'||$this->uri->segment('2')=='pelanggan'||$this->uri->segment('2')=='pegawai')?'current':''?>">
		Data Master
		</a>
		<ul>
			<li><a class="<?=($this->uri->segment('2')=='produk')?'current':''?>" href="<?=site_url('admin/produk')?>">Data Produk</a></li>
			<li><a class="<?=($this->uri->segment('2')=='pemasok')?'current':''?>" href="<?=site_url('admin/pemasok')?>">Data Pemasok</a></li>
			<li><a class="<?=($this->uri->segment('2')=='pelanggan')?'current':''?>" href="<?=site_url('admin/pelanggan')?>">Data Pelanggan</a></li>
		</ul>
	</li>
	<li>
		<a href="#" class="nav-top-item <?=($this->uri->segment('2')=='penjualan'&&$this->uri->segment('3')==''||$this->uri->segment('3')=='penjualan_pesan'||$this->uri->segment('3')=='penjualan_beli'||$this->uri->segment('3')=='penjualan_cancel')?'current':''?>">
		Transaksi Penjualan
		</a>
		<ul>
			<li><a class="<?=($this->uri->segment('2')=='penjualan'&&$this->uri->segment('3')=='')?'current':''?>" href="<?=site_url('admin/penjualan')?>">Transaksi Penjualan</a></li>
			<li><a class="<?=($this->uri->segment('3')=='penjualan_pesan')?'current':''?>" href="<?=site_url('admin/penjualan/penjualan_pesan')?>">Transaksi Pesan</a></li>
			<li><a class="<?=($this->uri->segment('3')=='penjualan_beli')?'current':''?>" href="<?=site_url('admin/penjualan/penjualan_beli')?>">Transaksi Beli</a></li>
			<li><a class="<?=($this->uri->segment('3')=='penjualan_cancel')?'current':''?>" href="<?=site_url('admin/penjualan/penjualan_cancel')?>">Transaksi Cancel</a></li>
		</ul>
	</li>
	<li>
		<a href="#" class="nav-top-item <?=($this->uri->segment('2')=='pembelian')?'current':''?>">
		Transaksi Pembelian
		</a>
		<ul>
			<li><a class="<?=($this->uri->segment('2')=='pembelian')?'current':''?>" href="<?=site_url('admin/pembelian')?>">Transaksi Pembelian</a></li>
		</ul>
	</li>
<?php
	break;
	case 'Manajer':
?>
	<li>
		<a href="#" class="nav-top-item <?=($this->uri->segment('2')=='laporan_harian'||$this->uri->segment('2')=='laporan_bulanan'||$this->uri->segment('2')=='laporan_harian'||$this->uri->segment('2')=='analisa')?'current':''?>">
		Laporan
		</a>
		<ul>
			<li><a class="<?=($this->uri->segment('2')=='laporan_harian')?'current':''?>" href="<?=site_url('admin/laporan_harian')?>">Laporan Bulanan</a></li>
			<li><a class="<?=($this->uri->segment('2')=='laporan_bulanan')?'current':''?>" href="<?=site_url('admin/laporan_bulanan')?>">Laporan Tahunan</a></li>
		</ul>
	</li>
	<li>
		<a href="#" class="nav-top-item <?=($this->uri->segment('2')=='summary_produk'||$this->uri->segment('2')=='summary_pemasok')?'current':''?>">
		Summary
		</a>
		<ul>
			<li><a class="<?=($this->uri->segment('2')=='summary_produk')?'current':''?>" class="<?=($this->uri->segment('2')=='summary_produk')?'current':''?>"href="<?=site_url('admin/summary_produk')?>">Summary Produk</a></li>
			<li><a class="<?=($this->uri->segment('2')=='summary_pemasok')?'current':''?>" class="<?=($this->uri->segment('2')=='summary_pemasok')?'current':''?>"href="<?=site_url('admin/summary_pemasok')?>">Summary Pemasok</a></li>
		</ul>
	</li>
<?php
	break;
}
?>
</ul> <!-- End #main-nav -->