<div class="row">
    <div class="span4">
        <div id="infoMessage"><?php echo $message; ?></div>

        <?php echo form_open(current_url(), array('class' => 'well')); ?>

        <label>Old Password</label>
        <?php echo form_input($old_password); ?>

        <label>New Password</label>
        <?php echo form_input($new_password); ?>

        <label>Confirm New Password</label>
        <?php echo form_input($new_password_confirm); ?>

        <?php echo form_input($user_id); ?>
        <label>&nbsp;</label>
        <button class="btn" type="submit">Change Password</button>

        <?php echo form_close(); ?>

    </div>
    <div class="span8">
        <div class="alert">
            <h4>Warning!</h4>
            <p>Please Make Your Password Hard to Guess</p>
        </div>
    </div>
</div>
