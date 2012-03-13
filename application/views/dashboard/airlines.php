<div class="row">
    <div class="span12">
        <h3>Airlines</h3>
        <div class="row">
            <div class="span3">
                <div class="thumbnail">
                    <div class="caption">
                        <h5>Hello <?php echo $user_data['fullname'] ?></h5>
                        <p>You've been registered under <?php the_airlines($this->session->userdata('airlines_id')) ?></p>
                    </div>
                </div>
            </div>
            <div class="span3">
                <div class="thumbnail">
                    <div class="caption">
                        <h5><a href="<?php echo site_url('voucher/add') ?>">REQUEST VOUCHER</a></h5>
                        <p style="min-height: 60px;">You can request a voucher through here</p>
                        <p>
                            <a class="btn btn-small btn-info" href="<?php echo site_url('voucher/add') ?>">REQUEST VOUCHER</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="span3">
                <div class="thumbnail">
                    <div class="caption">
                        <h5><a href="<?php echo site_url('release') ?>">RELEASE</a></h5>
                        <p style="min-height: 60px;">This is where you can view all the release voucher</p>
                        <p><a class="btn btn-small btn-info" href="<?php echo site_url('release') ?>">VIEW RELEASE</a></p>
                    </div>
                </div>
            </div>
            <div class="span3">
                <div class="thumbnail">
                    <div class="caption">
                        <h5><a href="<?php echo site_url('setting') ?>">YOUR PREFERENCES</a></h5>
                        <p style="min-height: 60px;">Change Password and view your log</p>
                        <p><a class="btn btn-small btn-info" href="<?php echo site_url('setting') ?>">SETTINGS</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
