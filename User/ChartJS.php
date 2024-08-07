<?php session_start(); ?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<?php include("MenuBar.php"); ?>
<div style="margin-top:70px;">
<center ><div style=" font-size: 40px; font-weight: bold; color: #176B87;">Road Bear</div>
<canvas id="myChart" style="width:100%;max-width:1000px"></canvas></center>
</div>


<script>
  const ctx = document.getElementById('myChart');
  const xValues = ['Style', 'Type', 'Popular', 'Price'];
  const yValues = [85, 90, 95, 81];
  const barColors = ["red", "green","blue","orange"];

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {display: false},
      title: {
      display: true,
      text: "ตารางเปอร์เซ็นความชอบของกลุ่มผู้ใช้ที่ตรงกับร้าน",
      fontSize: 30,
    },
    scales: {
        yAxes: [
                {
                ticks: {
                    min: 0,
                    max: this.max,// Your absolute max value
                    callback: function (value) {
                    return (value / this.max * 100).toFixed(0) + '%'; // convert it to percentage
                        },
                    },
                scaleLabel: {
                    display: true,
                    labelString: 'Percentage',
                    },
                },
        ],
      }
    }
  });
</script>


</body>
</html>
