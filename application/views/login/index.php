<div class="row">
    <div class="span12">
        <div class="alert alert-block">
            <h4 class="alert-heading">Please Login!</h4>
            <?php if (isset($error)): ?>
                <p><?php echo $error ?></p>
            <?php else: ?>
                <p>Use your username and password to gain access to the applications.</p>
            <?php endif; ?>
        </div>

        <?php echo form_open('', 'class="form-horizontal"') ?>
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="username">Username</label>
                <div class="controls">
                    <input class="input-xlarge focused" id="username" type="text" value="" name="username">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input class="input-xlarge focused" id="password" type="password" value="" name="password">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-large btn-primary"> &nbsp;&nbsp;&nbsp;&nbsp; Login &nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
        </fieldset>
        <?php echo form_close() ?>
    </div>
</div>