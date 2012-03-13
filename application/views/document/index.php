<div class="row">
    <div class="span12">
        <h3>Document Upload for Flight Data (Order By Flight Date)</h3>
        <hr/>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>

                    <th colspan="3" style="text-align: center;border-bottom: solid 1px #ccc;">Total Pax</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
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

                    <th>Delay</th>
                    <th>Transfer</th>
                    <th>Canceled</th>
                    <th>Req By</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vouchers['data'] as $r): ?>
                    <tr style="font-size: 11px">
                        <td class="span1"><?php echo anchor('release/detail/' . $r->id, $r->flight_number) ?></td>
                        <td class="span1"><?php echo anchor('release/detail/' . $r->id, $r->flight_date) ?></td>
                        <td class="span1"><?php echo anchor('release/detail/' . $r->id, $r->departure_city) ?></td>
                        <td class="span1"><?php echo anchor('release/detail/' . $r->id, $r->arrival_city) ?></td>
                        <td class="span1"><?php echo anchor('release/detail/' . $r->id, $r->voucher_type) ?></td>

                        <td class="span1"><?php echo anchor('release/detail/' . $r->id, $r->flight_std) ?></td>
                        <td class="span1"><?php echo anchor('release/detail/' . $r->id, $r->flight_etd) ?></td>
                        <td class="span1"><?php echo anchor('release/detail/' . $r->id, $r->delay_reason) ?></td>
                        <td class="span1"><?php echo anchor('release/detail/' . $r->id, $r->voucher_created_at) ?></td>

                        <td style="width:40px;text-align: center;"><?php echo anchor('document/detail/' . $r->id, $r->total_pax_delay) ?></td>
                        <td style="width:40px;text-align: center;"><?php echo anchor('document/detail/' . $r->id, $r->total_pax_transfer) ?></td>
                        <td style="width:40px;text-align: center;"><?php echo anchor('document/detail/' . $r->id, $r->total_pax_cancelled) ?></td>
                        <td class="span1"><?php the_user($r->user_id) ?></td>
                        <td class="span1">
                            <a rel="tooltip" data-original-title="Document Upload" class="btn btn-small btn-info" href="<?php echo site_url('document/add/' . $r->id) ?>"><i class="icon-file icon-white"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>

</div>

