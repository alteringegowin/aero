<div id="ciu" class="row">
    <div class="span12">
        <h3>Progress Monitoring</h3>
        <hr/>
        <table class="table table-striped table-bordered table-condensed kecil">
            <thead>
                <tr>
                    <th style="font-align:'center';">Req at</th>
                    <th>Flight Number</th>
                    <th>Departure</th>
                    <th>Date</th>
                    <th>Voucher Type</th>
                    <th>Status Voucher</th>
                    <th>Status Document</th>
                    <th>Docs</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vouchers['data'] as $r): ?>
                    <tr style="">
                        <td style="width:15%;"><p><small><?php echo $r->voucher_created_at ?></small></td>
                        <td>
                            <a href="<?php echo site_url('ciu/detail/' . $r->id) ?>"><?php echo $r->flight_number; ?></a>
                        </td>
                        <td style="width:15%;"><?php echo $r->departure_city ?> - <?php echo $r->arrival_city ?></td>
                        <td style="width:10%;"><p><?php echo $r->flight_date ?></p></td>
                        <td><?php echo $r->voucher_type ?> </td>
                        <td><?php voucher_status($r) ?> </td>
                        <td><?php the_verification_form_status($r, 2) ?></td>
                        <td>
                            <?php the_index_attachment_button($r) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>
