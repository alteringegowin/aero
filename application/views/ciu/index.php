<div id="ciu" class="row">
    <div class="span12">
        <h3>RELEASE</h3>
        <hr/>
        <table class="table table-striped table-bordered table-condensed kecil">
            <thead>
                <tr>
                    <th style="font-align:'center';">Airlines</th>
                    <th>Flight Number</th>
                    <th>Flight Status</th>
                    <th>Delay Reason</th>
                    <th>Voucher Status</th>
                    <th>Request Date</th>
                    <th>Request by</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vouchers['data'] as $r): ?>
                    <tr style="">
                        <td style="width:15%;"><p><?php echo $r->airlines_name ?> </p></td>
                        <td>
                            <h4><i class="icon-plane"></i> <?php echo anchor('ciu/import/' . $r->id, $r->flight_number) ?> </h4>
                            <p>
                                <small>DATE: <?php echo date('l,j F Y', strtotime($r->flight_date)) ?></small><br/>
                                <small>DEST: <?php echo $r->departure_city ?> - <?php echo $r->arrival_city ?></small><br/>
                                <small>STD/ETD: <?php echo $r->flight_std ?> - <?php echo $r->flight_etd ?></small><br/>
                            </p>

                        </td>
                        <td class="span1"><?php echo $r->voucher_type ?> </td>
                        <td class="span1"><?php echo $r->delay_reason ?></td>
                        <td class="span1"><?php voucher_status($r) ?></td>

                        <td style="width:80px"><?php echo $r->voucher_created_at ?></td>
                        <td style="width:100px"><?php the_user($r->user_id) ?></td>
                        <td style="width:100px">
                            <a href="<?php echo site_url('ciu/import/'.$r->id)?>" class="btn">upload PAX</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>
</div>
