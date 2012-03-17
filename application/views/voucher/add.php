<div id="request-voucher">
    <?php echo form_open_multipart('') ?>
    <div class="row">
        <div class="span12">
            <h3>Request Voucher Flight</h3>
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
            <label for="select01">Voucher Type</label>
            <select id="select01" class="span2" name="voucher_type">
                <option value="delay">delay</option>
                <option value="cancelled">cancel</option>
            </select>
        </div>
        <div class="span2">
            <label for="flight_number">Flight Number</label>
            <input type="text" class="span2" id="inpdate" name="flight_number"  value="<?php echo set_value('flight_number'); ?>" >
        </div>
        <div class="span2">
            <label for="flight_date">Flight Date</label>
            <input type="text" data-datepicker="datepicker" class="span2" id="flight_date" name="flight_date"  value="<?php echo set_value('flight_date', date('m/d/Y')); ?>" >
        </div>
        <div class="span1">
            <label for="std">STD</label>
            <select id="std" class="span1" name="std">
                <option value="" disabled="disabled">STD</option>
                <?php foreach ($jam as $j): ?>
                    <?php foreach ($menit as $m): ?>
                        <option><?php echo sprintf("%02d", $j) ?>:<?php echo sprintf("%02d", $m) ?></option>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="span1">
            <label for="etd">ETD</label>
            <select id="etd" class="span1" name="etd">
                <option value="" disabled="disabled">ETD</option>
                <?php foreach ($jam as $j): ?>
                    <?php foreach ($menit as $m): ?>
                        <option><?php echo sprintf("%02d", $j) ?>:<?php echo sprintf("%02d", $m) ?></option>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="span2">
            <label for="delay_reason">Reason Of Delay</label>
            <select id="delay_reason" class="span1" name="delay_reason">
                <option value="" disabled="disabled">Delay Reason</option>
                <?php foreach ($reasons as $r): ?>
                    <option><?php echo sprintf("%02d", $r) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="span2">
            <label for="departure_city">Departure City</label>
            <?php echo form_dropdown('departure_city', $ddbandara, set_value('departure_city'), 'class="span2"') ?>
        </div>
        <div class="span2">
            <label for="arrival_city">Arrival City</label>
            <?php echo form_dropdown('arrival_city', $ddbandara, set_value('arrival_city'), 'class="span2"') ?>
        </div>
        <div class="span2">
            <label for="total_pax_delay">Total Pax Delay</label>
            <input type="text" class="span1" id="total_pax_delay" name="total_pax_delay"  value="<?php echo set_value('total_pax_delay'); ?>" >
        </div>
        <div class="span2">
            <label for="total_pax_transfer">Total Pax Transfer</label>
            <input type="text" class="span1" id="total_pax_transfer" name="total_pax_transfer"  value="<?php echo set_value('total_pax_delay'); ?>" >
        </div>
        <div class="span2">
            <label for="total_pax_cancel">Total Re-route</label>
            <input type="text" class="span1 disabled" id="total_pax_reroute" name="total_pax_reroute"  value="<?php echo set_value('total_pax_reroute'); ?>" >
        </div>
        <div class="span2">
            <label for="total_pax_cancel">Total Pax Flight Canceled</label>
            <input type="text" class="span1 disabled" disabled="disabled" id="total_pax_cancel" name="total_pax_cancel"  value="<?php echo set_value('total_pax_delay'); ?>" >
        </div>
    </div>
    <hr/>
    <?php
    /*
      <div class="row">
      <div class="span8">
      <label for="fileInput">Uploading File</label>
      <input class="input-file" id="fileInput" name="userfile" type="file">
      <p class="help-block">only supported xls, doc, xlsx, docx, pdf, jpg, png, gif, txt files</p>
      </div>
      <div class="span2">&nbsp;</div>
      </div>
      -->

     */
    ?>
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