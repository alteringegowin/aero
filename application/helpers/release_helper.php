<?php

function option_status($r)
{
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

function the_voucher_status($r)
{
    switch ($r->voucher_status) {
        case 0:
            echo '<strong class="label label-important">on progress</strong>';
            break;
        case 2:
            echo '<strong class="label label-success">printed</strong>';
            break;
        default :
            if ($r->voucher_verified) {
                echo '<strong class="label label-warning">ready for print</strong>';
            } else {
                echo '<strong class="label label-important">on progress</strong>';
            }
            break;
    }
}

function the_verification_form_status($r, $mode=0)
{
    switch ($r->voucher_verified) {
        case 1:
            echo '<strong class="label label-success">processed</strong>';
            break;
        case 2:
            echo '<strong class="label label-important">rejected</strong>';
            break;
        case 0:
            echo '<strong class="label label-important">on progress</strong>';
            break;
        default :
            if (!$mode) {
                echo 'not set';
            }
            break;
    }
}

function show_upload_button($r)
{
    if ($r->offline_mode) {
        return 'hide';
    }

    if ($r->attachment_file) {
        return 'hide';
    }
    return '';
}

function show_attachment_file($r)
{
    if ($r->attachment_file && !$r->offline_mode) {
        echo '<p><span class="label label-warning">' . $r->attachment_file . '</span></p>';
    }
}