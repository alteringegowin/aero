<div id="ciu" class="row">
    <div class="span12">
        <h3>Progress Monitoring</h3>
        <hr/>
        <table class="table table-striped table-bordered table-condensed kecil">
            <thead>
                <tr>
                    <th style="font-align:'center';">Req at</th>
                    <th>Flight Number</th>
                    <th>Departure</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Voucher</th>
                    <th>Verifications Status</th>
                    <th>Docs</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vouchers['data'] as $r): ?>
                    <tr style="">
                        <td style="width:15%;"><p><small><?php echo $r->voucher_created_at ?></small></td>
                        <td>
                            <a href="<?php echo site_url('ciu/detail/' . $r->id) ?>"><?php echo $r->flight_number; ?></a>
                        </td>
                        <td style="width:15%;"><?php echo $r->departure_city ?> - <?php echo $r->arrival_city ?></td>
                        <td style="width:10%;"><p><?php echo $r->flight_date ?></p></td>
                        <td><?php echo $r->voucher_type ?> </td>
                        <td><?php voucher_status($r) ?> </td>
                        <td><?php the_verification_form_status($r, 2) ?></td>
                        <td>
                            <?php if ($r->voucher_verified == 1) : ?>
                                <?php the_index_attachment_button($r) ?>
                            <?php else : ?>
                                &nbsp;
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>
</div>

<div class="modal" id="myDoc1">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Document Verifications : DOC KRONOLOGIS</h3>
    </div>
    <div class="modal-body">
        <p>This Document is send Online.</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Download</a>
    </div>
</div>

<div class="modal" id="myDoc2">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Document Verifications : DOC TELEX</h3>
    </div>
    <div class="modal-body">
        <p>This Document is send Offline by POST</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
</div>

<div class="modal" id="myDoc3">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Document Verifications : DOC MANIFEST</h3>
    </div>
    <div class="modal-body">
        <p>This Document is send Online</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Download</a>
    </div>
</div>

<div class="modal" id="myDoc4">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Document Verifications : DOC FLIGHT-MOVEMENT</h3>
    </div>
    <div class="modal-body">
        <p>This Document is send Online.</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Download</a>
    </div>
</div>


<div class="modal" id="myDoc5">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Document Verifications : DOC ABSENSI-VOUCHER</h3>
    </div>
    <div class="modal-body">
        <p>This Document is send Online.</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Download</a>
    </div>
</div>

<div class="modal" id="myDoc6">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Document Verifications : DOC OTHERS</h3>
    </div>
    <div class="modal-body">
        <p>This Document is send Online.</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Download</a>
    </div>
</div>

<script type="text/javascript">
    $('#myDoc1').hide();
    $('#myDoc2').hide();
    $('#myDoc3').hide();
    $('#myDoc4').hide();
    $('#myDoc5').hide();
    $('#myDoc6').hide();
</script>
