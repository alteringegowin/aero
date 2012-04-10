<div id="request-voucher">
    <?php echo form_open_multipart('') ?>
    <div class="row">
        <div class="span12">
            <h3>Request Voucher </h3>
            <hr/>
        </div>
    </div>
    <?php if (validation_errors()): ?>
        <div class="row">
            <div class="span12">
                <div class="alert alert-error">
                    <h4 class="alert-heading">Error!</h4>
                    <ul>
                        <?php echo validation_errors('<li>', '</li>') ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="span2"> 
            <label for="select01"><strong>Voucher Type *</strong></label>
            <?php echo form_dropdown('voucher_type', $ddvoucher_type, NULL, 'id="select01" class="span2"') ?>
        </div>
        <div class="span2">
            <div class="control-group">
                <label for="flight_number"><strong>Flight Number *</strong></label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><?php echo $flight_code_prefix ?></span>
                        <input type="text" class="span1" id="inpdate" name="flight_number"  value="<?php echo set_value('flight_number'); ?>" style="margin-bottom:0px;margin-left:-4px;width:120px">
                    </div>
                </div>
            </div>
        </div>
        <div class="span2">
            <label for="flight_date"><strong>Flight Date *</strong></label>
            <input type="text" data-datepicker="datepicker" class="span2" id="flight_date" name="flight_date"  value="<?php echo set_value('flight_date', date('m/d/Y')); ?>" >
        </div>
        <div class="span1">
            <label for="std"><strong>STD *</strong></label>
            <?php echo form_dropdown('std', $dd_waktu, set_value('std'), 'id="std" class="span1"') ?>
        </div>
        <div class="span1">
            <label for="etd"><strong>ETD *</strong></label>
            <?php echo form_dropdown('etd', $dd_waktu, set_value('etd'), 'id="etd" class="span1"') ?>
        </div>
        <div class="span2">
            <label for="delay_reason"><strong>Reason Of Delay *</strong></label>
            <?php echo form_dropdown('delay_reason', $ddDelay, set_value('delay_reason')) ?>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="span2">
            <label for="departure_city"><strong>Departure City *</strong></label>
            <?php echo form_dropdown('departure_city', $ddbandara, set_value('departure_city'), 'class="span2"') ?>
        </div>
        <div class="span2">
            <label for="arrival_city"><strong>Arrival City *</strong></label>
            <?php echo form_dropdown('arrival_city', $ddbandara, set_value('arrival_city'), 'class="span2"') ?>
        </div>
        <div class="span2">
            <label for="total_pax_delay"><strong>Total Pax Delay *</strong></label>
            <input type="text" class="span1" id="total_pax_delay" name="total_pax_delay"  value="<?php echo set_value('total_pax_delay'); ?>" >
        </div>
        <div class="span2">
            <label for="total_pax_transfer"><strong>Total Pax Transfer *</strong></label>
            <input type="text" class="span1" id="total_pax_transfer" name="total_pax_transfer"  value="<?php echo set_value('total_pax_delay'); ?>" >
        </div>
        <div class="span2">
            <label for="total_pax_cancel"><strong>Total Re-route *</strong></label>
            <input type="text" class="span1 disabled" id="total_pax_reroute" name="total_pax_reroute"  value="<?php echo set_value('total_pax_reroute'); ?>" >
        </div>
        <div class="span2">
            <label for="total_pax_cancel"><strong>Total Pax Flight Canceled *</strong></label>
            <input type="text" class="span1 disabled" disabled="disabled" id="total_pax_cancel" name="total_pax_cancel"  value="<?php echo set_value('total_pax_delay'); ?>" >
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="span4">
            <label for="fileInput"><strong>Upload Telex File *</strong></label>
            <input class="input-file" id="fileInput" name="file-1" type="file">
        </div>
        <div class="span4">
            <label for="fileInput"><strong>Upload Manifest *</strong></label>
            <input class="input-file" id="fileInput2" name="file-2" type="file">
        </div>
        <div class="span4">
            <label for="fileInput">Upload Movement</label>
            <input class="input-file" id="fileInput3" name="file-3" type="file">
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="span12">
            <label for="keterangan"><strong>Notes *</strong></label>
            <textarea class="span12" id="textarea" rows="3" name="keterangan"><?php echo set_value('keterangan')?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="span12">
            <div class="form-actions" style="text-align: center">
                <button class="btn btn-large btn-primary" type="submit">Request Form</button>
            </div>
        </div>
    </div>


    <?php echo form_close(); ?>
</div>
<script>
    /* Update datepicker plugin so that MM/DD/YYYY format is used. */
    $.extend($.fn.datepicker.defaults, {
        parse: function (string) {
            var matches;
            if ((matches = string.match(/^(\d{2,2})\/(\d{2,2})\/(\d{4,4})$/))) {
                return new Date(matches[3], matches[1] - 1, matches[2]);
            } else {
                return null;
            }
        },
        format: function (date) {
            var
            month = (date.getMonth() + 1).toString(),
            dom = date.getDate().toString();
            if (month.length === 1) {
                month = "0" + month;
            }
            if (dom.length === 1) {
                dom = "0" + dom;
            }
            return month + "/" + dom + "/" + date.getFullYear();
        }
    });  
</script>