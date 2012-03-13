<div class="row">
    <div class="span12">
        <div class="row">
            <div class="span12">
                <h3>Airlines</h3>
                <div class="alert">
                    <h5>Hello <?php echo $user_data['fullname'] ?></h5>
                    <p>your last login was on <strong><?php echo date('Y-m-d H:i', $this->session->userdata('old_last_login')) ?></strong></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <h3><a href="#" class="btn btn-small btn-info" id="btn-notify">Notification</a></h3>
                <hr />
                <table class="table table-striped table-bordered table-condensed  hide" id="tbl-list-records">
                    <thead>
                        <tr>
                            <th>Airlines</th>
                            <th>User</th>
                            <th>Time</th>
                            <th>Notification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logs['data'] as $r): ?>
                            <tr style="">
                                <td class="span3"><?php echo $r->airlines_name ?> </td>
                                <td class="span2"><?php echo $r->fullname ?> </td>
                                <td class="span2"><?php echo $r->created_at ?> </td>
                                <td><?php echo $r->log_text ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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
        data.addColumn('string', 'Airlines');
        data.addColumn('number', 'Total Pax');
        data.addRows([
<?php foreach ($pie as $r): ?>
                ['<?php echo $r->airlines_name ?>',    <?php echo $r->total_pax ?>],
<?php endforeach; ?>
        ]);
        var data2 = new google.visualization.DataTable();
        data2.addColumn('string', 'Type');
        data2.addColumn('number', 'Total Pax');
        data2.addRows([
<?php foreach ($pie_type as $r): ?>
                ['<?php echo $r->voucher_type ?>',    <?php echo $r->total_pax ?>],
<?php endforeach; ?>
        ]);

        var options = {
            title: 'Voucher Distributes by Airlines'
        };
        var options2 = {
            title: 'Voucher Distributes by Type'
        };


        var chart = new google.visualization.PieChart(document.getElementById('chart'));
        var chart2 = new google.visualization.PieChart(document.getElementById('chart2'));
        
        chart.draw(data, options);
        chart2.draw(data2, options2);


    }
</script>

<div class="row">
    <div class="span4">
        <h3>Voucher Distributed By Airlines</h3>
        <div id="chart"></div>
        <p>
            <a href="<?php echo site_url('graph/all_airlines')?>">View Detail Graph</a>
        </p>
    </div>
    <div class="span4">
        <h3>Voucher Distributed By Types</h3>
        <div id="chart2"></div>
        <p>
            <a href="<?php echo site_url('graph/all_airlines')?>">View Detail Graph</a>
        </p>
    </div>

    <div class="span4">
        <h3>View Graph By Airlines</h3>
        <div class="row">
            <div class="span4">
                <ol>
                    <?php foreach ($dbairlines as $r): ?>
                        <li><a href="<?php echo site_url('graph/per_airlines/' . $r->id) ?>"><?php echo $r->airlines_name ?></a></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</div>
