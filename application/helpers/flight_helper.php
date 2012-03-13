<?php

function the_request_status($r) {
    switch ($r->flight_status) {
        default:
        case 0:
            echo '<span class="label label-warning">waiting</span>';
            break;
        case 1:
            echo '<span class="label label-info">approved</span>';
            break;
        case 2:
            echo '<span href="#" class="label label-warning">rejected</span>';
            break;
    }
}

function the_request_option($r) {
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

