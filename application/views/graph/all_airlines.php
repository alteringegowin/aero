<hr/>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">
    $('#tbl-list-records').hide();
    $('#btn-notify').click(function(){
        $('#tbl-list-records').toggle();
    });
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.DataTable();
<?php foreach ($by_airlines['column'] as $r): ?>
            data.addColumn(<?php echo $r ?>);
<?php endforeach; ?>
        data.addRows([<?php echo $by_airlines['data'] ?>]);
        var options = {
            title: 'Yearly',
            legend: {position: 'bottom'},
            titlePosition: 'in', axisTitlesPosition: 'in',
            hAxis: {textPosition: 'in'}, vAxis: {textPosition: 'in'}
        };
        
        var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
        chart.draw(data, options);
        
        
        
        var data2 = new google.visualization.DataTable();
<?php foreach ($monthly['column'] as $r): ?>
            data2.addColumn(<?php echo $r ?>);
<?php endforeach; ?>
        data2.addRows([<?php echo $monthly['data'] ?>]);
        var options2 = {
            title: 'Monthly',
            legend: {position: 'bottom'},
            titlePosition: 'in', axisTitlesPosition: 'in',
            hAxis: {textPosition: 'in'}, vAxis: {textPosition: 'in'}
        };
        
        var chart2 = new google.visualization.ColumnChart(document.getElementById('chart2'));
        chart2.draw(data2, options2);



        
        
        var data3 = new google.visualization.DataTable();
<?php foreach ($weekly['column'] as $r): ?>
            data3.addColumn(<?php echo $r ?>);
<?php endforeach; ?>
        data3.addRows([<?php echo $weekly['data'] ?>]);
        var options3 = {
            title: 'Weekly',
            legend: {position: 'bottom'},
            titlePosition: 'in', axisTitlesPosition: 'in',
            hAxis: {textPosition: 'in'}, vAxis: {textPosition: 'in'}
        };
        
        var chart3 = new google.visualization.ColumnChart(document.getElementById('chart3'));
        chart3.draw(data3, options3);





        
        
        var data4 = new google.visualization.DataTable();
<?php foreach ($daily['column'] as $r): ?>
            data4.addColumn(<?php echo $r ?>);
<?php endforeach; ?>
        data4.addRows([<?php echo $daily['data'] ?>]);
        var options4 = {
            title: 'Daily',
            legend: {position: 'bottom'}
        };
        
        var chart4 = new google.visualization.ColumnChart(document.getElementById('chart4'));
        chart4.draw(data4, options4);






    }
</script>


<div class="row">
    <div class="span12">
        <h6>All Year <?php echo date('Y') ?> Vouchers Data</h6>
        <div id="chart"></div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="span12">
        <h6>Vouchers Data <?php echo date('Y') ?> </h6>
        <div id="chart2"></div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="span12">
        <h6>All  <?php echo date('F') ?>  <?php echo date('Y') ?> Vouchers Data Weekly</h6>
        <div id="chart3"></div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="span12">
        <h6>Daily Vouchers Data in <?php echo date('F') ?></h6>
        <div id="chart4"></div>
    </div>
</div>
<hr/>
