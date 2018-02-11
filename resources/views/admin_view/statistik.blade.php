@extends("layout")
@section("title","Statistik")
@section("content")
	
  	@if(empty($tahun))
			<?php $thn = date("Y"); ?>
		@else
			<?php $thn = $tahun; ?>
		@endif
		<form method="get" action="{{URL::to('admin/')}}" id="formku">
				<select name="tahun" class="form-control" id="tahun">
					<option value="">-Choose Year-</option>
					@for($i=date("Y");$i>=1990;$i--)
						<option value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
			</form>
   
    	<div id="container_ads"></div>
    	<script type="text/javascript">
		Highcharts.chart('container_ads', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Fish Caught Statistic'
    },
    subtitle: {
        text: '{{Fungsi::$namaWebsite}}'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Agt',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Caught (Kg)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} Pcs</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },

    series: [
    
   
    {
        name: 'Total Fish Caught',
        data: [
        {{Detail_caught::jumlah_transaksi($thn."-01")}}, 
        {{Detail_caught::jumlah_transaksi($thn."-02")}}, 
        {{Detail_caught::jumlah_transaksi($thn."-03")}}, 
        {{Detail_caught::jumlah_transaksi($thn."-04")}}, 
        {{Detail_caught::jumlah_transaksi($thn."-05")}}, 
       	{{Detail_caught::jumlah_transaksi($thn."-06")}}, 
        {{Detail_caught::jumlah_transaksi($thn."-07")}}, 
        {{Detail_caught::jumlah_transaksi($thn."-08")}}, 
		    {{Detail_caught::jumlah_transaksi($thn."-09")}}, 
       	{{Detail_caught::jumlah_transaksi($thn."-10")}}, 
        {{Detail_caught::jumlah_transaksi($thn."-11")}}, 
        {{Detail_caught::jumlah_transaksi($thn."-12")}}, 
        ]
    },
   

    ],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
	</script>
   
    
  
  <script type="text/javascript">
		$(document).ready(function(){
			$("#tahun").change(function(){
				
					$("#formku").submit();
				
			});
		});
	</script>
@endsection