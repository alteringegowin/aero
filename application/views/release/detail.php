

<?php the_breadcrumbs($breadcrumbs) ?>
<div class="row">
    <div class="span4"><h3>Passanger Data</h3></div>
    <div class="span8" style="text-align: right">
        <a class="btn btn-success" href="<?php echo site_url('release/import/' . $flight->id) ?>"><i class="icon-print icon-white"></i> Import/Entry Passengers Data</a>
        <a target="_blank" class="btn btn-info" href="<?php echo site_url('release/print_list/' . $flight->id) ?>"><i class="icon-print icon-white"></i> Print This Page</a>
        <a data-toggle="modal" href="#myModal" class="btn btn-danger print-voucher"><i class="icon-print icon-white"></i> Print All Vouchers</a>
    </div>
</div>

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
                        <td><?php echo $r->passenger_name ?></td>
                        <td><?php echo $r->passenger_ticket ?></td>
                        <td><?php echo number_format($r->price) ?></td>
                        <td><?php echo date('Y-m-d H:i', strtotime($r->voucher_created_at)) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<div id="myModal" class="modal hide fade in" style="display: block; ">
    <div class="modal-header">
        <a class="close close-modal" data-dismiss="modal">×</a>
        <h3>Warning</h3>
    </div>
    <div class="modal-body">
        <p>Only a vouchers that has a name and ticket number will be printed</p>
    </div>
    <div class="modal-footer">
        <a href="<?php echo site_url('release/print_voucer_all/' . $flight->id) ?>" target="_blank" class="btn btn-primary">Yes, continue to print</a>
        <a href="#" class="btn close-modal" data-dismiss="modal">Close</a>
    </div>
</div>

<script type="text/javascript">

        !function ($) {

        $(function(){
            $('#myModal').hide();
            $(".print-voucher").click(function(){
                $('#myModal').show();
                return false;
            });
            
            $(".close-modal").click(function(){
                $('#myModal').hide();
                return false;
            })
            
        });
    }(window.jQuery)
</script>