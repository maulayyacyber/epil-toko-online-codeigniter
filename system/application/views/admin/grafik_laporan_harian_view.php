<script src="<?=base_url()?>system/application/js/highchart/js/highcharts.js"></script>
<?php
	$total_penjualan =$total_pembelian = 0;
	$tanggal=$series="";
	foreach($result_grafik_laporan_harian as $tgl=>$row){
		$laba = $row["penjualan"] - $row["pembelian"];
		$tanggal = $tanggal."'".$tgl."',";
		$series = $series.$laba.",";
	}
	$tanggal = substr($tanggal,0,strlen($tanggal)-1);
	$series = substr($series,0,strlen($series)-1);
?>
<script>
var chart1; // globally available
$(document).ready(function() {

     chart1 = new Highcharts.Chart({

         chart: {

            renderTo: 'statistik',

            type: 'spline'

         },

         title: {

            text: 'Grafik Laporan Bulanan',

         },

         xAxis: {

            categories: [<?=$tanggal?>],
			title: {

               text: 'Tanggal'

            }
			
         },

         yAxis: {
            title: {

               text: 'Laba'
            }

         },

         series: [{
			name : "laba",
			data : [<?=$series?>]
		}]
		
      });
	  
   });
</script>
<div id="statistik" style="margin-top:50px"></div>