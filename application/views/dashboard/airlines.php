


<div class="row">
    <div class="span4">
        <div id="chart_div"></div>
    </div>
    <div class="span4">
        <div id="chartmingguan"></div>
    </div>
    <div class="span4">
        <div id="chartbulanan"></div>
    </div>
</div>


<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        /**************************/
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Task');
        data.addColumn('number', 'Hours per Day');
        data.addRows([
            
<?php foreach ($graph_harian as $k => $v): ?>
                                        
                ['<?php echo $k ?>',    <?php echo $v ?>],
<?php endforeach; ?>
        ]);

        var options = {
            title: 'Last 3 Days Voucher By Type'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        /**************************/
        
        
        /**************************/
        var datamingguan = new google.visualization.DataTable();
        datamingguan.addColumn('string', 'Type');
        datamingguan.addColumn('number', 'Total Pax');
        datamingguan.addRows([
            
<?php foreach ($graph_bulanan as $k => $v): ?>
                                        
                ['<?php echo $k ?>',    <?php echo $v ?>],
<?php endforeach; ?>
        ]);

        var optionsmingguan = {
            title: 'Last Week Days Voucher By Type'
        };

        var chartmingguan = new google.visualization.PieChart(document.getElementById('chartmingguan'));
        chartmingguan.draw(datamingguan, optionsmingguan);
        /**************************/
        
        
        /**************************/
        var databulanan = new google.visualization.DataTable();
        databulanan .addColumn('string', 'Type');
        databulanan .addColumn('number', 'Total Pax');
        databulanan .addRows([
            
<?php foreach ($graph_mingguan as $k => $v): ?>
                                        
                ['<?php echo $k ?>',    <?php echo $v ?>],
<?php endforeach; ?>
        ]);

        var optbulanan = {
            title: 'Last Month Days Voucher By Type'
        };

        var chartbulanan = new google.visualization.PieChart(document.getElementById('chartbulanan'));
        chartbulanan.draw(datamingguan, optbulanan);
        /**************************/
    }
</script>