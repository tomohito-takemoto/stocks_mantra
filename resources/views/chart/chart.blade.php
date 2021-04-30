@extends('layouts.app')

@section('content')
    <div class="chart-container" style="position: relative; width: 100%; height: 300px;">//スマホ対応用のDIV
	    <canvas id="myChart"></canvas>//ここにグラフが挿入されます。
    </div>
    
    <script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['１月', '２月', '３月', '４月', '５月', '６月', '７月'],
			datasets: [{
				label: 'マイグラフ',
				data: [25, 10, 5, 2, 20, 30, 45],
				backgroundColor: 'rgb(255, 99, 132)',
				borderColor: 'rgb(255, 99, 132)'
			}]
		},
		options: {}
	});
    </script>


@endsection