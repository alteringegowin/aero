<div id="request-voucher">
    <div class="row">
        <div class="span12">
            <h3>Document Upload</h3>
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
    <div class="row">
        <?php for ($i = 0; $i < 3; $i++): ?>
            <div class="span4">
                <p><?php echo $i + 1 ?>. <strong><?php echo strtoupper($upload_type[$i]) ?></strong> Files</p>
                <?php if (isset($attachments[$i])): ?>
                    <p class="p-<?php echo $i ?> <?php echo show_upload_button($attachments[$i]) ?>"><a href="<?php echo site_url('document/upload/' . $flight->id . '/' . $i) ?>" class="btn btn-small btn-info"><i class="icon-upload icon-white"></i> UPLOAD <?php echo strtoupper($upload_type[$i]) ?></a></p>
                    <?php show_attachment_file($attachments[$i]) ?>
                    <label class="checkbox"><input type="checkbox" rel="<?php echo $i ?>" name="chk-offline-<?php echo $i ?>" <?php echo $attachments[$i]->offline_mode ? 'checked="checked"' : "" ?>> <strong>offline mode</strong></label>
                <?php else: ?>
                    <p class="p-<?php echo $i ?>"><a href="<?php echo site_url('document/upload/' . $flight->id . '/' . $i) ?>" class="btn btn-small btn-info"><i class="icon-upload icon-white"></i> UPLOAD <?php echo strtoupper($upload_type[$i]) ?></a></p>
                    <label class="checkbox"><input type="checkbox" rel="<?php echo $i ?>" name="chk-offline-<?php echo $i ?>"> <strong>offline mode</strong></label>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
    <hr/>
    <div class="row">

        <?php for ($i = 3; $i < 6; $i++): ?>
            <div class="span4">
                <p><?php echo $i + 1 ?>. <strong><?php echo strtoupper($upload_type[$i]) ?></strong> Files</p>
                <?php if (isset($attachments[$i])): ?>
                    <p class="p-<?php echo $i ?> <?php echo show_upload_button($attachments[$i]) ?>"><a href="<?php echo site_url('document/upload/' . $flight->id . '/' . $i) ?>" class="btn btn-small btn-info"><i class="icon-upload icon-white"></i> UPLOAD <?php echo strtoupper($upload_type[$i]) ?></a></p>
                    <label class="checkbox"><input type="checkbox" rel="<?php echo $i ?>" name="chk-offline-<?php echo $i ?>" <?php echo $attachments[$i]->offline_mode ? 'checked="checked"' : "" ?>> <strong>offline mode</strong></label>
                <?php else: ?>
                    <p class="p-<?php echo $i ?>"><a href="<?php echo site_url('document/upload/' . $flight->id . '/' . $i) ?>" class="btn btn-small btn-info"><i class="icon-upload icon-white"></i> UPLOAD <?php echo strtoupper($upload_type[$i]) ?></a></p>
                    <label class="checkbox"><input type="checkbox" rel="<?php echo $i ?>" name="chk-offline-<?php echo $i ?>"> <strong>offline mode</strong></label>
                    <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
    <hr/>


</div>

<script type="text/javascript">
        !function ($) {
        $(function(){
            var site_url = '<?php echo site_url() ?>';
            
            $(':checkbox').click(function () {
                var id = $(this).attr('rel');
                if($(this).prop("checked")){
                    var data = {
                        type:id,
                        status:1
                    }
                    $.post(site_url+'document/set_offline/<?php echo $flight->id ?>',data,function(){
                        $(".p-"+id).hide();
                    });
                }else{
                    var data = {
                        type:id,
                        status:0
                    }
                    $.post(site_url+'document/set_offline/<?php echo $flight->id ?>',data,function(){
                        $(".p-"+id).show();
                    });
                    
                    
                    
                    
                    
                    $(".p-"+id).show();
                }
            });
        });
    }(window.jQuery)
</script>
