<?php

function the_request_status($r)
{
    switch ($r->voucher_type) {
        default:
        case 'delay':
            echo '<span class="label label-warning">'.anchor('release/detail/' . $r->id,'DELAY').'</span>';
            break;
        case 'cancelled':
            echo '<span class="label label-info">'.anchor('release/detail/' . $r->id,'CANCELLED').'</span>';
            break;
    }
}

function the_request_option($r)
{
    switch ($r->flight_status) {
        default:
        case 0:
            echo '&nbsp;';
            break;
        case 1:
            echo '<a href="' . site_url('flight/detail/' . $r->id) . '" class="btn btn-small">view</a>';
            break;
        case 2:
            echo '<a href="#" class="btn btn-small">rejected</a>';
            break;
    }
}

