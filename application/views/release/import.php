<style>
    /*AJAX LOADER
-------------------*/
    #loading{
        position: fixed;
        top: 50%;
        left: 50%;
        z-index: 5000;
        background-color: red;
        font-size: 250%;
        color: white;
        padding: 12px;
        margin-top: -50px;
        margin-left: -100px;
    }
</style>


<?php the_breadcrumbs($breadcrumbs) ?>
<h3>Passanger Data</h3>
<hr/>

<?php if (isset($is_frozzen) && $is_frozzen): ?>
    <div class="row">
        <div class="span12">
            <div class="alert alert-danger">
                <h5>Data Imported!</h5>
            </div>
        </div>
    </div>

<?php endif; ?>

<div class="row">
    <div class="span4">

        <div class="row">
            <div class="span4">
                <div class="alert alert-info">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>Please make sure that the format of your csv is same with our pattern. </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span4">
                <div class="alert alert-info">
                    <h4 class="alert-heading">1. Download the CSV!</h4>
                    <p>Please download the file here. The Voucher list is included on the CSV file</p>
                    <p><a href="<?php echo site_url('release/download/' . $flight->id) ?>" class="btn btn-large btn-primary">DOWNLOAD HERE</a></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span4">
                <div class="alert alert-info">
                    <h4 class="alert-heading">2. Entry Pax Data According the CSV Files!</h4>
                    <p>All the data is already prepare, you just have to enter passenger name, passenger ticket number and the remark. Passenger name and ticket is mandatory field</p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="span4">
                <div class="alert alert-info">
                    <h4 class="alert-heading">3. Upload the CSV Files!</h4>
                    <?php echo form_open_multipart('', array('class' => '')) ?>
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-error">
                            <h4 class="alert-heading">Error!</h4>
                            <ul>
                                <?php echo validation_errors('<li>', '</li>') ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="control-group">
                        <label class="control-label" for="fileInput">File input</label>
                        <div class="controls">
                            <input class="input-file" id="fileInput" type="file" name="userfile">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="userfile2">Upload File</button>
                    <?php form_close() ?>  
                </div>
            </div>

        </div>


    </div>
    <div class="span8">

        <div class="row">
            <div class="span8">
                <div class="alert alert-success">
                    <h4 class="alert-heading">Or You Can Entry Manually</h4>
                    <p>Please make sure that the format of your csv is same with our pattern. </p>
                </div>

                <div id="loading" class="hide">please wait...</div>
            </div>
        </div>
        <div class="row">
            <div class="span8">
                <form id="form-one-by-one" action="#" method="get">
                    <table class="table table-bordered table-condensed kecil">
                        <thead>
                            <tr>
                                <th>Voucher Number</th>
                                <th>Price</th>
                                <th>Name</th>
                                <th>Ticket Number/PNR</th>
                                <th>Remark</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($passengers as $r): ?>
                                <tr id="row-<?php echo $r->id ?>" class="cc">
                                    <td>
                                        <?php echo $r->voucher_code ?>
                                        <span class="error-<?php echo $r->id ?>"></span>
                                    </td>
                                    <td><?php echo number_format($r->price) ?></td>
                                    <td><input type="text" class="input-small" id="name-<?php echo $r->id ?>" name="name-<?php echo $r->id ?>" placeholder="name.." value="<?php echo $r->passenger_name ?>"></td>
                                    <td><input type="text" class="input-small" id="ticket-<?php echo $r->id ?>" name="ticket-<?php echo $r->id ?>" placeholder="ticket.." value="<?php echo $r->passenger_ticket ?>"></td>
                                    <td><input type="text" class="input-small" id="remark-<?php echo $r->id ?>" name="remark-<?php echo $r->id ?>" placeholder="remark.." value="<?php echo $r->passanger_remark ?>"></td>
                                    <td><a href="<?php echo site_url('release/ajax_manifest/' . $r->id) ?>" class="btn btn-small btn-primary save-manifest" rel-data="<?php echo $r->id ?>">save</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>



