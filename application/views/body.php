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
        <script src="<?php echo $themes ?>js/bootstrap-modal.js"></script>

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

    <body style="padding:0px 0;">

        <!-- header -->
        <div style="background:#f5f5f5; border-bottom:1px solid #fff">
            <div class="container">
                <div class="row">
                    <div class="span5" style="background:none;">
                        <a href="#"><img src="<?php echo $themes ?>img/logo-pcaero.png" style="display:block; margin-top:10px;" alt="PC AERO"></a>
                        <p style="font-size:13px;">Highly Customizable System for Your Flight Bussiness</p>
                    </div>
                    <div id="logo-airlines" class="span7">
                        <?php the_logo()?>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.header -->

        <!-- nav -->
        <div style="background:#333; border-top:1px solid #ccc; border-bottom:5px solid #ccc;">
            <div class="container">
                <div class="row" style="background:none">
                    <div class="span12" style="background:none; height:36px;  padding-top:20px;">


                        <?php if ($this->session->userdata('user_id')): ?>
                            <div class="subnav">
                                <ul class="nav nav-pills">
                                    <li class="<?php echo get_current_class('dashboard', 1) ?>"><?php echo anchor('dashboard', 'Dashboard') ?></li>
                                    <?php if ($this->session->userdata('group') == 'airlines'): ?>
                                        <li class="<?php echo get_current_class('voucher', 1) ?>"><?php echo anchor('voucher', 'Voucher') ?></li>
                                        <li class="<?php echo get_current_class('release', 1) ?>"><?php echo anchor('release', 'Release') ?></li>
                                        <li class="<?php echo get_current_class('document', 1) ?>"><?php echo anchor('document', 'Documents') ?></li>
                                    <?php endif; ?>

                                    <?php if ($this->session->userdata('group') == 'ciu'): ?>
                                        <li class="<?php echo get_current_class('ciu', 1) ?>"><?php echo anchor('ciu', 'Progress Monitoring') ?></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo site_url('logout') ?>">Logout</a></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.nav -->    

        <!-- content -->
        <div class="container" style="padding-top:30px; padding-bottom:30px;">

            <?php echo $content; ?>

        </div> <!-- /container -->
        <!-- /.content -->

        <!-- footer -->
        <div style="background:#333; border-bottom:6px solid #000">
            <div class="container">
                <div class="row">
                    <div class="span12" style="background:none; height:50px; color:#ccc">&copy; 2012 PC AERO Ver.2</div>
                </div>
            </div>
        </div>
        <!-- /.footer -->

    </body>
</html>
