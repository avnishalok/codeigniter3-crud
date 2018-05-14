<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- header section -->
<?php $this->load->view(PAGE_HEADER, array('title' => $pageTitle)); ?>
<!-- /header section -->

<!-- header section -->
<?php $this->load->view(PAGE_HEADER_TOP); ?>
<!-- /header section -->

    <!-- content section -->
            <div id="page-wrapper">
                <div class="graphs" style="max-width:80%;">

                    <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
                        <div class="panel-heading">
                            <h2>Enter Check Details <i class="fa fa-bars pull-right" aria-hidden="true"></i></h2>

                            <div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span>
                            </div>
                        </div>
                        <div class="panel-body no-padding" style="display: block;">

                            <form method="post" id="" action="<?php echo base_url('addData') ?>">
                                <div class="row">
                                <?php
                                    $checkSuccess = ($this->session->flashdata('success') ? 'success' : '');
                                    $checkError = ($this->session->flashdata('error') ? 'danger' : '');
                                    $msgClass = $msg = '';
                                    if(!empty($checkSuccess)){
                                        $msg = $this->session->flashdata('success');
                                        $msgClass = $checkSuccess;
                                    }
                                    if(!empty($checkError)){
                                        $msg = $this->session->flashdata('error');
                                        $msgClass = $checkError;
                                    }
                                ?>
                                <?php if(!empty($msg)) { ?>
                                <div class="col-md-12">
                                    <div class="alert alert-<?= $msgClass ?> alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <?php echo $msg; ?>                    
                                    </div>
                                </div>
                                <?php } ?>

                                    <div class="col-md-12">
                                        <?php //echo validation_errors('<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>', '</div>'); ?>
                                    </div>
                                    <div class="col-md-12">
                                     <?php 
                                     $email_error = (form_error('email') ? 'has-error has-feedback' : '');
                                     if(!empty($email_error)){
                                        $emailData = '<span class="help-block">'.form_error('email').'</span>';
                                        $emailClass = $email_error;
                                        $emailIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $emailClass = $emailIcon = $emailData = '';
                                     } 
                                     ?>
                                        <div class="form-group <?= $emailClass ?>">
                                            <input id="enter email" name="email" type="text" placeholder="Enter email" class="form-control " value="<?= set_value('email') ?>">
                                            <?= $emailIcon ?>
                                            <?= $emailData ?>
                                        </div>
                                    </div>

                                    
                                    <!-- <div class="col-md-6">
                                        <label>
                                            <input type="checkbox"> Verify this check before saving</label>
                                    </div> -->
                                    <div class="clearfix"></div>
                                    
                                    <div class="col-md-6">
                                    <?php 
                                     $name_error = (form_error('name') ? 'has-error has-feedback' : '');
                                     if(!empty($name_error)){
                                        $nameData = '<span class="help-block">'.form_error('name').'</span>';
                                        $nameClass = $name_error;
                                        $nameIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $nameClass = $nameIcon = $nameData = '';
                                     } 
                                     ?>
                                        <div class="form-group <?= $nameClass ?>">
                                            <input id="account_holder_name" name="name" type="text" placeholder="Name" class="form-control " value="<?= set_value('name') ?>">
                                            <?= $nameIcon ?>
                                            <?= $nameData ?>
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="col-md-6">
                                    <?php 
                                     $checkNo_error = (form_error('check_no') ? 'has-error has-feedback' : '');
                                     if(!empty($checkNo_error)){
                                        $checkNoData = '<span class="help-block">'.form_error('check_no').'</span>';
                                        $checkNoClass = $checkNo_error;
                                        $checkNoIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $checkNoClass = $checkNoIcon = $checkNoData = '';
                                     } 
                                     ?>
                                        <div class="form-group <?= $checkNoClass ?>">
                                            <input id="check_np" name="check_no" type="text" placeholder="Check no" class="form-control " value="<?= set_value('check_no') ?>">
                                            <?= $checkNoIcon ?>
                                            <?= $checkNoData ?>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <!-- Text input-->
                                    <div class="col-md-6">
                                    <?php 
                                     $address_error = (form_error('street_address') ? 'has-error has-feedback' : '');
                                     if(!empty($address_error)){
                                        $addressData = '<span class="help-block">'.form_error('street_address').'</span>';
                                        $addressClass = $address_error;
                                        $addressIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $addressClass = $addressIcon = $addressData = '';
                                     } 
                                     ?>
                                        <div class="form-group <?= $addressClass ?>">
                                            <input id="street_address" name="street_address" type="text" placeholder="Street address" class="form-control " value="<?= set_value('street_address') ?>">
                                            <?= $addressIcon ?>
                                            <?= $addressData ?>
                                        </div>
                                    </div>  

                                    <div class="col-md-6">
                                    <?php 
                                     $phone_error = (form_error('phone_no') ? 'has-error has-feedback' : '');
                                     if(!empty($phone_error)){
                                        $phoneData = '<span class="help-block">'.form_error('phone_no').'</span>';
                                        $phoneClass = $phone_error;
                                        $phoneIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $phoneClass = $phoneIcon = $phoneData = '';
                                     } 
                                     ?>
                                        <div class="form-group <?= $phoneClass ?>">
                                            <input id="phone_no" name="phone_no" type="text" placeholder="Phone no" class="form-control " value="<?= set_value('phone_no') ?>">
                                            <?= $phoneIcon ?>
                                            <?= $phoneData ?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>    

                                    <div class="col-md-6">
                                    <?php 
                                     $city_error = (form_error('city') ? 'has-error has-feedback' : '');
                                     if(!empty($city_error)){
                                        $cityData = '<span class="help-block">'.form_error('city').'</span>';
                                        $cityClass = $phone_error;
                                        $cityIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $cityClass = $cityIcon = $cityData = '';
                                     } 
                                     ?>
                                        <div class="form-group <?= $cityClass ?>">
                                            <input id="city" name="city" type="text" placeholder="City" class="form-control " value="<?= set_value('city') ?>">
                                            <?= $cityIcon ?>
                                            <?= $cityData ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                    <?php 
                                     $amount_error = (form_error('amount') ? 'has-error has-feedback' : '');
                                     if(!empty($amount_error)){
                                        $amountData = '<span class="help-block">'.form_error('amount').'</span>';
                                        $amountClass = $amount_error;
                                        $amountIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $amountClass = $amountIcon = $amountData = '';
                                     } 
                                     ?>
                                        <div class="form-group <?= $amountClass ?>">
                                            <input id="amount" name="amount" type="text" placeholder="Amount" class="form-control " value="<?= set_value('amount') ?>">
                                            <?= $amountIcon ?>
                                            <?= $amountData ?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    
                                    <div class="col-md-6">
                                    <?php 
                                     $state_error = (form_error('state') ? 'has-error has-feedback' : '');
                                     if(!empty($state_error)){
                                        $stateData = '<span class="help-block">'.form_error('state').'</span>';
                                        $stateClass = $state_error;
                                        $stateIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $stateClass = $stateIcon = $stateData = '';
                                     } 
                                     ?>    
                                        <div class="form-group <?= $stateClass ?>">
                                            <input id="state" name="state" type="text" placeholder="State" class="form-control " value="<?= set_value('state') ?>">
                                            <?= $stateIcon ?>
                                            <?= $stateData ?>
                                        </div>
                                    </div>  

                                    <div class="col-md-6">
                                    <?php 
                                     $zip_error = (form_error('zip_code') ? 'has-error has-feedback' : '');
                                     if(!empty($zip_error)){
                                        $zipData = '<span class="help-block">'.form_error('zip_code').'</span>';
                                        $zipClass = $zip_error;
                                        $zipIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $zipClass = $zipIcon = $zipData = '';
                                     } 
                                     ?>  
                                        <div class="form-group <?= $zipClass ?>">
                                            <input id="zipcode" name="zip_code" type="text" placeholder="Zip code" class="form-control " value="<?= set_value('zip_code') ?>">
                                            <?= $zipIcon ?>
                                            <?= $zipData ?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <!-- Select Basic -->

                                    <div class="col-md-12">
                                        <div class="col-md-6 pleft">
                                    <?php 
                                     $memo_error = (form_error('memo_1') ? 'has-error has-feedback' : '');
                                     if(!empty($memo_error)){
                                        $memoData = '<span class="help-block">'.form_error('memo_1').'</span>';
                                        $memoClass = $memo_error;
                                        $memoIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $memoClass = $memoIcon = $memoData = '';
                                     } 
                                     ?> 
                                    <div class="form-group <?= $memoClass ?>">
                                        <label class="control-label fontsoze" for="appointmentfor">Pay of the Order</label>
                                        <input id="memo_1" name="memo_1" type="text" placeholder="Memo 1" class="form-control" value="<?= set_value('memo_1') ?>">
                                        <?= $memoIcon ?>
                                        <?= $memoData ?>
                                    </div>


                                        </div>

                                        <div class="col-md-6 martop">
                                    <?php 
                                     $cmp_error = (form_error('select_company') ? 'has-error has-feedback' : '');
                                     if(!empty($cmp_error)){
                                        $cmpData = '<span class="help-block">'.form_error('select_company').'</span>';
                                        $cmpClass = $cmp_error;
                                        $cmpIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $cmpClass = $cmpIcon = $cmpData = '';
                                     } 
                                     ?> 
                                            <div class="form-group <?= $cmpClass ?>">
                                                <select id="select" name="select_company" placeholder="Select company" class="form-control">
                                                    <option value="">Select company</option>
                                                    <option value="Geek Infotech LLC" 
                                                    <?php echo set_select('select_company','Geek Infotech LLC', ( !empty($data) && $data == "input" ? TRUE : FALSE )); ?>>Geek Infotech LLC</option>
                                                    <option value="Geeks Help">Geeks Help</option>
                                                </select>
                                                <?= $cmpData ?>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-md-12 ">   
                                        <div class="form-group">
                                            <input id="memo_2" name="memo_2" type="text" placeholder="Memo 2" class="form-control input-md" value="<?= set_value('memo_2') ?>">

                                        </div>

                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-6">
                                    <?php 
                                     $bank_error = (form_error('bank_name') ? 'has-error has-feedback' : '');
                                     if(!empty($bank_error)){
                                        $bankData = '<span class="help-block">'.form_error('bank_name').'</span>';
                                        $bankClass = $bank_error;
                                        $bankIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $bankClass = $bankIcon = $bankData = '';
                                     } 
                                     ?>    
                                        <div class="form-group <?= $bankClass ?>">
                                            <input name="bank_name" type="text" placeholder="Bank Name" class="form-control " value="<?= set_value('bank_name') ?>">
                                            <?= $bankIcon ?>
                                            <?= $bankData ?>
                                        </div>
                                    </div>  

                                    <div class="col-md-6">
                                    <?php 
                                     $bankAddress_error = (form_error('bank_address') ? 'has-error has-feedback' : '');
                                     if(!empty($bankAddress_error)){
                                        $bankAddressData = '<span class="help-block">'.form_error('bank_address').'</span>';
                                        $bankAddressClass = $bankAddress_error;
                                        $bankAddressIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $bankAddressClass = $bankAddressIcon = $bankAddressData = '';
                                     } 
                                     ?>  
                                        <div class="form-group <?= $bankAddressClass ?>">
                                            <input name="bank_address" type="text" placeholder="Bank Address" class="form-control " value="<?= set_value('bank_address') ?>">
                                            <?= $bankAddressIcon ?>
                                            <?= $bankAddressData ?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-6">
                                    <?php 
                                     $bankCity_error = (form_error('bank_city') ? 'has-error has-feedback' : '');
                                     if(!empty($bankCity_error)){
                                        $bankCityData = '<span class="help-block">'.form_error('bank_city').'</span>';
                                        $bankCityClass = $bankCity_error;
                                        $bankCityIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $bankCityClass = $bankCityIcon = $bankCityData = '';
                                     } 
                                     ?>    
                                        <div class="form-group <?= $bankCityClass ?>">
                                            <input name="bank_city" type="text" placeholder="Bank city" class="form-control " value="<?= set_value('bank_city') ?>">
                                            <?= $bankCityIcon ?>
                                            <?= $bankCityData ?>
                                        </div>
                                    </div>  

                                    <div class="col-md-6">
                                    <?php 
                                     $bankState_error = (form_error('bank_state') ? 'has-error has-feedback' : '');
                                     if(!empty($bankState_error)){
                                        $bankStateData = '<span class="help-block">'.form_error('bank_state').'</span>';
                                        $bankStateClass = $bankState_error;
                                        $bankStateIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $bankStateClass = $bankStateIcon = $bankStateData = '';
                                     } 
                                     ?>  
                                        <div class="form-group <?= $bankStateClass ?>">
                                            <input name="bank_state" type="text" placeholder="Bank State" class="form-control " value="<?= set_value('bank_state') ?>">
                                            <?= $bankStateIcon ?>
                                            <?= $bankStateData ?>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>


                                    <div class="col-md-12 pleft">
                                    <?php 
                                     $routing_error = (form_error('routing') ? 'has-error has-feedback' : '');
                                     if(!empty($routing_error)){
                                        $routingData = '<span class="help-block">'.form_error('routing').'</span>';
                                        $routingClass = $routing_error;
                                        $routingIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                     }
                                     else{
                                        $routingClass = $routingIcon = $routingData ='';
                                     } 
                                     ?>  
                                        <div class="col-md-4 pright">
                                            <div class="form-group <?= $routingClass ?>">
                                                <input id="routing" name="routing" type="text" placeholder="Routing" class="form-control" value="<?= set_value('routing') ?>">
                                                <?= $routingIcon ?>
                                                <?= $routingData ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pright">
                                        <?php 
                                         $checkAc_error = (form_error('checking_account') ? 'has-error has-feedback' : '');
                                         if(!empty($checkAc_error)){
                                            $checkData = '<span class="help-block">'.form_error('checking_account').'</span>';
                                            $checkAcClass = $checkAc_error;
                                            $checkAcIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                         }
                                         else{
                                            $checkAcClass = $checkAcIcon = $checkData = '';
                                         } 
                                         ?>
                                            <div class="form-group <?= $checkAcClass ?>">
                                                <input id="checking_account" name="checking_account" type="text" placeholder="Account No." class="form-control" value="<?= set_value('checking_account') ?>">
                                                <?= $checkAcIcon ?>
                                                <?= $checkData ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pright">
                                        <?php 
                                         $confirmAc_error = (form_error('confirm_account') ? 'has-error has-feedback' : '');
                                         if(!empty($confirmAc_error)){
                                            $confirmAcData = '<span class="help-block">'.form_error('confirm_account').'</span>';
                                            $confirmAcClass = $confirmAc_error;
                                            $confirmAcIcon = '<span class="glyphicon glyphicon-remove form-control-feedback"></span>';
                                         }
                                         else{
                                            $confirmAcClass = $confirmAcIcon = $confirmAcData = '';
                                         } 
                                         ?>
                                            <div class="form-group <?= $confirmAcClass ?>">
                                                <input id="confirm_account" name="confirm_account" type="text" placeholder="Confirm account" class="form-control" value="<?= set_value('confirm_account') ?>">
                                                <?= $confirmAcIcon ?>
                                                <?= $confirmAcData ?>
                                            </div>    
                                        </div>

                                        <div class="clearfix"></div>


                                        <!-- <div class="col-md-6">

                                            <div class="form-group ">

                                                <label class="mtop5">
                                                    <input type="checkbox"> Recurring Payments</label>
                                            </div>

                                        </div>
 -->

                                    </div>
                                    <div class="clearfix"></div>
                                    <!-- Button -->
                                    <div class="col-md-12">
                                        <br>
                                        <div class="form-group">

                                            <button type="submit" name="snd_enquery" class="btn-success btn">Save This Check</button>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
                <!--body wrapper start-->
            </div>
            <!--body wrapper end-->
        </div>
      <!-- /content section -->  

<!-- footer section -->
<?php  $this->load->view(CHEQUE_INCLUDE.'footer'); ?>
<!-- /footer section -->


</body>

</html>