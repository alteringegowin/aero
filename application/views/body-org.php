<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Aero</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le styles -->
        <link href="<?php echo $themes ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $themes ?>css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo $themes ?>css/app.css" rel="stylesheet">
        <link href="<?php echo $themes ?>css/datepicker.css" rel="stylesheet">



        <script src="<?php echo $themes ?>js/jquery.js"></script>
        <script src="<?php echo $themes ?>js/bootstrap-tooltip.js"></script>

        <?php if (isset($js) && $js == 'ciu'): ?>
            <script src="<?php echo $themes ?>js/bootstrap-collapse.js"></script>
            <script src="<?php echo $themes ?>js/ciu.js"></script>
        <?php else: ?>
            <script src="<?php echo $themes ?>js/bootstrap-datepicker.js"></script>
            <script src="<?php echo $themes ?>js/voucher.js"></script>

        <?php endif; ?>

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo $themes ?>images/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo $themes ?>images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $themes ?>images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $themes ?>images/apple-touch-icon-114x114.png">
    </head>

    <body style="padding:2px 0;">
        <div class="container">
            <div id="header">
                <div class="row">
                    <div id="logo" class="span12">
                        <div class="row">
                            <div class="span8 offset4" style="text-align: right;">
                                <h1>
                                    <a href="<?php echo site_url() ?>">AERO</a>
                                    <small style="display: block;">Highly customizable Applications For Your Flight Bussiness</small>
                                </h1>
                            </div>
                        </div>
                    </div> 
                </div>

                <?php if ($this->session->userdata('user_id')): ?>
                    <div class="subnav">
                        <ul class="nav nav-pills">
                            <li class="<?php echo get_current_class('dashboard', 1) ?>"><?php echo anchor('dashboard', 'Dashboard') ?></li>
                            <?php if ($this->session->userdata('group') == 'airlines'): ?>
                                <li class="<?php echo get_current_class('voucher', 1) ?>"><?php echo anchor('voucher', 'Voucher') ?></li>
                                <li class="<?php echo get_current_class('release', 1) ?>"><?php echo anchor('release', 'Release') ?></li>
                            <?php endif; ?>

                            <?php if ($this->session->userdata('group') == 'ciu'): ?>
                                <li class="<?php echo get_current_class('ciu', 1) ?>"><?php echo anchor('ciu', 'CIU') ?></li>
                                <li class="<?php echo get_current_class('ciu_notification', 1) ?>"><?php echo anchor('ciu_notification', 'Notification') ?></li>
                            <?php endif; ?>
                            <li><a href="<?php echo site_url('logout') ?>">Logout</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <?php echo $content; ?>

        </div> <!-- /container -->


    </body>
</html>
