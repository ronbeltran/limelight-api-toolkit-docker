<?php


function RenderSubscription()
{
   static $htmlId;
   if (empty($htmlId))
   {
      $htmlId = 1;
   }

   $templateSubscriptionCapability = <<< TPL
            Force Subscription Cycle:<select onchange="if (this.value == '1') { document.getElementById('subscription_content_{$htmlId}').style.display = 'block'; } else { document.getElementById('subscription_content_{$htmlId}').style.display = 'none';  } " size="1" name="force_subscription_cycle" style="" id="force_subscription_cycle" class="subscriptionDropDown" border="0">
                                        <option onclick="" value="0">No</option>
                                        <option onclick="" value="1">Yes</option>
                                     </select>
            <br/>
            <div id="subscription_content_{$htmlId}" style="display: none;">
               <b>Bill By Cycle</b>(Days to Next Billing)/
               <b>Bill By Date</b>(Billing Date):<input type="text" maxlength="10" value="0" placeholder="" title="" name="recurring_days" id="recurring_days" style="" class=""><br/>
               <b>Bill By Day</b>
               (Billing Day):<select onchange="" size="1" name="subscription_week" style="" id="subscription_week" class="" border="0">
                              <option value=""  selected="selected">Select a week</option>
                              <option onclick="" value="1">First</option>
                              <option onclick="" value="2">Second</option>
                              <option onclick="" value="3">Third</option>
                              <option onclick="" value="4">Fourth</option>
                              <option onclick="" value="5">Last</option>
                           </select>
                           <select onchange="" size="1" name="subscription_day" style="" id="subscription_day" class="" border="0">
                              <option value="" selected="selected">Select a day</option>
                              <option onclick="" value="1">Sunday</option>
                              <option onclick="" value="2">Monday</option>
                              <option onclick="" value="3">Tuesday</option>
                              <option onclick="" value="4">Wednesday</option>
                              <option onclick="" value="5">Thursday</option>
                              <option onclick="" value="6">Friday</option>
                              <option onclick="" value="7">Saturday</option>
                           </select><br/>
               <br/>
            </div>
TPL;

   $htmlId++;

   return $templateSubscriptionCapability;
}

require_once('alt_pay_providers.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
   <script src="js/jquery-1_6_2.js" type="text/javascript"></script>
   <script src="js/api.js" type="text/javascript"></script>
   <link href="css/api.css" rel="stylesheet" type="text/css"/>
   <title>LimeLight CRM API Examples</title>

</head>

<body>
      <img src="http://www.truemarketingpartners.com/images/LimeLightCRM_Logo2.jpg"/><br/><br/>
      username:<input type="text" name="username" id="username" value="yourlimelightapiusername"/><br/>
      password:<input type="text" name="password" id="password"  value="yourlimelightapipassword"/><br/>
      main site:<input type="text" name="site" style="width:400px" id="site"  value="https://www.yourlimelightserver.com/admin/"/>
      <br/>
      Method: <select name="method" id="method" onchange="ToggleActions(this)">
            <option value="" selected=""> Select a Method</option>
            <optgroup label="Transact">Transact</optgroup>
            <option value="NewOrderCardOnFile">NewOrderCardOnFile</option>
            <option value="NewOrder">NewOrder</option>
            <option value="NewProspect">NewProspect</option>
            <option value="NewOrderWithProspect">NewOrderWithProspect</option>
            <option value="authorize_payment">authorize_payment</option>
            <option value="three_d_redirect">three_d_redirect</option>
            <optgroup label="Membership">Membership</optgroup>
            <option value="subscription_update">subscription_update</option>
            <option value="campaign_find_active">campaign_find_active</option>
            <option value="campaign_view">campaign_view</option>
            <option value="customer_find_active_product">customer_find_active_product</option>
            <option value="order_calculate_refund">order_calculate_refund</option>
            <option value="order_find_overdue">order_find_overdue</option>
            <option value="order_find">order_find</option>
            <option value="order_find_updated">order_find_updated</option>
            <option value="order_refund">order_refund</option>
            <option value="order_void">order_void</option>
            <option value="order_force_bill">order_force_bill</option>
            <option value="order_update_recurring">order_update_recurring</option>
            <option value="order_reprocess">order_reprocess</option>
            <option value="validate_credentials">validate_credentials</option>
            <option value="order_view">order_view</option>
            <option value="order_update">order_update</option>
            <option value="product_index">product_index</option>
            <option value="product_attribute_index">product_attribute_index</option>
            <option value="product_update">product_update</option>
            <option value="product_copy">product_copy</option>
            <option value="upsell_stop_recurring">upsell_stop_recurring</option>
            <option value="prospect_view">prospect_view</option>
            <option value="prospect_update">prospect_update</option>
            <option value="prospect_find">prospect_find</option>
            <option value="customer_view">customer_view</option>
            <option value="customer_find">customer_find</option>
            <option value="get_alternative_provider">get_alternative_provider</option>
            <option value="repost_to_fulfillment">repost_to_fulfillment</option>
            <option value="coupon_validate">coupon validate</option>
            <option value="offline_payment">offline_payment</option>
            <option value="shipping_method_find">shipping_method_find</option>
            <option value="shipping_method_view">shipping_method_view</option>
         </select>
      <br/>
      <div id="subscription_update" class="test_form">
         <h2>Update Subscriptions</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form100" method="post" action="post2.php">
            Actions<br><textarea style="width:500px;height:100px;" name="actions">start,stop,stop</textarea>
            <br />
            Subscriptions<br><textarea style="width:500px;height:100px;" name="values">c2fb143b5af9ed167a24c4ecfda4b219,  7fc533193b788ea09acb02b31431ff63, f139ecb6571d5316efbc51d534616a98</textarea>
            <br />
            Request Type<br>
            <select><option>legacy</option></select>
            <br />
            Return Type<br>
            <select><option>JSON</option></select>
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" size =40 name="username" id="subscription_updateusername">
            <input type="hidden" size =40 name="password" id="subscription_updatepassword">
            <input type="hidden" name="method" value="subscription_update">
            <input type="hidden" name="site" id="subscription_update_site">
         </form>
      </div>

      <div id="campaign_find_active" class="test_form">
         <h2>Campaign Find Active Test</h2>
         <form name="form1" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="campaign_find_activeusername">
            <input type="hidden" size =40 name="password" id="campaign_find_activepassword">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="campaign_find_active">
            <input type="hidden" name="site" id="campaign_find_active_site">
         </form>
      </div>

      <div id="validate_credentials" class="test_form">
         <h2>validate_credentials</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form2" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="validate_credentialsusername">
            <input type="hidden" size =40 name="password" id="validate_credentialspassword">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="validate_credentials">
            <input type="hidden" name="site" id="validate_credentials_site" >
         </form>
      </div>

      <div id="campaign_view" class="test_form">
         <h2>Campaign View Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form3" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="campaign_viewusername">
            <input type="hidden" size =40 name="password" id="campaign_viewpassword">
            <br />
            Campaign:<input type="text" size =40 name="campaign_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="campaign_view">
            <input type="hidden" name="site" id="campaign_view_site">
         </form>
      </div>

      <div id="customer_find_active_product" class="test_form">
         <h2>Customer Find Active Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form4" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="customer_find_active_productusername">
            <input type="hidden" size =40 name="password" id="customer_find_active_productpassword">
            <br />
            Customer:<input type="text" size =40 name="customer_Id">
            <br />
            Campaign:<input type="text" size =40 name="campaign_Id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" value="customer_find_active_product" name="method">
            <input type="hidden" name="site" id="customer_find_active_product_site">
         </form>
      </div>

      <div id="order_calculate_refund" class="test_form">
         <h2>Order Calculate Refund Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form5" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="order_calculate_refundusername">
            <input type="hidden" size =40 name="password" id="order_calculate_refundpassword">
            <br />
            Order Id:<input type="text" name="order_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="order_calculate_refund">
            <input type="hidden" name="site" id="order_calculate_refund_site">
         </form>
      </div>

      <div id="order_find_overdue" class="test_form">
         <h2>Order Find Overdue Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form6" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="order_find_overdueusername">
            <input type="hidden" size =40 name="password" id="order_find_overduepassword">
            <br />
            Days:<input type="text" size =40 name="days">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="order_find_overdue">
            <input type="hidden" name="site" id="order_find_overdue_site">
         </form>
      </div>

      <div id="order_refund" class="test_form">
         <h2>Order Refund Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form7" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="order_refundusername">
            <input type="hidden" size =40 name="password" id="order_refundpassword">
            <br />
            Order Id:<input type="text" name="order_id">
            <br />
            Amount:<input type="text" name="amount">
            <br />
            Keep Recurring:<input type="text" name="keep_recurring">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="order_refund">
            <input type="hidden" name="site" id="order_refund_site">
         </form>
      </div>

      <div id="order_void" class="test_form">
         <h2>Order Void Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form8" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="order_voidusername">
            <input type="hidden" size =40 name="password" id="order_voidpassword">
            <br />
            Order Id:<input type="text" name="order_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="order_void">
            <input type="hidden" name="site" id="order_void_site">
         </form>
      </div>

      <div id="order_force_bill" class="test_form">
         <h2>Order Force Bill Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form9" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="order_force_billusername">
            <input type="hidden" size =40 name="password" id="order_force_billpassword">
            <br />
            Order Id:<input type="text" name="order_id">
            <br />
            forceGatewayId:<input type="text" name="forceGatewayId">
            <br/>preserve_force_gateway:
            <select name="preserve_force_gateway">
               <option value="0">No</option>
               <option value="1">Yes</option>
            </select>
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="order_force_bill">
            <input type="hidden" name="site" id="order_force_bill_site">
         </form>
      </div>

      <div id="order_update_recurring" class="test_form">
         <h2>Order Update Recurring Test Form</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form10" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="order_update_recurringusername">
            <input type="hidden" size =40 name="password" id="order_update_recurringpassword">
            <br />
            Order Id:<input type="text" name="order_id">
            <br />
            Status:<input type="text" name="status">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="order_update_recurring">
            <input type="hidden" name="site" id="order_update_recurring_site">
         </form>
      </div>

      <div id="order_reprocess" class="test_form">
         <h2>Order Reprocess Test Form</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form22" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="order_reprocessusername">
            <input type="hidden" size =40 name="password" id="order_reprocesspassword">
            <br />
            Order Id:<input type="text" name="order_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="order_reprocess">
            <input type="hidden" name="site" id="order_reprocess_site">
         </form>
      </div>

      <div id="order_view" class="test_form">
         <h2>Order View Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form11" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="order_viewusername">
            <input type="hidden" size =40 name="password" id="order_viewpassword">
            <br />
            Order Id:<input type="text" name="order_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="order_view">
            <input type="hidden" name="site" id="order_view_site">
         </form>
      </div>

      <div id="repost_to_fulfillment" class="test_form">
         <h2>Repost to Fulfillment Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form30" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="repost_to_fulfillmentusername">
            <input type="hidden" size =40 name="password" id="repost_to_fulfillmentpassword">
            <br />
            Order Id:<input type="text" name="order_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="repost_to_fulfillment">
            <input type="hidden" name="site" id="repost_to_fulfillment_site">
         </form>
      </div>

      <div id="coupon_validate" class="test_form">
         <h2>Coupon Validate</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form30" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="coupon_validateusername">
            <input type="hidden" size =40 name="password" id="coupon_validatepassword">
            <br />
            Campaign Id:<input type="text" name="campaign_id">
            <br />
            Shipping Id:<input type="text" name="shipping_id">
            <br/>
            Email:<input type="text" name="email" value="email@12345email.com"/>
            <br />
            Product Ids:<textarea style="width:500px;height:100px;" name="product_ids" onblur="document.getElementById('form30Coupon').innerHTML = UpdateUpsellQuantities(this.value, '#coupon_validate');">1,2,3,4,5</textarea>
            <br />
            <br />
            <span id="form30Coupon"></span>
            <span id="product_attribs"></span>
            <br />
            Promo Code:<input type="text" name="promo_code">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="coupon_validate">
            <input type="hidden" name="site" id="coupon_validate_site">
         </form>
      </div>

      <div id="offline_payment" class="test_form">
         <h2>Offline Payment Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form30" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="offline_paymentusername">
            <input type="hidden" size =40 name="password" id="offline_paymentpassword">
            <br />
            Order Id:<input type="text" name="order_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="offline_payment">
            <input type="hidden" name="site" id="offline_payment_site">
         </form>
      </div>

      <div id="product_index" class="test_form">
         <h2>Product Index Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form12" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="product_indexusername">
            <input type="hidden" size =40 name="password" id="product_indexpassword">
            <br />
            Products:<input type="text" size =40 name="product_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="product_index">
            <input type="hidden" name="site" id="product_index_site">
         </form>
      </div>

      <div id="product_attribute_index" class="test_form">
         <h2>Product Attribute Index Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form25" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="product_attribute_indexusername">
            <input type="hidden" size =40 name="password" id="product_attribute_indexpassword">
            <br />
            Products:<input type="text" size =40 name="product_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="product_attribute_index">
            <input type="hidden" name="site" id="product_attribute_index_site">
         </form>
      </div>

      <div id="product_copy" class="test_form">
         <h2>Product Copy Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form13" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="product_copyusername">
            <input type="hidden" size =40 name="password" id="product_copypassword">
            <br />
            Product id:<input type="text" size =40 name="product_id">
            <br />
            New Name (optional):<input type="text" size =40 name="new_name">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="product_copy">
            <input type="hidden" name="site" id="product_copy_site">
         </form>
      </div>


      <div id="product_update" class="test_form">
         <h2>Product Update</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form14" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="product_updateusername">
            <br />
            <input type="hidden" size =40 name="password" id="product_updatepassword">
            <br />
            product Ids:<input style="width:500px" type="text" name="product_ids" value="1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1">
            <br />
            Actions:<textarea style="width:500px;height:100px;" name="actions">product_name,product_price,product_description,product_sku,product_weight,is_shippable,rebill_days,rebill_product,is_free_trial,is_shippable,signature_confirmation,delivery_confirmation,digital_delivery_url,digital_delivery,declared_value,max_quantity,preserve_recurring_quantity</textarea>
            <br />
            Values:<textarea style="width:500px;height:100px;" name="values">Dollar Coffee,1.00,Dollar Coffee New,SKU12345,50.00,1,55,4,1,1,1,0,http://google.com/,1,50.00,10,0</textarea>

            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="product_update">
            <input type="hidden" name="site" id="product_update_site">
         </form>
      </div>

      <div id="order_update" class="test_form">
         <h2>Order Update</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form15" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="order_updateusername">
            <br />
            <input type="hidden" size =40 name="password" id="order_updatepassword">
            <br />
            <br />
            sync_all:<input type="text" name="sync_all" value="1">
            <div>
            Order Ids:<br /><textarea style="width:500px;height:100px;" name="order_ids">10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000,10000</textarea>
            </div>
            <div>
            Actions:<br /><textarea style="width:500px;height:100px;" name="actions" >check_routing,check_account,check_ssn,cc_number,cc_expiration_date,cc_payment_type,rebill_discount,next_rebill_product,blacklist,confirmation_status,fraud,notes,chargeback,email,phone,shipping_method,shipping_first_name,shipping_last_name,shipping_company,shipping_address1,shipping_address2,shipping_city,shipping_zip,shipping_state,shipping_country,billing_first_name,billing_last_name,billing_company,billing_address1,billing_address2,billing_city,billing_zip,billing_state,billing_country,rma_reason,stop_recurring_next_success,return,payment_received, subscription_override, subscription_override</textarea>
            </div>
            <div>
            Values:<br /><textarea style="width:500px;height:100px;" name="values">12345,12345,1444444444444440,0313,master,44,3,1,1,0,Test Notes,1,test@test.com,123-123-1234,1,Test FName,Test LName,Shipping Company,123 Main Ship St,Ship Apartment 2,Test City,12345,MI,US,Test Billing FName,Test Billing LName,Test Billing Company,123 Main St.,Building 4,City,12345,MI,US,10,1,4,1, 30, First:Tuesday</textarea>
            </div>
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="order_update">
            <input type="hidden" name="site" id="order_update_site">
         </form>
      </div>

      <div id="order_find" class="test_form">
         <h2>Order Find</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form16" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="order_findusername">
            <br />
            <input type="hidden" size =40 name="password" id="order_findpassword">
            <br />
            Campaign Id: <input type="text" name="campaign_id" value="1">
            <br />
            Product_ids: <input type="text" name="product_ids" value="1,2,3">
            <br />
            criteria:<textarea style="width:500px;height:250px;" name="criteria">category_id=X,pending,last_4_account=1234,last_4_routing=1234,last_4_ssn=1234,order_total=XX.XX,customer_id=XX,first_6_cc=XXXXXX,first_4_cc=XXXX,last_4_cc=XXXX,first_name=XX,last_name=XX,city=XX,state=XX,zip=XX,country=US,address=XXX,phone=XX,email=XX,transaction_id=XX,ip_address=XX,affiliate_id=xx,sub_affiliate_id=xx,billing_cycle=xx,tracking_number=xx,all,declines,success,new,hold,recurring,fraud,archived,chargeback,rma,preserve_gateway,no_preserve_gateway,void,shipped,confirmed,not_confirmed,no_confirmation_status,no_upsells,has_upsells,all_refunds,full_refunds,partial_refund</textarea>
            <br />
            start_date:<input type="text" name="start_date" value="<?php echo date("m/d/Y",strtotime("- 1 year"));?>">
            <br />
            start_time:<input type="text" name="start_time" value="00:00:00">
            <br />
            end_date:<input type="text" name="end_date" value="<?php echo date("m/d/Y");?>"><br />
            end_time:<input type="text" name="end_time" value="23:59:59">
            <br />
            search_type:<input type="text" name="search_type" value="any">
            <br />
            Return:<input type="text" name="return_type" value="">
            <br />

            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="order_find">
            <input type="hidden" name="site" id="order_find_site">
         </form>
      </div>

      <div id="order_find_updated" class="test_form">
         <h2>Order Find Updated</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form16" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="order_find_updatedusername">
            <input type="hidden" size =40 name="password" id="order_find_updatedpassword">

            Campaign Id<br>
            <input type="text" name="campaign_id" value="1"><br />

            Group Keys<br>
            <textarea style="width:500px;height:250px;" name="group_keys">refund</textarea><br />

            Start Date<br>
            <input type="text" name="start_date" value="<?php echo date("m/d/Y",strtotime("- 1 year"));?>"><br />

            Start Time<br>
            <input type="text" name="start_time" value="00:00:00"><br>

            End Date<br>
            <input type="text" name="end_date" value="<?php echo date("m/d/Y");?>"><br />

            End Time<br>
            <input type="text" name="end_time" value="23:59:59"><br>

            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="order_find_updated">
            <input type="hidden" name="site" id="order_find_updated_site">
         </form>
      </div>

      <div id="upsell_stop_recurring" class="test_form">
         <h2>Upsell Stop Recurring Test Form</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form17" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="upsell_stop_recurringusername">
            <br />
            <input type="hidden" size =40 name="password" id="upsell_stop_recurringpassword">
            <br />
            Order Id:<input type="text" name="order_id">
            <br />
            Product Id:<input type="text" name="product_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="upsell_stop_recurring">
            <input type="hidden" name="site" id="upsell_stop_recurring_site">
         </form>
      </div>

      <div id="prospect_view" class="test_form">
         <h2>Prospect View Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form18" method="post" action="post2.php">
            <input type="hidden" size=40 name="username" id="prospect_viewusername">
            <input type="hidden" size=40 name="password" id="prospect_viewpassword">
            <br />
            Prospect Id:<input type="text" name="prospect_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="prospect_view">
            <input type="hidden" name="site" id="prospect_view_site">
         </form>
      </div>

      <div id="prospect_update" class="test_form">
         <h2>Prospect Update</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form24" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="prospect_updateusername">
            <br />
            <input type="hidden" size =40 name="password" id="prospect_updatepassword">
            <br />
            <div>
            prospect Ids:<br /><textarea style="width:500px;height:100px;" name="prospect_ids">1,1,1,1,1,1,1,1,1,1,1</textarea>
            </div>
            <div>
            Actions:<br /><textarea style="width:500px;height:100px;" name="actions" >first_name,last_name,address,address2,city,state,zip,country,phone,email,notes</textarea>
            </div>
            <div>
            Values:<br /><textarea style="width:500px;height:100px;" name="values">fname,lname,123 test lane,Apt 123,Tampa,FL,33626,US,1234567890,test@test.com,API prospect note</textarea>
            </div>
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="prospect_update">
            <input type="hidden" name="site" id="prospect_update_site">
         </form>
      </div>

      <div id="prospect_find" class="test_form">
         <h2>Order Find</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form16" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="prospect_findusername">
            <br />
            <input type="hidden" size =40 name="password" id="prospect_findpassword">
            <br />
            campaign_id:<input type="text" name="campaign_id" value="1">
            <br />
            criteria:<textarea rows="4" cols="40" name="criteria">first_name=XX,last_name=XX,city=XX,state=XX,zip=XX,country=US,address=XXX,address2=XXX,phone=XX,email=XX</textarea>
            <br />
            start_date:<input type="text" name="start_date" value="<?php echo date("m/d/Y",strtotime("- 1 year"));?>">
            <br />
            start_time:<input type="text" name="start_time" value="00:00:00">
            <br />
            end_date:<input type="text" name="end_date" value="<?php echo date("m/d/Y");?>"><br />
            end_time:<input type="text" name="end_time" value="23:59:59">
            <br />
            search_type:<input type="text" name="search_type" value="any">
            <br />
            return_type:<input type="text" name="return_type" value="">
            <br />

            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="prospect_find">
            <input type="hidden" name="site" id="prospect_find_site">
         </form>
      </div>

      <div id="customer_view" class="test_form">
         <h2>Customer View Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form22" method="post" action="post2.php">
            <input type="hidden" size=40 name="username" id="customer_viewusername">
            <input type="hidden" size=40 name="password" id="customer_viewpassword">
            <br />
            Customer Id:<input type="text" name="customer_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="customer_view">
            <input type="hidden" name="site" id="customer_view_site">
         </form>
      </div>

      <div id="customer_find" class="test_form">
         <h2>Order Find</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form23" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="customer_findusername">
            <br />
            <input type="hidden" size =40 name="password" id="customer_findpassword">
            <br />
            campaign_id:<input type="text" name="campaign_id" value="1">
            <br />
            criteria:<textarea rows="4" cols="40" name="criteria">first_name=XX,last_name=XX,city=XX,state=XX,zip=XX,country=US,address=XXX,phone=XX,email=XX</textarea>
            <br />
            start_date:<input type="text" name="start_date" value="<?php echo date("m/d/Y",strtotime("- 1 year"));?>">
            <br />
            start_time:<input type="text" name="start_time" value="00:00:00">
            <br />
            end_date:<input type="text" name="end_date" value="<?php echo date("m/d/Y");?>"><br />
            end_time:<input type="text" name="end_time" value="23:59:59">
            <br />
            search_type:<input type="text" name="search_type" value="any">
            <br />
            return_type:<input type="text" name="return_type" value="">
            <br />

            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="customer_find">
            <input type="hidden" name="site" id="customer_find_site">
         </form>
      </div>

      <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form18" action="post.php" method="get">
         <div id="NewOrderCardOnFile"  class="test_form">
            <h1>NewOrderCardOnFile</h1>
            <input type="hidden" name="username" id="NewOrderCardOnFileusername" />
            <input id="NewOrderCardOnFilepassword" type="hidden" name="password"/><br />
            <input type="hidden" name="method" value="NewOrderCardOnFile"/>
            <br/>previousOrderId:<input type="text" name="previousOrderId" value="10000"/>
            <br/>productId:<input type="text" name="productId" value="1" onblur="document.getElementById('productQty').name='product_qty_' + this.value;document.getElementById('dynamic_product_price').name='dynamic_product_price_' + this.value;document.getElementById('dynamic_price_display').innerHTML='product[' + this.value + ']';document.getElementById('dynamic_qty_display').innerHTML='productQty[' + this.value + ']';"/>
            <br/>campaignId:<input type="text" name="campaignId" value="1"/>
            <br/>shippingId:<input type="text" name="shippingId" value="1"/>
            <br/>dynamic price:<input type="text" id="dynamic_product_price" name="dynamic_product_price_1" value="50.00"/> <span id="dynamic_price_display">product[1]</span>
            <br/>Quantity<input type="text" name="product_qty_1" id="productQty" value="1" size="5"> <span id="dynamic_qty_display">productQty[1]</span>
            <br/>Promo Code:<input type="text" name="promoCode">
            <br/>
            <?
            echo RenderSubscription();
            ?>
            <br/>Notes:<textarea name="notes"></textarea>
            <br/>Click ID:<input type="text" name="click_id" value="123456789"/>
            <br/>createdBy:<input type="text" name="createdBy" value=""/>
            <br/>forceGatewayId:<input type="text" name="forceGatewayId" value=""/>
            <br/>preserve_force_gateway:
            <select name="preserve_force_gateway">
               <option value="0">No</option>
               <option value="1">Yes</option>
            </select>
            <br/>master_order_id:<input type="text" name="master_order_id" value=""/>
            <input type="hidden" name="site" id="NewOrderCardOnFile_site">
            <input type="submit" value="NewOrder!">
         </div>
      </form>


      <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form19" action="post.php" method="get">
         <div id="NewOrder"  class="test_form">
            <h1>NewOrder</h1>
            <br />

            <!-- sessionId for use with kount fraud or other pixel posts -->
            <input type="hidden" name="sessionId" id="sessionId" value="12345678910"/>
            <input type="hidden" name="username" id="NewOrderusername"/>
            <input type="hidden" name="password" id="NewOrderpassword"/>
            <input type="hidden" name="method" value="NewOrder"/>

            <br/> upsellCount:<input type="text" name="upsellCount" id="upsellCount" value="1"/>
            <br/> upsellProductIds:<input type="text" name="upsellProductIds" value="4" onblur="document.getElementById('form19upsellProductIdQty').innerHTML = UpdateUpsellQuantities(this.value, '#NewOrder');"/>
            <span id="form19upsellProductIdQty"></span>
            <br/> main productId:<input type="text" name="productId" value="1" onblur="document.form19.productQty.name='product_qty_'+this.value; document.form19.prod_attr_main.name='prod_attr_'+this.value; document.form19.prod_opt_main.name='prod_opt_'+this.value; UpdateAttributes('#NewOrder'); "/>
            <br/> main quantity<input type="text" name="product_qty_1" id="productQty" value="1" size="5">
            <br/> main attributes<input type="text" id="prod_attr_main" name="prod_attr_1" class="prod-attr" value="" onblur="UpdateAttributes('#NewOrder');">
                  main options<input type="text" id="prod_opt_main" name="prod_opt_1" class="prod-opt" value="" onblur="UpdateAttributes('#NewOrder');">
                  <span id="product_attribs"></span>
            <br/> campaignId:<input type="text" name="campaignId" value="1"/>
            <br/> shippingId:<input type="text" name="shippingId" value="1"/>
            <br/> firstName:<input type="text" name="firstName" value="api_first_name"/>
            <br/> lastName:<input type="text" name="lastName" value="api_last_name"/>
            <br/> shippingAddress1:<input type="text" name="shippingAddress1" value="123 Main St."/>
            <br/> shippingAddress2:<input type="text" name="shippingAddress2" value="Bldg 4"/>
            <br/> shippingCity:<input type="text" name="shippingCity" value="Tampa"/>
            <br/> shippingState:<input type="text" name="shippingState" value="FL"/>
            <br/> shippingZip:<input type="text" name="shippingZip" value="33626"/>
            <br/> shippingCountry:<input type="text" name="shippingCountry" value="US"/>
            <br/> billingFirstName:<input type="text" name="billingFirstName" value="api_billing_first_name"/>
            <br/> billingLastName:<input type="text" name="billingLastName" value="api_billing_last_name"/>
            <br/> billingAddress1:<input type="text" name="billingAddress1" value="123 Temple St."/>
            <br/> billingAddress2:<input type="text" name="billingAddress2" value="Apt #201"/>
            <br/> billingCity:<input type="text" name="billingCity" value="Phoenix"/>
            <br/> billingState:<input type="text" name="billingState" value="AZ"/>
            <br/> billingZip:<input type="text" name="billingZip" value="33633"/>
            <br/> billingCountry:<input type="text" name="billingCountry" value="US"/>
            <br/> billingSameAsShipping:
            <select name="billingSameAsShipping">
               <option value="">blank</option>
               <option value="yes">yes</option>
               <option value="no">no</option>
            </select>
            <br/> phone:<input type="text" name="phone" value="555-555-5555"/>
            <br/> email:<input type="text" name="email" value="email@12345email.com"/>
            <br/>Click ID:<input type="text" name="click_id" value="123456789"/>
            <br/> creditCardType:
            <select name="creditCardType" onchange='blocknone_divs(["check","card"],this.value,"");'>
               <option value="">Select one</option>
               <?=$alt_pay_providers_options?>
            </select>

            <div id="card" style="display:none;">
               <br/>
               <span id="cc_label">creditCardNumber:</span><input type="text" name="creditCardNumber" id="creditCardNumber" value="1444444444444440"/>
               <div id="exp_and_cvv">
                  <br/> expirationDate:<input type="text" name="expirationDate" id="expirationDate" value="1015"/><br/> CVV:<input type="text" name="CVV" id="CVV" value="252"/><br/>
               </div>
            </div>

            <div id="check" style="display:none;">
               <br/> Account Number:<input type="text" name="checkAccountNumber" id="checkAccountNumber" value="1241124124124124"/><br/> Routing / Bank Number:<input type="text" name="checkRoutingNumber" id="checkRoutingNumber" value="222371863"/><br/> Last 4 SSN#:<input type="text" name="secretSSN" id="secretSSN" value="9999" />

            </div>

            <div id="alt_pay" style="display:none;">
               <br/>
               alt_pay_payer_id:<input type="text" name="alt_pay_payer_id" id="alt_pay_payer_id" value=""/>
               <br/>
               alt_pay_token:<input type="text" name="alt_pay_token" id="alt_pay_token" value=""/> ( PaymentID for icepay )
            </div>

            <div id="alt_pay_return_url" style="display:none;">
               <br/>
               alt_pay_return_url:<input type="text" name="alt_pay_return_url" id="alt_pay_return_url" value=""/>
            </div>

            <br/>
            Promo Code:<input type="text" name="promoCode">
            <br/>
            3D Redirect Url: <input type="text" name="three_d_redirect_url">
            <br/>
            ipAddress:<input type="text" name="ipAddress" value="71.40.154.126"/><br/> AFID:<input type="text" name="AFID" value="AFID"/><br/> SID:<input type="text" name="SID" value="SID"/><br/> AFFID:<input type="text" name="AFFID" value="AFFID"/><br/> C1:<input type="text" name="C1" value="C1111"/><br/> C2:<input type="text" name="C2" value="C222"/><br/> C3:<input type="text" name="C3" value="C333"/><br/> AID:<input type="text" name="AID" value="AID"/><br/> OPT:<input type="text" name="OPT" value="OPT"/><br/>
            tranType:
            <select name="tranType" onchange="if (this.value == 'AuthVoid') { document.getElementById('authVoidAmountSpan').style.display = 'block'; } else { document.getElementById('authVoidAmountSpan').style.display = 'none';  } ">
               <option>Sale</option>
               <option>AuthVoid</option>
               <option>Capture</option>
            </select>
            <span style="display:none;" id="authVoidAmountSpan"></span><br/> auth/void amount:<input type="text" name="authVoidAmount" value=""/>
            <br/> transactionId:<input type="text" name="transactionId" value=""/><input type="hidden" name="thm_session_id" value="123456"/>
            <br/>forceGatewayId:<input type="text" name="forceGatewayId" value=""/>
            <br/>preserve_force_gateway:
            <select name="preserve_force_gateway">
               <option value="0">No</option>
               <option value="1">Yes</option>
            </select>
            <br/> product[<input type="text" style="width:45px;" name="dynamic_product_price_1_product" value="1" onblur='document.getElementById("dynamic_product_price_1").name = "dynamic_product_price_" + this.value;'/>] dynamic price:
            <input type="text" name="dynamic_product_price_1" id="dynamic_product_price_1" value=""/><br />
            <?
            echo RenderSubscription();
            ?>
            Notes:<textarea name="notes"></textarea><br/><br/>
            createdBy:<input type="text" name="createdBy" value=""/><br/>
            master_order_id:<input type="text" name="master_order_id" value=""/><br/>
            temp_customer_id:<input type="text" name="temp_customer_id" value=""/><br/>
            <input type="submit" value="NewOrder!">
            <input type="hidden" name="site" id="NewOrder_site">
         </div>
      </form>

      <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form20" action="post.php" method="get">
         <div id="NewProspect"  class="test_form">
         <h1>NewProspect</h1>
            <input type="hidden" name="username" id="NewProspectusername"/>
            <input id="NewProspectpassword" type="hidden" name="password"/><br />
            <input type="hidden" name="method" value="NewProspect"/>
            <br/> campaignId:<input type="text" name="campaignId" value="1"/>
            <br/> firstName:<input type="text" name="firstName" value="fname"/>
            <br/> lastName:<input type="text" name="lastName" value="lname"/>
            <br/> address1:<input type="text" name="address1" value="123 Main St."/>
            <br/> address2:<input type="text" name="address2" value="Apt #201"/>
            <br/> city:<input type="text" name="city" value="City"/>
            <br/> state:<input type="text" name="state" value="FL"/>
            <br/> zip:<input type="text" name="zip" value="90210"/>
            <br/> country:<input type="text" name="country" value="US"/>
            <br/> phone:<input type="text" name="phone" value="1231231234"/>
            <br/> email:<input type="text" name="email" value="email@12345email.com"/>
            <br/> AFID:<input type="text" name="AFID" value="AFID"/>
            <br/> SID:<input type="text" name="SID" value="SID"/>
            <br/> AFFID:<input type="text" name="AFFID" value="AFFID"/>
            <br/> C1:<input type="text" name="C1" value="C1111"/>
            <br/> C2:<input type="text" name="C2" value="C222"/>
            <br/> C3:<input type="text" name="C3" value="C333"/>
            <br/> BID:<input type="text" name="BID" value="BID"/>
            <br/> AID:<input type="text" name="AID" value="AID"/>
            <br/> OPT:<input type="text" name="OPT" value="OPT"/>
            <br/> notes:<input type="text" name="notes" value="Cool Notes work."/>
            <br/> ipAddress:<input type="text" name="ipAddress" value="71.40.154.126"/>
            <br/>Click ID:<input type="text" name="click_id" value="123456789"/><br/>
            <input type="hidden" name="site" id="NewProspect_site">
            <input type="submit" value="NewProspect!">
         </div>
      </form>


      <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form21" action="post.php" method="get">
         <div id="NewOrderWithProspect"  class="test_form">
            <h1>NewOrder</h1>
            <input type="hidden" name="username" id="NewOrderWithProspectusername"/>
            <input id="NewOrderWithProspectpassword" type="hidden" name="password" />
            <input type="hidden" name="method" value="NewOrderWithProspect"/>
            <br />prospectId:<input type="text" name="prospectId" value="22"/>
            <br/> upsellCount:<input type="text" name="upsellCount" value="1"/>
            <br/> upsellProductIds:<input type="text" name="upsellProductIds" value="4"/ onblur="document.getElementById('form21upsellProductIdQty').innerHTML = UpdateUpsellQuantities(this.value, '#NewOrderWithProspect')">
            <span id="form21upsellProductIdQty"></span>
            <br/> productId:<input type="text" name="productId" value="1" onblur="document.form21.productQty.name='product_qty_'+this.value;"/>
            <br/> main quantity<input type="text" name="product_qty_1" id="productQty" value="1" size="5">
            <br/> campaignId:<input type="text" name="campaignId" value="1"/>
            <br/> shippingId:<input type="text" name="shippingId" value="1"/>
            <br/>
            Promo Code:<input type="text" name="promoCode">
            <br/>
            3D Redirect Url: <input type="text" name="three_d_redirect_url">
            <br/>
            <br/> creditCardType:
            <select name="creditCardType" onchange='blocknone_divs(["check","card"],this.value,"_p");'>
               <option value="">Select one</option>
               <?=$alt_pay_providers_options?>
            </select>
            <br/>
            <div id="card_p" style="display:none;">
               <br/>
               <span id="cc_label_p">creditCardNumber:</span><input type="text" name="creditCardNumber" id="creditCardNumber" value="1444444444444440"/>
               <div id="exp_and_cvv_p">
                  <br/> expirationDate:<input type="text" name="expirationDate" id="expirationDate" value="1015"/><br/> CVV:<input type="text" name="CVV" id="CVV" value="252"/><br/>
               </div>
            </div>
            <div id="check_p" style="display:none;">
               <br/> Account Number:<input type="text" name="checkAccountNumber" id="checkAccountNumber" value="1241124124124124"/><br/> Routing / Bank Number:<input type="text" name="checkRoutingNumber" id="checkRoutingNumber" value="222371863"/>

            </div>
            <div id="alt_pay_p" style="display:none;">
               <br/>
               <span>alt_pay_payer_id:</span><input type="text" name="alt_pay_payer_id" id="alt_pay_payer_id" value=""/>
               <br/>
               <span>alt_pay_token:</span><input type="text" name="alt_pay_token" id="alt_pay_token" value=""/> (PaymentID for icepay)
            </div>

            <div id="alt_pay_return_url_p" style="display:none;">
               <br/>
               alt_pay_return_url:<input type="text" name="alt_pay_return_url" id="alt_pay_return_url" value=""/>
            </div>

            <br/> tranType:<input type="text" name="tranType" value="Sale"/><br/>
            <br/> billingSameAsShipping:
            <select name="billingSameAsShipping" onchange='if (this.value=="no") { document.getElementById("bill").style.display="inline";} else { document.getElementById("bill").style.display="none"; }'>
               <option value="">blank</option>
               <option value="yes">yes</option>
               <option value="no">no</option>
            </select>
            <div id="bill" style="display:none;">
            <br/><br/>
               billingAddress1:<input type="text" name="billingAddress1" value=""/><br/> billingCity:<input type="text" name="billingCity" value=""/><br/> billingState:<input type="text" name="billingState" value=""/><br/> billingZip:<input type="text" name="billingZip" value=""/><br/> billingCountry:<input type="text" name="billingCountry" value=""/>
            <input type="hidden" name="site" id="NewOrderWithProspect_site">
            </div><br/>
            <?
            echo RenderSubscription();
            ?>
            Notes:<textarea name="notes"></textarea><br/>
            createdBy:<input type="text" name="createdBy" value=""/>
            <input type="hidden" name="thm_session_id" value="123456"/><br />
            <input type="submit" value="NewOrder!">
         </div>
      </form>

      <div id="get_alternative_provider"  class="test_form">
         <h2>Get Alternative Provider Redirect</h2>
         <form name="form1" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="get_alternative_providerusername">
            <input type="hidden" size =40 name="password" id="get_alternative_providerpassword">
            <input type="hidden" name="method" value="get_alternative_provider">
            <input type="hidden" name="site" id="get_alternative_provider_site">
            <br />
            Pay Provider:<select name="alt_pay_type" id="alt_pay_type">
               <?=$alt_pay_providers_interactive_options?>
            </select>
            <br />
            Campaign Id:<input type="text" id="campaign_id" name="campaign_id" value="1">
            <br />

            Return URL:<input type="text" id="return_url" name="return_url" value="http://www.google.com">
            <br />
            Cancelation URL:<input type="text" id="cancel_url" name="cancel_url" value="http://www.google.com">
            <br />
            Amount:<input type="text" id="amount" name="amount" value="123.45">
            <br />
            Shipping Id:<input type="text" id="shipping_id" name="shipping_id" value="1">
            <br />
            Products:<input type="text" id="products" name="products" value="1,2">
            <br />
            Product Quantities:<input type="text" id="product_qty" name="product_qty" value="1,1">
            <br />
            Product Prices:<input type="text" id="product_price" name="product_price" value="0,2.95">
            <br/>
            Billing Country:<input type="text" id="bill_country" name="bill_country" value="DE"/> (required for icepay)
            <br />
            <input type="submit" value="Submit Post">
         </form>
      </div>

      <div id="shipping_method_view"  class="test_form">
         <h2>Shipping Method View Test</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form26" method="post" action="post2.php">
            <input type="hidden" size=40 name="username" id="shipping_method_viewusername">
            <input type="hidden" size=40 name="password" id="shipping_method_viewpassword">
            <br />
            shipping_id:<input type="text" name="shipping_id">
            <br />
            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="shipping_method_view">
            <input type="hidden" name="site" id="shipping_method_view_site">
         </form>
      </div>

      <div id="shipping_method_find"  class="test_form">
         <h2>Shipping Method Find</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form27" method="post" action="post2.php">
            <input type="hidden" size =40 name="username" id="shipping_method_findusername">
            <input type="hidden" size =40 name="password" id="shipping_method_findpassword">
            campaign_id:<input type="text" name="campaign_id" value="1">
            <br />
            criteria:<textarea rows="4" cols="40" name="criteria">code=XX,name=XX,group=XX</textarea>
            <br />
            search_type:<input type="text" name="search_type" value="any">
            <br />
            return_type:<input type="text" name="return_type" value="shipping_method_view">
            <br />

            <input type=submit value="Submit Post">
            <input type="hidden" name="method" value="shipping_method_find">
            <input type="hidden" name="site" id="shipping_method_find_site">
         </form>
      </div>

      <div id="authorize_payment"  class="test_form">
         <h2>authorize_payment</h2>
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form28" method="POST" action="post.php">
            <h1>authorize_payment</h1>
            <br />

            <!-- sessionId for use with kount fraud or other pixel posts -->
            <input type="hidden" name="sessionId" id="sessionId" value="12345678910"/>
            <input type="hidden" name="username" id="authorize_paymentusername"/>
            <input type="hidden" name="password" id="authorize_paymentpassword"/>
            <input type="hidden" name="method" value="authorize_payment"/>

            <br/> productId:<input type="text" name="productId" value="1"/>
            <br/> campaignId:<input type="text" name="campaignId" value="1"/>
            <br/> billingFirstName:<input type="text" name="billingFirstName" value="api_billing_first_name"/>
            <br/> billingLastName:<input type="text" name="billingLastName" value="api_billing_last_name"/>
            <br/> billingAddress1:<input type="text" name="billingAddress1" value="123 Temple St."/>
            <br/> billingAddress2:<input type="text" name="billingAddress2" value="Apt #201"/>
            <br/> billingCity:<input type="text" name="billingCity" value="Phoenix"/>
            <br/> billingState:<input type="text" name="billingState" value="AZ"/>
            <br/> billingZip:<input type="text" name="billingZip" value="33633"/>
            <br/> billingCountry:<input type="text" name="billingCountry" value="US"/>
            <br/> phone:<input type="text" name="phone" value="555-555-5555"/>
            <br/> email:<input type="text" name="email" value="email@12345email.com"/>
            <br/> creditCardType:
            <select name="creditCardType">
               <option value="amex">American Express</option>
               <option value="discover">Discover</option>
               <option value="master">Master Card</option>
               <option value="visa">Visa</option>
               <option value="switch">Switch</option>
               <option value="solo">Solo</option>
               <option value="maestro">Maestro</option>
               <option value="diners">Diners</option>
               <option value="hipercard">Hipercard</option>
               <option value="aura">Aura</option>
            </select>
            <div id="card">
               <br/>
               <span id="cc_label">creditCardNumber:</span><input type="text" name="creditCardNumber" id="creditCardNumber" value="1444444444444440"/>
               <div id="exp_and_cvv">
                  <br/>expirationDate:<input type="text" name="expirationDate" id="expirationDate" value="1015"/>
                  <br/>CVV:<input type="text" name="CVV" id="CVV" value="252"/><br/>
               </div>
            </div>
            <br/>ipAddress:<input type="text" name="ipAddress" value="71.40.154.126"/>
            <br/>forceGatewayId:<input type="text" name="forceGatewayId" value=""/>
            <br/>auth_amount:<input type="text" name="auth_amount" value="1.00"/>
            <br/>cascade_enabled:<input type="text" name="cascade_enabled" value="0"/>
            <br/>save_customer:<input type="text" name="save_customer" value="0"/>
            <br/>
            <input type="submit" value="Authorize Payment">
            <input type="hidden" name="site" id="authorize_payment_site">
         </form>
      </div>

      <div id="three_d_redirect"  class="test_form">
         <form accept-charset="ISO-8859-1" enctype="application/x-www-form-urlencoded;charset=ISO-8859-1" name="form29" method="POST" action="post.php">
            <h1>3D Capture</h1>
            <br />

            <!-- sessionId for use with kount fraud or other pixel posts -->
            <input type="hidden" name="sessionId" id="sessionId" value="12345678910"/>
            <input type="hidden" name="username" id="three_d_redirectusername"/>
            <input type="hidden" name="password" id="three_d_redirectpassword"/>
            <input type="hidden" name="method" value="three_d_redirect"/>

            Order Id:<input type="text" name="order_id">
            <input type="submit" value="Submit">
            <input type="hidden" name="site" id="three_d_redirect_site">
         </form>
      </div>

</body>
</html>