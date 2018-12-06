<?php
if ( ! defined( 'ABSPATH' ) ) { exit;}
if( !class_exists( 'ni_enquiry_listing' ) ) :
class ni_enquiry_listing extends ni_enquiry_function{
function __construct(){
}
function init(){
$ni_count_settings = get_option('ni_enquiry_count_settings', array());	
global $wpdb;
//$user = wp_get_current_user();
//print_r($user);exit;
?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
/*$(document).ready(function(){
	$('#mySelect').change(function(){
		var assign_to = $( "#mySelect" ).val();
		var url = window.location.href;
		if (assign_to) {
			window.location = url + '&assign_to=' + assign_to;
			//myform.submit();
		}		
	});
});
$(document).ready(function(){
	$('#myreply').change(function(){
		var myreply = $( "#myreply" ).val();
		var url = window.location.href;
		if (myreply) {
			window.location = url + '&replied=' + 1;
			//myform.submit();
		}		
	});
});*/
</script>    
<?php    
if(!isset($_REQUEST['view']))
{	
	$enquiry_loop_query = $wpdb->get_results("SELECT * FROM wp_airdrop_bounty ");
	

	//print_r($ni_count_settings["daily_counts"]);
	//echo $ni_count_settings["daily_counts"];
	//$ni_count_settings["daily_counts"]
	?>
    <div class="ni_enquiry_dashboard">    
    	<div class="ni_enquiry_content">
    <div class="ni-pro-info" style="width:98%">
				<h4 style="text-align:center; font-size:16px">
				Vtag Airdrop Enquiry Listing
				</h4>
				  <div style="clear:both"></div>
                   
         <div style="clear:both"></div>
         <div ></div>
    	<h3>VTAG Enquiry Dashboard</h3>
    	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Wallet Address</th>
                <th>Step1</th>
                <th>Step2</th>
				<th>Step3</th>
				<th>Step4</th>
				<th>Step5</th>
				<th>Step6</th>
				<th>Status</th>
                <th>Start Date</th>
                <th>Submitted Date</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach($enquiry_loop_query as $result_loop) 
		{
		?>
			<tr>
                <td><?php echo $result_loop->id; ?></td>
                <td><?php 
				$user_info_name = get_userdata($result_loop->user_id);
			    echo $aurname_name =$user_info_name->user_login;
				 ?></td>
				<td><?php echo 'Walletaddress'; ?></td>
                <td><?php if($result_loop->step1 == '') { echo '<span class="glyphicon glyphicon-remove text-danger"></span>'; } else { echo '<span class="glyphicon glyphicon-ok text-success"></span>';} ?></td>
                <td><?php if($result_loop->step2 == '') { echo '<span class="glyphicon glyphicon-remove text-danger"></span>'; } else { echo '<span class="glyphicon glyphicon-ok text-success"></span>';} ?></td>
                <td><?php if($result_loop->step3 == '') { echo '<span class="glyphicon glyphicon-remove text-danger"></span>'; } else { echo '<span class="glyphicon glyphicon-ok text-success"></span>';} ?></td>
				<td><?php if($result_loop->step4 == '') { echo '<span class="glyphicon glyphicon-remove text-danger"></span>'; } else { echo '<span class="glyphicon glyphicon-ok text-success"></span>';} ?></td>
				<td><?php if($result_loop->step5 == '') { echo '<span class="glyphicon glyphicon-remove text-danger"></span>'; } else { echo '<span class="glyphicon glyphicon-ok text-success"></span>';} ?></td>
				<td><?php if($result_loop->step6 == '') { echo '<span class="glyphicon glyphicon-remove text-danger"></span>'; } else { echo '<span class="glyphicon glyphicon-ok text-success"></span>';} ?></td>                
				<td><?php if($result_loop->step_status == 'Rejected' || $result_loop->step_status == '') { echo '<span class="glyphicon glyphicon-remove text-danger"></span>'; } else { echo '<span class="glyphicon glyphicon-ok text-success"></span>';} ?></td>
				<td><?php echo $result_loop->start_date; ?></td>
				<td><?php echo $result_loop->submitted_date; ?></td>
				<!--<td><?php
		$user_info = get_userdata($result_loop->assign_status);
      echo $user_info->user_login;
				$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?></td>-->
				<td><a href="<?php echo $actual_link;?>&view=<?php echo $result_loop->id; ?>&user_id=<?php echo $result_loop->user_id; ?>" class="button button-primary">View</a></td>
				<!--<td><?php echo $result_loop->date_added; ?></td>-->
            </tr>
		<?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>              
                <th>Wallet Address</th>
                <th>Step1</th>
                <th>Step2</th>
				<th>Step3</th>
				<th>Step4</th>
				<th>Step5</th>
				<th>Step6</th>
				<th>Status</th>
                <th>Start Date</th>
                <th>Submitted Date</th>
				<th>Action</th>
            </tr>
        </tfoot>
    </table>
        <div style="clear:both"></div>
    </div>	
    <?php
	}
	else
	{ 
		$enquiry_loop_query_view = $wpdb->get_results("SELECT * FROM wp_airdrop_bounty where id =".$_REQUEST['view']);
		$args = array('role__in' => array('instructor','administrator'));
		
		$assigned_query = get_users( $args );
		//echo '<pre>';print_r($assigned_query);echo '</pre>';
		if(isset($_POST['replied_st']) && $_POST['replied_st']='Submit')
		{			
			@ini_set('display_errors', 0);
			$result = $wpdb->query($wpdb->prepare("UPDATE wp_airdrop_bounty SET step_status='".$_POST['assign_to']."',comments='".$_POST['replied']."' WHERE id=".$_POST['lsit_id'].""));			
			$enquiry_loop_query_view = $wpdb->get_results("SELECT * FROM wp_airdrop_bounty where id =".$_POST['lsit_id']);
			//echo '<pre>';print_r($enquiry_loop_query_view);echo '</pre>';exit;
			if($result == 1){
				$enquiry_email = $wpdb->get_results("SELECT user_email FROM wp_users where ID =".$_REQUEST['user_id']);
				$enquiry_admin = $wpdb->get_results("SELECT user_email FROM wp_users where ID =1");
				$enquiry_admin=$enquiry_admin[0];
				$enquiry_email=$enquiry_email[0];
				//echo '<pre>';print_r($enquiry_email);echo '</pre>';exit;
				$user_info = get_userdata($_REQUEST['user_id']);
			    $aurname=$user_info->user_login;
				$enquiry_loop_query_view[0]->ni_email_address;
				//print_r($enquiry_loop_query_view);exit;
				
				if($enquiry_loop_query_view[0]->step_status == 'Approved')
				{
				$content = "Thanks for your participation in vtag airdrop. We have checked and verified your airdrop process and is please to announce that you will be awarded the following vtag when the ICO close";
				}else
				{
				$content = "Thanks for your participation in vtag airdrop. We have checked and verified your airdrop process and has notice discrepancies in your submission. Please email us atvtag@veritag.com for clarifications and resubmission. Use the email that you have applied.";
				}			
				if($enquiry_loop_query_view[0]->step1=='')
				{
					echo $step1= site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/close.jpg';
				}
				else{
					$step1=site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/tick.jpg';
				}
				if($enquiry_loop_query_view[0]->step2=='')
				{
					$step2=site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/close.jpg';
				}
				else{
					$step2=site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/tick.jpg';
				}
				if($enquiry_loop_query_view[0]->step3=='')
				{
					$step3=site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/close.jpg';
				}
				else{
					$step3=site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/tick.jpg';
				}
				if($enquiry_loop_query_view[0]->step4=='')
				{
					$step4=site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/close.jpg';
				}
				else{
					$step4=site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/tick.jpg';
				}
				if($enquiry_loop_query_view[0]->step5=='')
				{
					$step5=site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/close.jpg';
				}
				else{
					$step5=site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/tick.jpg';
				}
				if($enquiry_loop_query_view[0]->step6=='')
				{
					$step6=site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/close.jpg';
				}
				else{
					$step6=site_url().'/wp-content/plugins/ni-woocommerce-product-enquiry/images/tick.jpg';
				}
				if($enquiry_loop_query_view[0]->comments==''){
					$comments='N/A';
				}
				else{
					$comments=$enquiry_loop_query_view[0]->comments;
				}
				// Always set content-type when sending HTML email
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";			
				$headers .= "From: ". $enquiry_admin->user_email . "\r\n";
				$to = $enquiry_email->user_email;
				$subject = 'VTAG airdrop Notifications - '.$enquiry_loop_query_view[0]->step_status;
				$message = '<body align="center" style="-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; background: #e0e0e0; box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; height: 100%; line-height: 1.7; margin: 0; padding: 0; width: 100% !important" bgcolor="#e0e0e0"><style type="text/css">img {max-width: 100%; display: block;}body {-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.7;}body {background-color: #01191D;}.ExternalClass {width: 100%;}body {background-color: #e0e0e0;}</style><table align="center" class="body-wrap" style="background: #e0e0e0; box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word" bgcolor="#e0e0e0"><tr style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><td align="center" style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top" valign="top"><table style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><tr style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><td class="container" width="600" style="box-sizing: border-box; clear: both !important; display: block !important; font-family: Helvetica, Arial, sans-serif; margin: 0 auto; max-width: 600px !important; padding: 0; vertical-align: top" valign="top"><div class="content" style="box-sizing: border-box; display: block; font-family: Helvetica, Arial, sans-serif; margin: 0 auto; max-width: 600px; padding: 12px 20px 20px"><table class="main" width="100%" cellpadding="0" cellspacing="0" style="background: #FFFFFF; box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0" bgcolor="#FFFFFF"><tr style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><td class="aligncenter" style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; text-align: center; vertical-align: top" align="center" valign="top"><div align="center" style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0;background:#2d1e56;"><a href="#" target="_blank" style="box-sizing: border-box; color: #348eda; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-decoration: none"><img src="'.site_url().'/wp-content/uploads/2018/11/vlag-logo.png" alt="" style="box-sizing: border-box; display: block; font-family: Helvetica, Arial, sans-serif; margin: 0; max-width: 100%; padding: 0" /></a></div></td></tr><tr style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><td class="content-wrap" style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 20px 20px; vertical-align: top" valign="top"><table width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><tr style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><td class="content-block" style="box-sizing: border-box; color: #2e2e2e; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0; vertical-align: top" valign="top"></td></tr><tr style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><td width="514" style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top" valign="top"><table width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><tr style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><td width="100%" class="content-block-grid grid-right" style="box-sizing: border-box; color: #2e2e2e; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0 20px 20px; vertical-align: top" valign="top"> <b style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0">Dear '.$aurname.', <br style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0" /></b>'.$content.'<ul>
  <li>steps completed : <table width="100%" border="0" style="text-align: center;">
  <tr>
    <td>Step 1</td>
    <td>Step 2</td>
    <td>Step 3</td>
    <td>Step 4</td>
    <td>Step 5</td>
    <td>Step 6</td>
  </tr>
  <tr>
    <td><img src="'.$step1.'"/></td>
    <td><img src="'.$step2.'"/></td>
    <td><img src="'.$step3.'"/></td>
    <td><img src="'.$step4.'"/></td>
    <td><img src="'.$step5.'"/></td>
    <td><img src="'.$step6.'"/></td>
  </tr>
</table>
</li>
  <li>vtags awarded : </li>
  <li>Comments : '.$comments.'</li>
  <li>Status : '.$enquiry_loop_query_view[0]->step_status.'</li>
</ul>
  Thanks for your participations.</td></tr></table></td></tr><tr style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><td style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top" valign="top"></td></tr></table></td></tr><tr style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0"><td class="aligncenter mailer-info" style="background: #F5F5F5; border-top-color: #DBDADA; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; color: #575454; font-family: Helvetica, Arial, sans-serif; font-size: 12px; font-weight: normal; line-height: 1.7; margin: 0 auto; padding: 15px 20px 20px; text-align: center; vertical-align: top" align="center" bgcolor="#F5F5F5" valign="top"><h2 class="wysiwyg-text-align-center" style="box-sizing: border-box; color: rgb(46, 46, 46); font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: bold; line-height: 1.7; margin: 0; padding: 0; text-align: center !important" align="center">VTAG AIRDROP</h2><div class="wysiwyg-text-align-center" style="box-sizing: border-box; color: #2e2e2e; font-family: Helvetica, Arial, sans-serif; font-size: 12px; font-weight: normal; line-height: 1.7; margin: 0; padding: 0; text-align: center !important" align="center">Address Here<br style="box-sizing: border-box; font-family: Helvetica, Arial, sans-serif; margin: 0; padding: 0" /></div></td></tr> </table></div></td></tr></table></td></tr></table></body>';

				mail($to,$subject,$message,$headers);
				echo '<br/><div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Success!</strong> Successfully Updated the status and Mail Template sent to VTAG Airdrop Users.
				</div>';				
				}
				else{
				echo '<br/><div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Warnig!</strong> Status Change Failed.
				</div>';
				//  exit( var_dump( $wpdb->last_query ) );
				}
				$wpdb->flush();
		}
		
	?>
	
	<div class="ni_enquiry_dashboard">
        	<div class="ni_enquiry_content">
    <div class="ni-pro-info" style="width:98%">
				<h4 style="text-align:center; font-size:16px">
				Vtag Airdrop Enquiry View Details
				</h4>
				  <div style="clear:both"></div>
                   
         <div style="clear:both"></div>
<style>
.ni_enquiry_box {
float: left;
width: 47%;
height: auto;
margin-right: 30px;
padding: 20px 30px;
text-align: right;   
}
.ni_enquiry_box1 {
   width: 50%;
   float: left;
   text-align: left;
}
		</style>
		<div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
	<thead>
  <tr>
    <th colspan="2">Enquiry View</th>
  </tr>
</thead>            
	<tbody>
    <tr>
        <td>ID</td>
        <td><?php echo $enquiry_loop_query_view[0]->id;?></td> 
     </tr>
     <tr>
     <td>Name </td>              
      <td><?php $user_info = get_userdata($enquiry_loop_query_view[0]->user_id);
            echo $user_info->user_login;//print_r($user_info);?>
       </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $user_info->user_email;?></td>
    </tr>
    <tr>
    <td>Wallet Address</td>
      <td><?php $last_wallet = get_user_meta($enquiry_loop_query_view[0]->user_id, 'wallet_address', $single);
        if($last_wallet[0] == '') {echo 'N/A'; }else {echo $last_wallet[0];}
        ?></td>
    </tr>
    <tr>
        <td>Step1</td>
        <td><?php if($enquiry_loop_query_view[0]->step1 == '') {?>
            <a href="#" class="btn btn-sg btn-info">Step 1 N/A</a>
            <?php }else { ?>
            <a href="<?php echo get_site_url(); ?>/pics/<?php echo $enquiry_loop_query_view[0]->step1;?>" class="btn btn-sg btn-info">Step 1 Download</a>
            <?php } ?></td>
    </tr>
    <tr>
        <td>Step2</td>
        <td><?php if($enquiry_loop_query_view[0]->step2 == '') {?>
            <a href="#" class="btn btn-sg btn-info">Step 2 N/A</a>
            <?php }else { ?>
            <a href="<?php echo get_site_url(); ?>/pics/<?php echo $enquiry_loop_query_view[0]->step2;?>" class="btn btn-sg btn-info">Step 2 Download</a>
            <?php } ?></td>
    </tr>
    <tr>
        <td>Step3</td>
        <td><?php if($enquiry_loop_query_view[0]->step3 == '') {?>
            <a href="#" class="btn btn-sg btn-info">Step 3 N/A</a>
            <?php }else { ?>
            <a href="<?php echo get_site_url(); ?>/pics/<?php echo $enquiry_loop_query_view[0]->step3;?>" class="btn btn-sg btn-info">Step 3 Download</a>
            <?php } ?></td>
    </tr>
    <tr>
        <td>Step4</td>
        <td><?php if($enquiry_loop_query_view[0]->step4 == '') {echo 'N/A'; }else {echo $enquiry_loop_query_view[0]->step4;}?></td>
    </tr>
    <tr>
        <td>Step5</td>
        <td><?php if($enquiry_loop_query_view[0]->step5 == '') {echo 'N/A'; }else {echo $enquiry_loop_query_view[0]->step5;}?></td>
    </tr>
    <tr>
        <td>Step6</td>
        <td><?php if($enquiry_loop_query_view[0]->step6 == '') {echo 'N/A'; }else {echo $enquiry_loop_query_view[0]->step6;}?></td>
    </tr>
    <tr>
        <td>Change Status</td>
        <form role="form" method="post" autocomplete="off">
        <td>
        <?php if($enquiry_loop_query_view[0]->step_status==0) { ?>                		
        <select id="mySelect" class="form-control" name="assign_to" required>
            <option value="">Select the Status</option>
            <option value="Approved">Approved</option>
            <option value="Rejected">Rejected</option>
        </select>        
        <?php } else { 
		$user_info = get_userdata($enquiry_loop_query_view[0]->assign_status);
		echo $user_info->user_login;  } ?>
		</td>
    </tr>
    <tr>
    	<td>Start date</td>
		<td><?php echo $enquiry_loop_query_view[0]->start_date; ?></td>
    </tr>
    <tr>
    	<td>Submitted Date</td>
		<td><?php echo $enquiry_loop_query_view[0]->submitted_date; ?></td>
    </tr>
    <tr>
        <td>Comments</td>
        <td><?php if($enquiry_loop_query_view[0]->enuiry_replied_status==0) { ?>                        
        <textarea class="form-control" placeholder="Enter Your Comments" name="replied" id="myreply"></textarea><br/>
        <input name="lsit_id" type="hidden" value="<?php echo $_REQUEST['view']; ?>"/>
        <input name="replied_st" type="submit" value="Submit" class="btn btn-primary"/>        
        <?php } else { ?>
        <?php echo $enquiry_loop_query_view[0]->enuiry_replied_comments;?>
        <?php } ?></td>
        </form>
    </tr> 
</tbody>        
</table>
		</div>
        <!--<div class="ni_enquiry_box" style="background-color:#9C27B0; color:#FFF;">
            <div class="ni_enquiry_box1">
                <p>Product ID</p>
                <p>Assign Status</p>
                <p>Replied Status</p>
                <p>Created Date</p>
            </div>
            <div class="ni_enquiry_box1">
                <p><?php $product = wc_get_product( $enquiry_loop_query_view[0]->ni_product_id );
						 echo $product->get_title(); ?></p>
                <p><?php 
				if($user_info->user_login !='')
				{				
					echo $user_info->user_login;
				}
				else 
				{
					echo 'Not Assigned';
				}
				?>
                </p>
                <p><?php if($enquiry_loop_query_view[0]->enuiry_replied_status==1) {?> Replied To Student <?php } else { ?>Not Yet Replied <?php } ?></p>
                <p><?php echo $enquiry_loop_query_view[0]->date_added;?></p>
            </div>
        </div>-->				
		</div>
		</div>
		</div>
	<?php }	
}

}
endif;
?>
<style>
#toplevel_page_ni-enquiry-dashboard ul li:nth-child(4){display:none;}
</style>