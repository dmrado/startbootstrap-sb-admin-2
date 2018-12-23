</div>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<!--<div id="piechart" style="width: 700px; height: 500px; position: relative"></div>-->

<!--<script>

  /*  var airChart = document.createElement('');
    airChart.setAttribute('id', 'air');
    airChart.style.cssText = 'width: 500px; height: 400px'
    document.getElementById('wrapper').appendChild(airChart);
*/

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work',     11],
            ['Eat',      2],
            ['Commute',  2],
            ['Watch TV', 2],
            ['Sleep',    7]
        ]);

        var options = {
            title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>-->

</body>
</html>