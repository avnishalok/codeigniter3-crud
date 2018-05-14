<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- use  class="sticky-header" if you don't want to collapse the menu bar by default.-->
<body class="sticky-header left-side-collapsed"  onload="initMap()">
    <section>
        <!--left side bar-->
        <?php $this->load->view(CHEQUE_INCLUDE.'leftsidebar.php'); ?>
        <!-- left side bar end -->

        <!-- main content start-->
        <div class="main-content">
         <!-- header-starts -->
            <div class="header-section"> 
            <!--toggle button start-->
            <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--notification menu start -->
            <div class="menu-right">
                <div class="user-panel-top">    
                    
                    <div class="profile_details">       
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                
                                    <div class="profile_img">   
                                        
                                         <div class="user-name">
                                            <p><?= $name ?></p>
                                         </div>
                                         <i class="lnr lnr-chevron-down"></i>
                                         <i class="lnr lnr-chevron-up"></i>
                                        <div class="clearfix"></div>    
                                    </div>  
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
                                    <li> <a href="#"><i class="fa fa-user"></i>Profile</a> </li> 
                                    <li> <a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                </ul>
                            </li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>      
                              
                    <div class="clearfix"></div>
                </div>
              </div>
            <!--notification menu end -->
            </div>
        <!-- //header-ends -->       