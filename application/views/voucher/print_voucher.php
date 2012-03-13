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

    <body onLoad="printpage()">
    	
        <!-- print voucher -->
        <div class="container">
        	<div class="row">
            	<div class="span4">
                	<div style="font-size:24px; line-height:22px;">FLIGHT INSURANCE</div>
                    <div style="font-size:47px; line-height:50px;">VOUCHER</div>
                </div>
                <div class="span8">
                	<div style="font-size:14px; text-align:right; line-height:15px;">Code Voucher</div>
                    <div style="font-size:35px; font-weight:bold; text-align:right; font-family:Tahoma, Arial, Helvetica, sans-serif; line-height:40px;">GA-111-01-000000000001</div>
                    <div style="font-size:15px; text-align:right; line-height:18px; margin-bottom:15px; ">Date Create: 23-03-2012 - Valid Until: 23-04-2012</div>
                </div>
            </div>
            <div class="row">
            	<div class="span2">&nbsp;<br>Nama</div>
                <div class="span2">&nbsp;<br>Ticket Number</div>
                <div class="span1">Price (IDR)</div>
                <div class="span2">&nbsp;<br>Departure City</div>
                <div class="span2">&nbsp;<br>Arrival City</div>
                <div class="span1">Delay Reason</div>
                <div class="span2">&nbsp;<br>Issued by</div>
            </div>
            <div class="row">
            	<div class="span12" style="border-bottom:2px solid #111; margin-bottom:10px; height:7px;">&nbsp;</div>
            </div>
            <div class="row" style="padding-bottom:40px">
            	<div class="span2">ROBBY WIJAYA</div>
                <div class="span2">1262113664166</div>
                <div class="span1">300,000</div>
                <div class="span2">JAKARTA</div>
                <div class="span2">SURABAYA</div>
                <div class="span1">96</div>
                <div class="span2">GUNAWAN WIDODO</div>
            </div>
            <div class="row">
            	<div class="span3" style="border-bottom:2px solid #333; font-weight:bold; padding-bottom:70px">Signature Passanger</div>
                <div class="span5">
                	<p style="margin-bottom:0px;">NOTES:</p>
					<ul style="margin:0px 0 0 20px; padding:0px; list-style-type:lower-alpha; font-size:11px; font-weight:bold ">
                    	<li>Voucher ini berlaku sampai dengan tanggal berlaku berdasarkan default system 30 hari.</li>
                        <li>Untuk mencairkan voucher ini harus membawa identitas yg berlaku.</li>

                </div>
                <div class="span4"><img src="<?php echo $themes ?>img/logo-ciu-pcaero.png" alt="CIU - PC Aeor"></div>
                
            </div>
        </div>
        <!-- /.print voucher -->
    
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
