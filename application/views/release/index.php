<div class="row">
    <div class="span12">
        <div class="page-header">
            <h1>Data Voucher Release</h1>
        </div>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Flight Number</th>

                    <th>Reason</th>
                    <th>Req Time</th>

                    <th>Delay</th>
                    <th>Transfer</th>
                    <th>Reroute</th>
                    <th>Canceled</th>
                    <th>Req By</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vouchers['data'] as $r): ?>
                    <tr>

                        <td class="span1"><span class="label"><?php echo $r->voucher_type ?></span></td>
                        <td>
                            <h6><i class="icon-plane"></i> <?php echo anchor('release/detail/' . $r->id, $r->flight_number) ?></h6>
                            <p>
                                <small>DATE: <?php echo date('l,j F Y', strtotime($r->flight_date)) ?></small><br/>
                                <small>DEST: <?php echo $r->departure_city ?> - <?php echo $r->arrival_city ?></small><br/>
                                <small>STD/ETD: <?php echo $r->flight_std ?> - <?php echo $r->flight_etd ?></small><br/>

                            </p>
                        </td>

                        <td style="width:120px;"><?php echo $r->delay_reason ?></td>
                        <td style="width:120px;"><?php echo $r->voucher_created_at ?></td>

                        <td style="width:40px;text-align: center;"><span class="badge badge-success"><?php echo $r->total_pax_delay ?></span></td>
                        <td style="width:40px;text-align: center;"><span class="badge badge-warning"><?php echo $r->total_pax_transfer ?></span></td>
                        <td style="width:40px;text-align: center;"><span class="badge badge-info"><?php echo $r->total_pax_reroute ?></span></td>
                        <td style="width:40px;text-align: center;"><span class="badge badge-inverse"><?php echo $r->total_pax_cancelled ?></span></td>
                        <td class="span1"><?php the_user($r->user_id) ?></td>
                        <td class="span1">
                            <a rel="tooltip" data-original-title="print all voucher" class="btn btn-small btn-info" href="<?php echo site_url('release/print_voucer_all/' . $r->id) ?>"><i class="icon-print icon-white"></i> </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>

</div>

