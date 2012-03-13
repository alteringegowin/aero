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
<?php if (isset($is_frozzen) && $is_frozzen): ?>
    <div class="row">
        <div class="span4">
            <div class="alert alert-info">
                <h5>Total Data </h5>
                <h6><?php echo $statistic_upload['total'] ?> data</h6>
            </div>
        </div>
        <div class="span4">
            <div class="alert alert-success">
                <h5>Success</h5>
                <h6><?php echo $statistic_upload['sukses'] ?> data</h6>
            </div>
        </div>
        <div class="span4">
            <div class="alert alert-error">
                <h5>Failed</h5>
                <h6><?php echo $statistic_upload['sudah_ada'] ?> data</h6>
            </div>
        </div>
    </div>

<?php else: ?>
    <div class="row">
        <div class="span8 offset2">
            <div class="alert alert-danger">
                <h4 class="alert-heading">Warning!</h4>
                <p>Please make sure that the format of your csv is same with our pattern. </p>
            </div>
        </div>
        <div class="span2">&nbsp;</div>
    </div>

    <div class="row">
        <div class="span8 offset2">
            <div class="alert alert-info">
                <h4 class="alert-heading">1. Download the CSV!</h4>
                <p>Please download the file here. The Voucher list is included on the CSV file</p>
                <p><a href="<?php echo site_url('flight/download/' . $flight->id) ?>" class="btn btn-large btn-primary">DOWNLOAD HERE</a></p>
            </div>
        </div>
        <div class="span2">&nbsp;</div>
    </div>

    <div class="row">
        <div class="span8 offset2">
            <div class="alert alert-info">
                <h4 class="alert-heading">2. Entry Pax Data According the CSV Files!</h4>
                <p>Please <a href="<?php echo site_url('flight/download/upload') ?>">download the Voucher CSV file</a>.</p>
            </div>
        </div>
        <div class="span2">&nbsp;</div>
    </div>
    <div class="row">
        <div class="span8 offset2">
            <div class="alert alert-info">
                <h4 class="alert-heading">3. Upload the CSV Files!</h4>
                <?php echo form_open_multipart('', array('class' => '')) ?>
                <?php if (validation_errors()): ?>
                    <div class="alert alert-error">
                        <h4 class="alert-heading">Error!</h4>
                        <ul>
                            <?php echo validation_errors('<li>', '</li>') ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="control-group">
                    <label class="control-label" for="fileInput">File input</label>
                    <div class="controls">
                        <input class="input-file" id="fileInput" type="file" name="userfile">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="userfile2">Upload File</button>
                <?php form_close() ?>  
            </div>
        </div>
        <div class="span2">&nbsp;</div>
    </div>


    <div class="row">
        <div class="span8 offset2">

        </div>
        <div class="span2">&nbsp;</div>
    </div>

<?php endif; ?>