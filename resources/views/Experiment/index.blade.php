<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
<style type="text/css">
BODY {
    width: 550PX;
}

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<!-- <script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


</head>body>
    <div id="chart-container">
        <canvas id="mycanvas"></canvas>
    </div>

<script type="text/javascript">
$(document).ready(function(){
  $.ajax({
    url: "api/getData",
    method: "GET",
    success: function(data, data2) {
      console.log(data, data2);
      // var time = [];
   
      var today = new Date();
      var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      var time = today.getHours()+":"+today.getMinutes()+":"+today.getSeconds();

      // var label = ["10:30:12","10:30:13","10:30:14","10:30:15","10:30:16","10:30:17"];
      var ctx = $("#mycanvas");

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:JSON.parse(label),
        datasets: [{
            label: 'Suhu',
            data: JSON.parse(data),
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
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
       
    },
    error: function(data) {
      console.log(data);
    }
  });

  // var label = ["10:30:12","10:30:13","10:30:14"];


  // setInterval(
  //   function addData(chart, label, data) {
  //     // var data = Math.round(Math.random()*100);
  //     chart.data.labels.pop();
  //     chart.data.datasets.forEach((dataset) => {
  //       dataset.data.pop();
  //     });
  //     chart.update();
  //   }
  // , 3000)
});
</script>