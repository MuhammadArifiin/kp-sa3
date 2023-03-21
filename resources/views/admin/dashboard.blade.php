@extends('layouts.adminApp')

@section('content')
<div class="row justify-content-end">
    <div class="col-md-12">
        <a href="{{ url('/admin/dashboard/download') }}" class="btn btn-md btn-success mb-2">Download Panduan Pengguna</a>
    </div>
</div>
<div class="row justify-content-center my-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
                You are a Admin User.
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div id="grafik_total_antrian_perhari">
        </div>
    </div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var jumlah = <?php echo json_encode ($jumlah_antrian) ?>;
    var hari = <?php echo json_encode ($hari) ?>;
    
    Highcharts.chart('grafik_total_antrian_perhari', {
        title : {
            text : 'Grafik Pengambilan Jas Almamater'
        },
        xAxis : {
            categories : hari
        },
        yAxis : {
            title : {
                text : 'Jumlah Antrian Pengambilan Jas Almamater'
            }
        },
        plotOptions : {
            series : {
                allowPointSelect : true
            },           
        },
        series : [
            {
                name : 'Banyak Pengambilan',
                data : jumlah 
            } 
        ]
    });
</script>
@endsection