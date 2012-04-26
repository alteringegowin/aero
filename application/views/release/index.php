<div class="row">
    <div class="span12">
        <h3>Flight Data Order By Flight Date</h3>
        <hr/>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Data Flight </th>
                    <th>Voucher Type</th>
                    <th>Delay Status</th>
                    <th>Voucher Status</th>
                    <th>Request by</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vouchers['data'] as $r): ?>
                    <tr style="font-size: 11px">
                        <td>
                            <h6><i class="icon-plane"></i> <?php echo anchor('release/detail/' . $r->id, $r->flight_number) ?></h6>
                            <p>
                                <small>DATE: <?php echo date('l,j F Y', strtotime($r->flight_date)) ?></small><br/>
                                <small>DEST: <?php echo $r->departure_city ?> - <?php echo $r->arrival_city ?></small><br/>
                                <small>STD/ETD: <?php echo $r->flight_std ?> - <?php echo $r->flight_etd ?></small><br/>
                            </p>
                        </td>

                        <td class="span2"><?php echo $r->voucher_type ?></td>
                        <td class="span2"><?php echo $r->delay_reason ?></td>
                        <td class="span2"><?php the_voucher_status($r) ?></td>
                        <td class="span2"><?php the_user($r->user_id) ?></td>
                        <td class="span2">
                            <a href="<?php echo site_url('release/detail/' . $r->id) ?>" class="btn">view detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>

</div>

