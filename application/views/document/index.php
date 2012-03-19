<div class="row">
    <div class="span12">
        <h3>Document Upload for Flight Data (Order By Flight Date)</h3>
        <hr/>
        <table class="table table-striped table-bordered table-condensed">
            <thead>

                <tr>
                    <th>Status</th>
                    <th>Flight Number</th>

                    <?php foreach ($doc_upload_type as $k => $d): ?>
                        <th><?php echo $d ?></th>
                    <?php endforeach; ?>
                    <th>Req By</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vouchers['data'] as $r): ?>
                    <tr style="font-size: 11px">
                        <td class="span1"><?php echo the_request_status($r) ?></td>
                        <td>
                            <h6><i class="icon-plane"></i> <?php echo anchor('release/detail/' . $r->id, $r->flight_number) ?></h6>
                            <p>
                                <small>DATE: <?php echo date('l,j F Y', strtotime($r->flight_date)) ?></small><br/>
                                <small>DEST: <?php echo $r->departure_city ?> - <?php echo $r->arrival_city ?></small><br/>
                                <small>STD/ETD: <?php echo $r->flight_std ?> - <?php echo $r->flight_etd ?></small><br/>

                            </p>
                        </td>
                        <?php foreach ($doc_upload_type as $k => $d): ?>
                            <td>
                                <?php echo document_button_title($attachments, $r, $k) ?>
                            </td>
                        <?php endforeach; ?>
                        <td class="span1"><?php the_user($r->user_id) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>
</div>

<div class="row">
    <div class="span4">
        <h6>Legenda:</h6>
        <p><a class="btn btn-small btn-success" href="#">&nbsp;</a> = upload</p>
        <p><a class="btn btn-small btn-warning" href="#">&nbsp;</a> = via offline</p>
        <p><a class="btn btn-small btn-danger" href="#">&nbsp;</a> = not set</p>
    </div>
</div>

