<div class="row">
    <div class="span12">
        <h3>Document Upload for Flight Data (Order By Flight Date)</h3>
        <hr/>
        <table class="table table-striped table-bordered table-condensed">
            <thead>

                <tr>
                    <th>Flight Number</th>
                    <th>File</th>
                    <th>Req By</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vouchers['data'] as $r): ?>
                    <tr style="font-size: 11px">
                        <td>
                            <h4><?php echo anchor('release/detail/' . $r->id, $r->flight_number) ?></h4>
                            <p>
                                <small><?php echo $r->flight_date ?></small><br/> 
                                <span class="label label-important"><?php echo $r->voucher_type ?></span> 
                                <?php echo $r->departure_city ?> - <?php echo $r->arrival_city ?> / <?php echo $r->flight_std ?> - <?php echo $r->flight_etd ?>
                            </p>
                        </td>
                        <td >
                            <?php foreach ($doc_upload_type as $k => $d): ?>
                                <?php $class_btn = isset($attachments[$r->id][$k]) ? '#' : 'danger'; ?>
                                <a rel="tooltip" 
                                   data-original-title="<?php echo $d ?> <?php echo document_button_title($attachments, $r, $k) ?> " 
                                   class="btn btn-small btn-<?php echo document_button_class($attachments, $r, $k) ?>" 
                                   href="<?php echo site_url('document/upload/' . $r->id . '/' . $k) ?>"><i class="icon-file icon-<?php echo $doc_upload_type_icon[$k] ?>"></i> </a>
                               <?php endforeach; ?>
                        </td>
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

