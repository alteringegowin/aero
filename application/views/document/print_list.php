<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Aero</title>
        <link href="<?php echo $themes ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $themes ?>css/bootstrap-responsive.css" rel="stylesheet">

        <script language="Javascript1.2">
            <!--
            function printpage() {
                window.print();
            }
            //-->
        </script>

    </head>

    <body onload="printpage()">
        <div class="container">

            <h3>Passanger Data</h3>
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
                                    <td class="span3"><?php echo $r->voucher_code ?></td>
                                    <td><?php echo $r->passenger_name ?></td>
                                    <td><?php echo $r->passenger_ticket ?></td>
                                    <td class="span2"><?php echo number_format($r->price) ?></td>
                                    <td class="span2"><?php echo date('Y-m-d H:i', strtotime($r->voucher_created_at)) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>



        </div> <!--/container-->


    </body>
</html>
