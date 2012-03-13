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

            <?php foreach ($vouchers as $r): ?>
                <hr/>
                <div class="xxxx" style="padding:10px 0px;">
                    <div class="row" style="padding-bottom:30px;">
                        <div class="span10">
                            <h6>Voucher Code</h6>
                            <h2><?php echo $r->voucher_code ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span2">
                            <h5>Name</h5>
                            <h6><?php echo $r->passenger_name ?></h6>
                        </div>
                        <div class="span2">
                            <h5>Ticket No</h5>
                            <h6><?php echo $r->passenger_ticket ?></h6>
                        </div>
                        <div class="span2">
                            <h5>Price </h5>
                            <h6><?php echo number_format($r->price) ?></h6>
                        </div>
                        <div class="span2">
                            <h5>Departure City.</h5>
                            <h6><?php echo $r->departure_city ?></h6>
                        </div>
                        <div class="span2">
                            <h5>Arrival City</h5>
                            <h6><?php echo $r->arrival_city ?></h6>
                        </div>

                        <div class="span2">
                            <h5>Delay Reason</h5>
                            <h6><?php echo $r->delay_reason ?></h6>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="span2">
                            <h5>Issued by</h5>
                            <h6><?php the_user($r->user_id ) ?></h6>
                        </div>
                        <div class="span2">
                            <h5>Passenger Signature</h5>
                            <h6></h6>
                        </div>
                        <div class="span4">
                            <h5>Remaks Notes</h5>
                            <ol>
                                <li>Voucher ini berlaku sampai dengan tanggal berlaku berdasarkan default system 30 hari</li>
                                <li>Untuk mencairkan voucher ini harus membawa identitas yg berlaku</li>
                            </ol>
                        </div>
                        <div class="span4">
                            <img src="<?php echo $themes ?>img/pc-aero_com_crop.jpg"/>
                        </div>
                    </div>
                </div>
                <div style="padding:40px; 0;">&nbsp;</div>
            <?php endforeach; ?>

        </div> <!--/container-->


    </body>
</html>
