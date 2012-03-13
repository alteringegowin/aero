
<?php the_breadcrumbs($breadcrumbs) ?>
<h3>Flight Data</h3>
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
        <?php if (isset($is_frozzen) && $is_frozzen): ?>

            <div class="alert alert-success">
                <h4 class="alert-heading">Success!</h4>
                <strong>Passanger Data Has Been saved!</strong> <a href="<?php echo site_url('flight/passanger_add/' . $flight->id) ?>">click here</a> to add more passanger.
            </div>
        <?php else: ?>
            <?php echo form_open('', 'class="form-horizontal"') ?>
            <fieldset>
                <legend>Flight Passanger  Data</legend>
                <?php if (validation_errors()): ?>
                    <div class="alert alert-error">
                        <h4 class="alert-heading">Error!</h4>
                        <ul>
                            <?php echo validation_errors('<li>', '</li>') ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="control-group">
                    <label class="control-label" for="passanger_name">Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="passanger_name" name="passanger_name"  value="<?php echo set_value('passanger_name'); ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="passanger_ticket">Ticket No.</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="passanger_ticket" name="passanger_ticket"  value="<?php echo set_value('passanger_ticket'); ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="passanger_px">PX</label>
                    <div class="controls">
                        <input type="text" class="span2" id="px" name="passanger_px"  value="<?php echo set_value('passanger_px'); ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="passanger_book_ref">Book.Ref</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="passanger_book_ref" name="passanger_book_ref"  value="<?php echo set_value('passanger_book_ref'); ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="passanger_fr_basic">FR Basic</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="passanger_fr_basic" name="passanger_fr_basic"  value="<?php echo set_value('passanger_fr_basic'); ?>" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inpdate">Date</label>
                    <div class="controls">
                        <?php the_dd_tanggal() ?>
                        <?php the_dd_bulan() ?>
                        <?php the_dd_tahun() ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="passanger_remark">Remaark</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="passanger_remark" name="passanger_remark"  value="<?php echo set_value('passanger_remark'); ?>" >
                    </div>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Passanger Data</button>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
        <?php endif; ?>
    </div>
</div>