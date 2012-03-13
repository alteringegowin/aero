<div id="request-voucher">
    <div class="row">
        <div class="span12">
            <h3>Voucher Data</h3>
            <hr/>
        </div>
    </div>

    <!-- info of flight data-->
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
    <!-- end of info of flight data-->

    <hr/>    


    <?php echo form_open_multipart('') ?>
    <div class="row">
        <div class="span6">
            <div class="alert">
                <?php if (validation_errors()): ?>
                    <div class="row">
                        <div class="span6">
                            <div class="alert alert-error">
                                <h4 class="alert-heading">Error!</h4>
                                <ul>
                                    <?php echo validation_errors('<li>', '</li>') ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <h3>Document Upload</h3>
                <hr/>
                <label for="fileInput"><strong><?php echo strtoupper($upload_type[$type]) ?> Files</strong> </label>
                <input class="input-file" id="fileInput" name="userfile" type="file">
                <input type="hidden" name="voucher_id" value="" />
                <hr/>
                <button class="btn btn-large btn-success" type="submit">Upload Documents</button>
            </div>
        </div>
        <div class="span6">
            <div class="row">
                <div class="span6">
                    <div class="alert alert-block">

                        <h3>Document Via Offline</h3>
                        <hr/>
                        <p>
                            Or You can Set the <?php echo strtoupper($upload_type[$type]) ?>  documents 
                        </p>
                        <hr/>
                        <p>
                            <a href="<?php echo site_url('document/setting_offline/'.$flight->id.'/'.$type) ?>" class="btn btn-small btn-warning">Via Offline</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php echo form_close(); ?>

</div>