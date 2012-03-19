<div class="row">
    <div class="span12">
        <h3>Flight Data Order By Flight Date</h3>
        <hr/>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Flight Number</th>
                    <th>Date</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Status</th>

                    <th>STD</th>
                    <th>ETD</th>
                    <th>Reason</th>
                    <th>Req Time</th>

                    <th>Req By</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vouchers['data'] as $r): ?>
                    <tr style="font-size: 11px">
                        <td><h6><?php echo anchor('release/detail/' . $r->id, $r->flight_number) ?></h6></td>
                        <td style="width:100px"><?php echo $r->flight_date ?></td>
                        <td style="width:100px"><?php echo $r->departure_city ?></td>
                        <td style="width:100px"><?php echo $r->arrival_city ?></td>
                        <td  style="width:100px"><?php echo $r->voucher_type ?></td>

                        <td class="span1"><?php echo $r->flight_std ?></td>
                        <td class="span1"><?php echo $r->flight_etd ?></td>
                        <td class="span1"><?php echo $r->delay_reason ?></td>
                        <td  style="width:100px"><?php echo $r->voucher_created_at ?></td>

                        <td style="width:100px"><?php the_user($r->user_id) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>

</div>

