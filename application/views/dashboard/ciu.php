<div class="row">
    <div class="span12">
        <div class="row">
            <div class="span12">
                <h3>Airlines</h3>
                <div class="alert">
                    <h5>Hello <?php echo $user_data['fullname'] ?></h5>
                    <p>your last login was on <strong><?php echo date('Y-m-d H:i', $this->session->userdata('old_last_login')) ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

