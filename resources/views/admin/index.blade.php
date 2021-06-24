@extends('layouts.admin')
@section('content')


<div class="chart-container" style="width: 80%; height: 200px; margin: 0 auto;">
    <div style=" height: 360px; width: 360px; float: left; ">
        
        <canvas id="doughnut-chartcanvas-1" ></canvas>
    </div>
   
   <div style=" height: 400px; width: 400px; float: left; ">
    
    <canvas id="myChart"></canvas>

   </div>
</div>

<hr>
@stop

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-doughnutlabel/1.0.0/chartjs-plugin-doughnutlabel.min.js" integrity="sha512-CRPM0Uuq1hBdUyNXpEtWrlYBOx7V7z5kndP32UDUtRaSODFRhZWTrZmn9hfcMBSKQ9mVbZ0LnWgrdJNWa5847A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Post', 'Comment', 'categories'],
            datasets: [{
                label: 'Data of CodeHacking',
                data: [ {{$postCount}}, {{$CommentCount}}, {{$CategoryCount}}], 
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
    <script>
        var ctx1 = $("#doughnut-chartcanvas-1");
        
        
        
        var data1 = {
    labels: ["comment approved", "comment Unapproved", "replies approved", "replies Unapproved"],
    datasets: [
      {
        label: "TeamA Score",
        data: [ {{$commentaprroved}} , {{$commentunaprroved}} , {{$repliesaprroved}} ,  {{$repliesunaprroved}} ],
        backgroundColor: [
          "#DEB887",
          "#A9A9A9",
          "#DC143C",
          "#F4A460"
        ],
        borderColor: [
          "#CDA776",
          "#989898",
          "#CB252B",
          "#E39371"
        ],
        borderWidth: [1, 1, 1, 1]
      }
    ]
  };
  //options
  var options = {
    responsive: true,
    title: {
      display: true,
      position: "top",
      text: "Doughnut Chart",
      fontSize: 18,
      fontColor: "#111"
    },
    legend: {
      display: true,
      position: "bottom",
      labels: {
        fontColor: "#333",
        fontSize: 16
      }
    }
  };
  var chart1 = new Chart(ctx1, {
    type: "doughnut",
    data: data1,
    options: options
  });

    </script>
@stop