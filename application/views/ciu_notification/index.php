<div id="ciu" class="row">
    <div class="span12">
        <h3>Verification Document</h3>
        <hr/>
        <table class="table table-striped table-bordered table-condensed kecil">
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
                        <td><?php echo $r->log_text ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>

</div>

