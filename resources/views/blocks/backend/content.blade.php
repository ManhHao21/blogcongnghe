
@extends('layouts.backend');
@section('head')
  
@endsection
@section('content')
<style>
#container {
  width: inherit;
}


.highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: inherit;
  margin: 1em auto;
}
.highcharts-title {
    font-size: 20px;
}
#datatable {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

#datatable caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

#datatable th {
  font-weight: 600;
  padding: 0.5em;
}

#datatable td,
#datatable th,
#datatable caption {
  padding: 0.5em;
}

#datatable thead tr,
#datatable tr:nth-child(even) {
  background: #f8f8f8;
  
}

#datatable tr:hover {
  background: #f1f7ff;
}
</style>
<body>
    

<figure class="highcharts-figure">
<div id="container"></div>
<table id="datatable">
    <thead>
    <tr>
        <th></th>
        <th>số bài viết</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($postsCountByCategory as $post )
    <tr>
        <th>{{$post ->name}}</th>
        <td>{{$post->count}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</figure>
<script>
Highcharts.chart('container', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Biểu đồ số lượng bài viết'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        allowDecimals: false,
        title: {
        text: 'Amount'
        }
    }
    });
</script><script src="https://code.highcharts.com/highcharts.js"></script>
@endsection

</body>
</html>