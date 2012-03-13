<?php the_breadcrumbs($breadcrumbs) ?>
<div class="row">
    <div class="span12">
        <h3>Flight Data Order By Flight Date</h3>
        <table class="table table-striped table-bordered table-condensed">
            <thead>


                <tr>
                    <th>Flight Date</th>
                    <th>Flight Number</th>
                    <th>Ticket</th>
                    <th>Name</th>
                    <th>Departure City</th>
                    <th>Arrival City</th>
                    <th>Delay Reason</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $r): ?>
                    <tr>
                        <td><?php echo $r->flight_date ?></td>
                        <td><?php echo anchor('insurance/detail/' . $r->flight_id, $r->flight_number) ?></td>
                        <td><?php echo $r->passanger_ticket ?></td>
                        <td><?php the_voucher($r->flight_number, $r->voucer_id) ?></td>
                        <td><?php echo $r->passanger_name ?></td>
                        <td><?php echo $r->departure_city ?></td>
                        <td><?php echo $r->arrival_city ?></td>
                        <td><?php echo $r->delay_reason ?></td>
                        <td>
                            <?php echo the_print(site_url('flight/print_voucher/' . $r->voucer_id)) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>

</div>