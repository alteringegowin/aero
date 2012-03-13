<div class="row">
    <div class="span12">
        <h3>Flight Data Order By Flight Date</h3>
        <hr/>
        <div class="row">
            <div class="span12" style="padding-bottom: 8px;text-align: right">
                <a href="<?php echo site_url('voucher/add') ?>" class="btn btn-small btn-info">Request Voucher</a>
            </div>
        </div>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Voucher Type</th>
                    <th>Date</th>
                    <th>Flight Number</th>
                    <th>STD</th>
                    <th>ETD</th>
                    <th>Delay Reason</th>
                    <th>Pax Delay</th>
                    <th>Pax Transfer</th>
                    <th>Pax Canceled</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vouchers['data'] as $r): ?>
                    <tr>
                        <td class="span2"><?php echo $r->voucher_type ?></td>
                        <td class="span2"><?php echo $r->flight_date ?></td>
                        <td class="span4">
                            <p>
                                <strong><?php echo $r->flight_number ?></strong><br/>
                                <small><?php echo $r->departure_city ?> - <?php echo $r->arrival_city ?> </small>
                            </p>
                        </td>
                        <td style="width:10%;"><p><?php echo $r->flight_std ?></p></td>
                        <td style="width:10%;"><p><?php echo $r->flight_etd ?></p></td>
                        <td style="width:10%;"><p><?php echo $r->delay_reason ?></p></td>
                        <td style="width:10%;"><p><?php echo $r->total_pax_delay ?></p></td>
                        <td style="width:10%;"><p><?php echo $r->total_pax_transfer ?></p></td>
                        <td style="width:10%;"><p><?php echo $r->total_pax_cancelled ?></p></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>

</div>

