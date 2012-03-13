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

            <div class="row" style="padding-bottom:30px;">
                <div class="span2">
                    <h6>Voucer Code</h6>
                    <h2><?php the_voucher($voucer->flight_number, $voucer->voucer_id) ?></h2>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="span2">
                    <h5>Name</h5>
                    <h6><?php echo $voucer->passanger_name ?></h6>
                </div>
                <div class="span2">
                    <h5>Ticket No</h5>
                    <h6><?php echo $voucer->passanger_ticket ?></h6>
                </div>
                <div class="span2">
                    <h5>Ticket No</h5>
                    <h6><?php echo $voucer->flight_number ?></h6>
                </div>
                <div class="span2">
                    <h5>Date </h5>
                    <h6><?php echo $voucer->passanger_date ?></h6>
                </div>
                <div class="span2">
                    <h5>Departure City.</h5>
                    <h6><?php echo $voucer->departure_city ?></h6>
                </div> 
                <div class="span2">
                    <h5>Arrival City</h5>
                    <h6><?php echo $voucer->arrival_city ?></h6>
                </div> 
            </div>
            <hr/>
            <div class="row">
                <div class="span2">
                    <h5>Booking Code</h5>
                    <h6><?php echo $voucer->passanger_book_ref ?></h6>
                </div>
                <div class="span2">
                    <h5>FR</h5>
                    <h6><?php echo $voucer->passanger_fr_basic ?></h6>
                </div>
                <div class="span2">
                    <h5>PX</h5>
                    <h6><?php echo $voucer->passanger_px ?></h6>
                </div>
                <div class="span6">
                    <h5>Delay Reason</h5>
                    <h6><?php echo $voucer->delay_reason ?></h6>
                </div> 
            </div>

        </div> <!--/container-->


    </body>
</html>
