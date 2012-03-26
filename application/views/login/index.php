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


<div class="modal hide" id="myModal-help">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Help</h3>
    </div>
    <div class="modal-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
</div>



<div class="modal hide" id="myModal-about-us">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>About Us</h3>
    </div>
    <div class="modal-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
</div>


<div class="modal hide" id="myModal-terms">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Terms And Condition</h3>
    </div>
    <div class="modal-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
</div>

<div class="modal hide" id="myModal-disclaiminer">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Disclaiminer</h3>
    </div>
    <div class="modal-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
</div>

<div class="modal hide" id="myModal-disclaiminer">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Disclaiminer</h3>
    </div>
    <div class="modal-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
</div>


<div class="modal hide" id="myModal-info">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Info</h3>
    </div>
    <div class="modal-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu eros quam. Vivamus consectetur magna ut purus pulvinar eu gravida purus elementum. Vestibulum imperdiet, libero at convallis facilisis, elit nisi interdum neque, quis placerat sem leo ut mauris. Donec mattis semper sapien, nec mollis diam lobortis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi laoreet scelerisque arcu, condimentum facilisis odio vulputate quis. Mauris porttitor nibh nec nulla tincidunt varius. Fusce dignissim vulputate nulla, nec pellentesque magna bibendum nec. Mauris a tellus ut massa porta blandit. Nulla facilisi. Integer cursus iaculis nisl eu euismod. Integer mattis rhoncus felis ut vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras vulputate ligula id arcu porta pulvinar.</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
</div>