<?php

function option_status($r) {
    switch ($r) {
        case 1:
            echo '<span class="label label-info">delay</span>';
            break;
        case 2:
            echo '<span class="label">transfer</span>';
            break;
        case 3:
            echo '<span class="label label-success">reroute</span>';

            break;
        case 4:
            echo '<span class="label label-important">cancel</span>';

            break;
        default:
            echo '&nbsp;';
            break;
    }
}

function show_upload_button($r) {
    if ($r->offline_mode) {
        return 'hide';
    }

    if ($r->attachment_file) {
        return 'hide';
    }
    return '';
}

function show_attachment_file($r) {
    if ($r->attachment_file && !$r->offline_mode) {
        echo '<p><span class="label label-warning">' . $r->attachment_file . '</span></p>';
    }
}