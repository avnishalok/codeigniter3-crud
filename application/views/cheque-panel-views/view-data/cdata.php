<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- header section -->
<?php $this->load->view(PAGE_HEADER, array('title' => $pageTitle)); ?>
<!-- /header section -->

<!-- header section -->
<?php $this->load->view(PAGE_HEADER_TOP); ?>
<!-- /header section -->

<script>
  
function callCrudAction(action,id) {
    var postUrl = "<?php echo JS_METHOD;?>";
    var jsonData,formdata = "";
    var queryString;
    switch(action) {
        case "edit":
            /*
             * queryString = 'action='+action+'&checkId='+ id; 
             * If you don't want to bother about sending data in json format then 
             * this is best because in this way you don't need to decode it
             * 
            */
               
            //queryString = "{'action':'" + action+ "', 'checkId':'" + id+ "'}";
            //remember here: json key: value must be in "" not in '' as above.
            queryString = '{"action":"' + action+ '", "checkId":"' + id+ '"}';

        break;
        case "form_val":
        //convert form data(object) into string.
        formdata = JSON.stringify($( "#cheque_form_data" ).serializeArray());
        //return false;
        queryString = formdata;
        break;
        case "change_password":
            //queryString = 'action='+action+'&emp_change_id='+ id;
        break;
        case "emp_update_pass":
         $("#deleteview").modal("hide");
          var emp_pass_val=$("#emp_pass_value").val();
        //queryString = 'action='+action+'&emp_update_pass_id='+ id+'&emp_pass_val='+ emp_pass_val;
        break;
        case "delete_view":
            //queryString = 'action='+action+'&delete_id='+ id;
        break;
        case "con_delete":
        $("#deleteview").modal("hide");
            //queryString = 'action='+action+'&con_delete_id='+ id;
        break;
    }

    $.ajax({
        type: "POST",
        contentType: "application/json",
        url: postUrl,
        data: queryString,
        dataType: "json",
        success:function(data){
            switch(action) {
              case "edit":
              jsonData = data;
              //don't need parsing here. Jquery does this automatically.
              //var jsssss = JSON.parse(JSON.stringify(data)); console.log(jsssss);
              if(!(jsonData.error == "No any data found")){
                $("#hidden_id").val(jsonData[0].id);
                $("#custEmail").val(jsonData[0].custEmail);
                $("#custName").val(jsonData[0].custName);
                $("#custCheckNo").val(jsonData[0].checkNo);
                $("#street_address").val(jsonData[0].custStreetAddress);
                $("#phone_no").val(jsonData[0].custPhone);
                $("#cust_city").val(jsonData[0].custCity);
                $("#cust_amount").val(jsonData[0].amount);
                $("#cust_state").val(jsonData[0].custState);
                $("#cust_zipcode").val(jsonData[0].custZipCode);
                $("#cust_memo").val(jsonData[0].memo1);
                $("#cust_cmp").val(jsonData[0].cmp);
                $("#bank_name").val(jsonData[0].bankName);
                $("#bank_address").val(jsonData[0].bankAddress);
                $("#bank_city").val(jsonData[0].bankCity);
                $("#bank_state").val(jsonData[0].bankState);
                $("#routing").val(jsonData[0].routingNo);
                $("#acno").val(jsonData[0].accountNo);
                $("#cnf_acno").val(jsonData[0].confirmAccountNo);
                $("#edit_model").modal();
              }
              else{
                alert(jsonData.error);
              } 
              break;

              case "form_val":
                alert(data.message);
                location.reload();
              break;
              default: alert("No any activity");
            }
        },
        error: errorHandler
        });
}

function errorHandler(jqXHR, exception) {
    $(".ajax_loader").hide();  
    if (jqXHR.status === 0) {
        alert('Not connect.\n Verify Network.');
    } else if (jqXHR.status == 404) {
        alert('Requested page not found. [404]');
    } else if (jqXHR.status == 500) {
        alert('Internal Server Error [500].');
    } else if (exception === 'parsererror') {
        alert('Requested JSON parse failed.');
    } else if (exception === 'timeout') {
        alert('Time out error.');
    } else if (exception === 'abort') {
        alert('Ajax request aborted.');
    } else {
        alert('Uncaught Error.\n' + jqXHR.responseText);
    }
}

</script>


            <div id="page-wrapper">
                <div class="graphs">
                    <div class="xs tabls">

                        <!-- form start -->

                        <!-- <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
                            <div class="panel-heading">
                                <h2>Welcome here  <i class="fa fa-bars pull-right" aria-hidden="true"></i></h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
                                </div>
                            </div>
                            <div class="panel-body no-padding" style="display: block;">

                                <form id="" action="">
                                    <div class="col-md-3">

                                        <div class="form-group mtop25">
                                            <select id="select_department" name="select_department" placeholder="Select department" class="form-control" required>
                                                <option value="">Select department</option>
                                                <option value="dsf">dsfsdf</option>
                                                <option value="sdfdsf">sdfsd</option>
                                            </select>

                                        </div>

                                    </div>
                                    <div class="col-md-3">

                                        <div class="form-group mtop25">
                                            <select id="employee" name="employee" placeholder="employee" class="form-control" required>
                                                <option value="">Employee</option>
                                                <option value="dsf">dsfsdf</option>
                                                <option value="sdfdsf">sdfsd</option>
                                            </select>

                                        </div>


                                    </div>
                                    <div class="col-md-2">

                                        <div class="form-group mtop25">
                                            <select id="select_month" name="select_month" placeholder="select_month" class="form-control" required>
                                                <option value="">Select Month</option>
                                                <option value="dsf">dsfsdf</option>
                                                <option value="sdfdsf">sdfsd</option>
                                            </select>

                                        </div>


                                    </div>
                                    <div class="col-md-2">

                                        <div class="form-group mtop25">
                                            <select id="select_year" name="select_year" placeholder="select_year" class="form-control" required>
                                                <option value="">Select Year</option>
                                                <option value="dsf">dsfsdf</option>
                                                <option value="sdfdsf">sdfsd</option>
                                            </select>

                                        </div>



                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="snd_enquery" class="btn-success btn">Submit</button>
                                    </div>


                                </form>

                            </div>
                        </div> -->

                        <!--form end-->

                        <!--table  start-->

                        <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
                            <div class="panel-heading">
                                <h2>Check Details  <i class="fa fa-bars pull-right" aria-hidden="true"></i></h2>
                                <div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
                                </div>
                            </div>
                            <div class="panel-body no-padding" style="display: block;">




                                <div class="table-responsive">


                                    <table id="mytable" class="table table-bordred ">

                                        <thead>

                                            <th>SNo.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Amount</th>
                                            <th>Check No.</th>
                                            <th>Routing No.</th>
                                            <th>Account No.</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>PDF</th>
                                        </thead>
                                        <tbody>

                                        <?php
                                            if(!empty($userRecords))
                                            {
                                                $ctr = 1;
                                                foreach($userRecords as $record)
                                                {
                                            ?>
                                            <tr>
                                            <td><?php echo $ctr; ?></td>
                                              <td><?php echo $record->custName ?></td>
                                              <td><?php echo $record->custEmail ?></td>
                                              <td><?php echo $record->custPhone ?></td>
                                              <td><?php echo $record->amount ?></td>
                                              <td><?php echo $record->checkNo ?></td>
                                              <td><?php echo $record->routingNo ?></td>
                                              <td><?php echo $record->accountNo ?></td>
                                              <td>
                                                  <p data-placement="top" data-toggle="tooltip" title="Edit">
                                                        <button class="btn btn-primary btn-xs" data-title="Edit" 
                                                        onclick="callCrudAction('edit','<?php echo $record->id ?>')">
                                                         <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </p>
                                              </td>
                                              <td>
                                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span>
                                                        </button>
                                                    </p>
                                                </td>
                                                <td>
                                                <a href="pdf/<?php echo $record->id ?>" target="_blank">PDF</a>
                                                </td>
                                            </tr>
                                            <?php
                                            ++$ctr;
                                                }
                                            }
                                            else{
                                                ?>
                                                <tr>
                                                <td colspan="11" class="text-center"><div class="btn btn-block btn-danger">No Record Found.</div></td>
                                                </tr>
                                           <?php     
                                            }
                                            ?>

                                          
                                        </tbody>

                                    </table>

                                    <div class="clearfix"></div>

                                </div>




                                <div class="modal fade" id="edit_model" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                                <h4 class="modal-title custom_align" id="Heading">Edit Details</h4>
                                            </div> -->
                                            <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                            <form method="post" name="cheque_form_data" id="cheque_form_data" onsubmit="event.preventDefault();callCrudAction('form_val','')">
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                 <div class="form-group">
                                                    <input class="form-control" id="custEmail" name="custEmail" type="text" placeholder="Email">
                                                </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control " id="custName" name="custName" type="text" placeholder="Name">
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">

                                                    <input class="form-control " id="custCheckNo" name="custCheckNo" type="text" placeholder="Check No.">
                                                </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="street_address" name="street_address" type="text" placeholder="Street address" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="phone_no" name="phone_no" type="text" placeholder="Phone No." class="form-control " >
                                                </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="cust_city" name="cust_city" type="text" placeholder="City" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="cust_amount" name="cust_amount" type="text" placeholder="Amount" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="cust_state" name="cust_state" type="text" placeholder="State" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="cust_zipcode" name="cust_zipcode" type="text" placeholder="Zip Code" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="cust_memo" name="cust_memo" type="text" placeholder="Memo" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="cust_cmp" name="cust_cmp" type="text" placeholder="Company" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="bank_name" name="bank_name" type="text" placeholder="Bank Name" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="bank_address" name="bank_address" type="text" placeholder="Bank Address" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="bank_city" name="bank_city" type="text" placeholder="Bank City" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="bank_state" name="bank_state" type="text" placeholder="Bank State" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="routing" name="routing" type="text" placeholder="Routing" class="form-control " >
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="acno" name="acno" type="text" placeholder="Account No." class="form-control " >
                                                    <input type="hidden" name="hidden_id" id="hidden_id">
                                                </div>
                                                </div>
                                                                                                                                  
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="submit" class="btn btn-warning btn-block btn-lg" >
                                                <span class="glyphicon glyphicon-ok-sign"></span> Update
                                                </button>
                                            </div>
                                           </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>



                                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </button>
                                                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                            </div>
                                            <div class="modal-body">

                                                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            </div>

                        </div>
                    </div>


                    <!--table  end--->

                </div>
            </div>
        </div>
        </div>

<!-- footer section -->
<?php  $this->load->view(CHEQUE_INCLUDE.'footer'); ?>
<!-- /footer section -->

</body>

</html>