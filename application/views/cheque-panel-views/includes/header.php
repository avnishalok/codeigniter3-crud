<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>

<head>
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="<?=CHEQUE_CSS?>bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <?php 
    //If there is login page load css dynamically.
    if(isset($css)) { 
    ?>
    <link href="<?php echo $css; ?>" rel='stylesheet' type='text/css' />
    <?php 
    }
    //else load style.css for all other pages. 
    else { 
    ?>
    <link href="<?=CHEQUE_CSS?>style.css" rel='stylesheet' type='text/css' />
    <?php } ?>
    <!-- /Custom CSS -->
    <link href="<?=CHEQUE_CSS?>font-awesome.css" rel="stylesheet">
    <!-- lined-icons -->
    <link rel="stylesheet" href="<?=CHEQUE_CSS?>icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
    <!--animate-->
    <link href="<?=CHEQUE_CSS?>animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="<?=CHEQUE_JS?>jquery-1.10.2.min.js"></script>
    <script src="<?=CHEQUE_JS?>bootstrap.min.js"></script>
    <script src="<?=CHEQUE_JS?>wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    
    <!-- Placed js at the end of the document so the pages load faster -->

</head>

