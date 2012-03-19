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
		<?php $tmp_username = $this->session->userdata('user_data');?>
    	<?php foreach($vouchers as $voucer) : ?>
        <!-- print voucher -->
        <div class="container">
        	<div class="row">
            	<div class="span4">
                	<div style="font-size:24px; line-height:22px;">VOUCHER</div>
                    <div style="font-size:47px; line-height:50px;">KM77</div>
                </div>
                <div class="span8">
                	<div style="font-size:14px; text-align:right; line-height:15px;">Code Voucher</div>
                    <div style="font-size:35px; font-weight:bold; text-align:right; font-family:Tahoma, Arial, Helvetica, sans-serif; line-height:40px;"><?php echo $voucer->voucher_code; ?></div>
                    <div style="font-size:15px; text-align:right; line-height:18px; margin-bottom:15px; ">Date Create: <?php echo date('d M Y',strtotime($voucer->voucher_created_at));?> - Valid Until: <?php 
                    echo date('d M Y',strtotime(date("Y-m-d", strtotime($voucer->voucher_created_at)) . " +30 DAYS"));?></div>
                </div>
            </div>
            <div class="row">
            	<div class="span2">&nbsp;<br>Nama</div>
                <div class="span2">&nbsp;<br>Ticket Number</div>
                <div class="span1">&nbsp;<br>Price (IDR)</div>
                <div class="span2">&nbsp;<br>Departure City</div>
                <div class="span2">&nbsp;<br>Arrival City</div>
                <div class="span1">Delay Reason</div>
                <div class="span2">&nbsp;<br>Issued by</div>
            </div>
            <div class="row">
            	<div class="span12" style="border-bottom:2px solid #111; margin-bottom:10px; height:7px;">&nbsp;</div>
            </div>
            <div class="row" style="padding-bottom:40px">
            	<div class="span2"><?php echo $voucer->passenger_name;?>&nbsp;</div>
                <div class="span2"><?php echo $voucer->passenger_ticket;?>&nbsp;</div>
                <div class="span1"><?php echo $voucer->price; ?>&nbsp;</div>
                <div class="span2"><?php echo ucwords($voucer->departure_city);?>&nbsp;</div>
                <div class="span2"><?php echo ucwords($voucer->arrival_city);?>&nbsp;</div>
                <div class="span1"><?php echo $voucer->delay_reason;?>&nbsp;</div>
                <div class="span2"><?php echo $tmp_username['fullname'];?>&nbsp;</div>

            </div>

            <div class="row">
            	<div class="span3" style="border-bottom:2px solid #333; font-weight:bold; padding-bottom:70px">Signature Passanger</div>
                <div class="span5">
                	<p style="margin-bottom:0px;">NOTES:</p>
					<ul style="margin:0px 0 0 20px; padding:0px; list-style-type:lower-alpha; font-size:11px; font-weight:bold ">
                    	<li>Voucher berlaku selama 30 hari.</li>
                        <li>Penukaran Voucher dapat dilakukan di Bank Mandiri terdekat dengan membawa identitas diri yang masih berlaku</li>

                </div>
                <div class="span4"><?php cetak_logo($voucer->airlines_id)?></div>
                
            </div>
        </div>
        <!-- /.print voucher -->
        <?php endforeach; ?>
    
    </body>
</html>