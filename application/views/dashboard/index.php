<div class="row">
    <div class="span8">
        <h3>Voucher Notifications</h3>
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Flight Date</th>
                        <th>Flight Number</th>
                        <th>Delay Reason</th>
                        <th>Pax Delay</th>
                        <th>Request Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($flights as $r): ?>
                        <tr>
                            <td class="span2"><?php echo $r->flight_date ?></td>
                            <td class="span4">
                                <h3><?php echo $r->flight_number ?></h3>
                                <p style="">
                                    <label style="font-size: 11px;color:#999;margin-bottom: 0px;">Departure : <?php echo $r->departure_city ?> </label>
                                    <label style="font-size: 11px;color:#999;margin-bottom: 0px;">Arrival : <?php echo $r->arrival_city ?> </label>
                                </p>
                            </td>
                            <td><p><?php echo $r->delay_reason ?></p></td>
                            <td style="width:10%;"><p><?php echo $r->total_pax_delay ?></p></td>
                            <td><?php the_request_status($r) ?></td>
                            <td><?php the_request_option($r) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

    </div>
</div>
