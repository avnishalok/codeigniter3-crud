<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!--footer section start-->
			<footer>
			   <p>&copy 2017. All Rights Reserved. </p>
			</footer>
        <!--footer section end-->

      <!-- main content end-->
   </section>
  
<script src="<?=CHEQUE_JS?>jquery.nicescroll.js"></script>
<script src="<?=CHEQUE_JS?>scripts.js"></script>


<script>
$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});

</script>