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
        data.addColumn('string','Month');
        data.addColumn('number','Vouchers');
        data.addRows([<?php echo $monthly['data'] ?>]);
        var options = {
            title: 'Monthly'
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
        chart.draw(data, options);
        
        
        var data2 = new google.visualization.DataTable();
        data2.addColumn('string','Day');
        data2.addColumn('number','Vouchers');
        data2.addRows([<?php echo $daily['data'] ?>]);
        var options2 = {
            title: 'Daily'
        };
        var chart2 = new google.visualization.ColumnChart(document.getElementById('chart2'));
        chart2.draw(data2, options2);
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
