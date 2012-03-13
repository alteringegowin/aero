<?php the_breadcrumbs($breadcrumbs) ?>
<h3>Passanger Data</h3>
<hr/>
<div class="row">
    <div class="span3">
        <h5>Flight No.</h5>
        <h6><?php echo $flight->flight_number ?></h6>
    </div>
    <div class="span3">
        <h5>Destination.</h5>
        <h6><?php echo $flight->departure_city ?> to <?php echo $flight->arrival_city ?></h6>
    </div>
    <div class="span3">
        <h5>Flight Date.</h5>
        <h6><?php echo $flight->flight_date ?></h6>
    </div>
    <div class="span3">
        <h5>Total Pax Delay</h5>
        <h6><?php echo $flight->total_pax_delay ?></h6>
    </div>
</div>
<div class="row" style="padding-top: 8px;">
    <div class="span3">
        <h5>Delay Reason</h5>
        <h6><?php echo $flight->delay_reason ?></h6>
    </div>
    <div class="span3">
        <h5>Total Pax Transfer</h5>
        <h6><?php echo $flight->total_pax_transfer ?></h6>
    </div>
    <div class="span3">
        <h5>Total Pax Canceled</h5>
        <h6><?php echo $flight->total_pax_cancelled ?></h6>
    </div>
    <div class="span3">
        <h5>created on</h5>
        <h6><?php echo $flight->flight_created_at ?></h6>
    </div>
</div>

<hr/>
<div class="row">
    <div class="span12">
        <p style="text-align: right">
            <a href="<?php echo site_url('flight/import/' . $flight->id) ?>" class="btn btn-small btn-danger"><i class="icon-download-alt icon-white"></i> import Pax data </a>
            <a href="<?php echo site_url('flight/export/' . $flight->id) ?>" class="btn btn-small btn-success"><i class="icon-file icon-white"></i> export Pax data </a>
            <a target="_blank" href="<?php echo site_url('flight/print_voucer_all/' . $flight->id) ?>" class="btn btn-small btn-info"><i class="icon-print icon-white"></i> print</a>
        </p>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Ticket No.</th>
                    <th>Vouc Code.</th>
                    <th>Book.Ref</th>
                    <th>FR Basic</th>
                    <th>Date</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($passengers as $r):
                    ?>
                    <tr>
                        <td><?php echo $r->passenger_name ?></td>
                        <td><?php echo $r->passenger_ticket ?></td>
                        <td><?php the_voucher($flight->flight_number, $r->id) ?></td>
                        <td><?php echo $r->passenger_booking ?></td>
                        <td><?php echo $r->passenger_fr ?></td>
                        <td><?php echo $r->passenger_date ?></td>
                        <td><?php echo $r->passenger_remark ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>