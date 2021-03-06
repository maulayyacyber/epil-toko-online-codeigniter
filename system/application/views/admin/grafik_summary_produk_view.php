<script src="<?=base_url()?>system/application/js/highchart/js/highcharts.js"></script>
<?php if($result_grafik_summary_produk){
	$TotalJual=0;
	foreach($result_grafik_summary_produk as $Produk){
		$TotalJual = $TotalJual+$Produk->JumlahJual;
	}
	$str ="";
	foreach($result_grafik_summary_produk as $num_row => $row){
		$str .= '["'.$row->NamaProduk.'",'.round($row->JumlahJual/$TotalJual*100,2,PHP_ROUND_HALF_UP).'],';
	}
	$str = substr($str,0,strlen($str)-1);
?>
<script>
var chart;
$(document).ready(function() {
   chart = new Highcharts.Chart({
      chart: {
         renderTo: 'statistik',
         plotBackgroundColor: null,
         plotBorderWidth: null,
         plotShadow: false
      },
      title: {
         text: 'Prosentase frekuensi penjualan produk </br>'
      },
      tooltip: {
         formatter: function() {
            return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
         }
      },
      plotOptions: {
         pie: {
			allowPointSelect: true,
			cursor: 'pointer',
			dataLabels: {
				enabled: true,
				distance:50,
				color: '#000000',
				formatter: function() {
					return '<b>'+ this.point.name +'</b>';
				}
			}
		}
      },
       series: [{
         type: 'pie',
         name: 'Browser share',
         data: [<?=$str?> 
		 ]
		}]
   });
});
</script>
<div id="statistik" style="margin-top:50px"></div>
<?php }?>