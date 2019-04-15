<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <title>Document</title>
</head>
<body>

       

        <?php
        use Carbon\Carbon;
        
        
        $users['data'] = DB::table("orders")
                           ->select('order_id')
                           ->whereDate('created_at', '>', Carbon::now()->subDays(30))
                           ->get();
        
        ?>
        
        
        @if( CRUDBooster::isSuperadmin()) 
        
        <div class="container">
          <canvas id="myChart"></canvas>
        </div>
        
        @php
            $data = DB::table('orders')->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(order_total) as views') , DB::raw('count(order_id) as orid'))
              ->groupBy('date')->get();


            
        
        @endphp
        
        <div id="myfirstchart" style="height: 250px;"></div>
        <script>
        new Morris.Line({
          // ID of the element in which to draw the chart.
          element: 'myfirstchart',
          // Chart data records -- each entry in this array corresponds to a point on
          // the chart.
          data: [
                  <?php foreach ($data as $value){
                    echo "{year : '{$value->date}', value:{$value->views} },";
                  }
                  ?>
          ],
          xkey: 'year',
          ykeys: ['value'],
          labels: ['Amount']
        });
        </script>
        
        @endif
</body>
</html>