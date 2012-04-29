<h3>Passanger Data <small><a href="<?php echo site_url('ciu') ?>">back to voucher list</a></small></h3>
<hr/>
<div class="row">
    <div class="span1">
        <h5>Flight No.</h5>
        <h6><?php echo $flight->flight_number ?></h6>
    </div>
    <div class="span1">
        <h5>Destination.</h5>
        <h6><?php echo $flight->departure_city ?> to <?php echo $flight->arrival_city ?></h6>
    </div>
    <div class="span1">
        <h5>Flight Date.</h5>
        <h6><?php echo $flight->flight_date ?></h6>
    </div>
    <div class="span1">
        <h5>STD</h5>
        <h6><?php echo $flight->flight_std ?></h6>
    </div>
    <div class="span1">
        <h5>ETD</h5>
        <h6><?php echo $flight->flight_etd ?></h6>
    </div>
    <div class="span1">
        <h5>Reason</h5>
        <h6><?php echo $flight->delay_reason ?></h6>
    </div>
    <div class="span1">
        <h5>created on</h5>
        <h6><?php echo $flight->voucher_created_at ?></h6>
    </div>
    <div class="span1">
        <h5>Delay</h5>
        <h6><?php echo $flight->total_pax_delay ?></h6>
    </div>
    <div class="span1">
        <h5>Transfer</h5>
        <h6><?php echo $flight->total_pax_transfer ?></h6>
    </div>
    <div class="span1">
        <h5>Canceled</h5>
        <h6><?php echo $flight->total_pax_cancelled ?></h6>
    </div>
</div>
<div class="row" style="padding-top: 8px;">
    <div class="span1">
        <h5>Issued By</h5>
        <h6><?php echo $flight->fullname ?></h6>
    </div>
    <div class="span4">
        <h5>Airlines</h5>
        <h6><?php echo $flight->airlines_name ?></h6>
    </div>
    <div class="span4">&nbsp;</div>

    <div class="span3">
        <h5>Claim Status :</h5>
        <p><?php the_verification_form_status($flight) ?></p>
        <p><?php the_verification_form_link($flight) ?></p>
    </div>
</div>
<div class="row">
    <div class="span12">
        <h4>Document</h4>
        <div class="row" style="padding:8px 0;">
            <?php for ($i = 0; $i < 3; $i++): ?>
                <div class="span4">
                    <h6><?php echo $doc_type[$i] ?></h6>
                    <?php if (isset($documents[$i]) && $documents[$i]->offline_mode) : ?>
                        <span class="label">offline doc via post</span>
                    <?php elseif (isset($documents[$i]) && $documents[$i]->attachment_file): ?>
                        <a class="btn btn-success" href="<?php echo site_url('ciu/attachment/' . $flight->id . '/' . $i) ?>"><i class="icon-download icon-white"></i> download</a>
                    <?php else: ?>
                        <span class="label label-important">not set yet</span>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
        <div class="row" style="padding:8px 0;">
            <?php for ($i = 3; $i < 6; $i++): ?>
                <div class="span4">
                    <h6><?php echo $doc_type[$i] ?></h6>
                    <?php if (isset($documents[$i]) && $documents[$i]->offline_mode) : ?>
                        <span class="label">offline doc via post</span>
                    <?php elseif (isset($documents[$i]) && $documents[$i]->attachment_file): ?>
                        <a class="btn btn-success" href="<?php echo site_url('ciu/attachment/' . $flight->id . '/' . $i) ?>"><i class="icon-download icon-white"></i> download</a>
                    <?php else: ?>
                        <span class="label label-important">not set yet</span>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>

<hr/>
<div class="row">
    <div class="span12">
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Voucher</th>
                    <th>Name</th>
                    <th>Ticket</th>
                    <th>Price</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($passengers as $r): ?>
                    <tr>
                        <td><?php echo $r->voucher_code ?></td>
                        <td><?php echo $r->passenger_name ?> &nbsp;</td>
                        <td><?php echo $r->passenger_ticket ?> &nbsp;</td>
                        <td><?php echo number_format($r->price) ?></td>
                        <td><?php echo date('Y-m-d H:i', strtotime($r->voucher_created_at)) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

