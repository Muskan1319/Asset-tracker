@extends('dashboard')
<!doctype html>
<html lang="en">
  <head> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.DataTable();
         data.addColumn('string', 'Topping');
         data.addColumn('number', 'Active');
        data.addRows([
         <?php echo $chartData; ?>
        ]);

        var barchart_options = {title:'Number of Asset ',
            is3D:true
        };
           
        var chart = new google.visualization.BarChart(document.getElementById('barchart'));

      chart.draw(data, barchart_options);
    }
    </script>
</head>

<body>
    
@section('Muskan')
    <div id="barchart" style="width: 700px; height: 500px;margin-left:70px;"></div>
    @endsection
</body>
</html>