<?php

function document_status($voucher_id)
{

    $ci = get_instance();
    $ci->db->where('voucher_id', $voucher_id);
    $row = $ci->db->get('attachments')->num_rows();
    $c = config_item('doc_upload_type');
    if ($row < count($c)) {
        echo '<span class="label label-warning">not completed</span>';
    } else {
        echo '<span class="label label-success">completed</span>';
    }
}

function voucher_status($r)
{
    switch ($r->voucher_status) {
        default:
        case 0:
            echo '<span class="label label-info">new</span>';
            break;
        case 1:
            echo '<span class="label label-warning">request</span>';
            break;
        case 2:
            echo '<span class="label label-success">printed</span>';
            break;
        case 3:
            echo '<span class="label label-info">ready</span>';
            break;
    }
}

function the_verification_form_status($r, $mode=0)
{
    switch ($r->voucher_verified) {
        case 1:
            echo '<strong class="label label-success">Approved</strong>';
            break;
        case 2:
            echo '<strong class="label label-important">rejected</strong>';
            break;
        case 0:
            echo '<strong class="label label-warning">on progress</strong>';
            break;
        default :
            if (!$mode) {
                echo 'not set';
            }
            break;
    }
}

function the_verification_form_link($r)
{
    switch ($r->voucher_verified) {
        case 1:
            echo anchor(site_url('ciu/verification/' . $r->id . '/2'), 'set to Reject?');
            break;
        case 2:
            echo anchor(site_url('ciu/verification/' . $r->id . '/1'), 'set to Approve?');
            break;
        default :
            echo anchor(site_url('ciu/verification/' . $r->id . '/1'), 'Approve') . ' or ' . anchor(site_url('ciu/verification/' . $r->id . '/2'), 'Reject') . '?';
            break;
    }
}

function the_index_attachment_button($r)
{
    $ci = get_instance();
    $a = $ci->voucher_model->get_attachment($r->id);
    $doc_type = config_item('doc_upload_type');
    foreach ($doc_type as $k => $v) {
        if (isset($a[$k]) && $a[$k]->offline_mode) {
            echo '<a href="#" class="btn btn-small btn-warning" data-original-title="offline ' . $v . '" rel="tooltip"><i class="icon-exclamation-sign icon-white"></i></a>
        ';
        } elseif (isset($a[$k]) && $a[$k]->attachment_file) {
            echo '<a href="' . site_url('ciu/attachment/' . $r->id . '/' . $k) . '" class="btn btn-small  btn-success" data-original-title="download ' . $v . '" rel="tooltip"><i class="icon-download icon-white"></i></a>
        ';
        } else {
            echo '<a href="#" class="btn btn-small btn-danger" data-original-title="nothing is set for ' . $v . '" rel="tooltip"><i class="icon-remove-sign icon-white"></i></a>
        ';
        }
    }
}
