<?php the_breadcrumbs($breadcrumbs) ?>
<div class="row">
    <div class="span12">
        <h3>Flight Data Order By Flight Date</h3>
        <table class="table table-striped table-bordered table-condensed">
            <thead>

                <tr>
                    <th colspan="5" style="border-bottom: solid 1px #ccc"></th>
                    <th colspan="3" style="border-bottom: solid 1px #ccc;text-align: center">Total Pax</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Flight Date</th>
                    <th>Flight Number</th>
                    <th>Departure City</th>
                    <th>Arrival City</th>
                    <th>Delay Reason</th>
                    <th>Delay</th>
                    <th>Transfer</th>
                    <th>Canceled</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flights as $r): ?>
                    <tr>
                        <td><?php echo $r->flight_date ?></td>
                        <td><?php echo $r->flight_number ?></td>
                        <td><?php echo $r->departure_city ?></td>
                        <td><?php echo $r->arrival_city ?></td>
                        <td><?php echo $r->delay_reason ?></td>
                        <td><?php echo $r->total_pax_delay ?></td>
                        <td><?php echo $r->total_pax_transfer ?></td>
                        <td><?php echo $r->total_pax_cancelled ?></td>
                        <td>
                            <a href="<?php echo site_url('insurance/detail/' . $r->id) ?>" class="btn btn-small btn-info">detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $pagination ?>
    </div>

</div>