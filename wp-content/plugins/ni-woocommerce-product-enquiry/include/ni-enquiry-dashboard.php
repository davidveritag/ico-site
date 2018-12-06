<?php
if ( ! defined( 'ABSPATH' ) ) { exit;}
if( !class_exists( 'ni_enquiry_dashboard' ) ) :
class ni_enquiry_dashboard extends ni_enquiry_function{
function __construct(){
}
function init(){
$ni_count_settings = get_option('ni_enquiry_count_settings', array());	
global $wpdb;
$totalcount = $wpdb->get_results("SELECT * FROM wp_airdrop_bounty");
$todaycountst = $wpdb->get_results("select * from wp_airdrop_bounty where date(start_date) = curdate()");
$todaycountsm = $wpdb->get_results("select * from wp_airdrop_bounty where date(submitted_date) = curdate()");
$approved = $wpdb->get_results("select * from wp_airdrop_bounty where step_status = 'Approved'");
$rejected = $wpdb->get_results("select * from wp_airdrop_bounty where step_status = 'Rejected'");
//print_r($ni_count_settings["daily_counts"]);
//echo $ni_count_settings["daily_counts"];
//$ni_count_settings["daily_counts"]
?>
    <div class="ni_enquiry_dashboard">
    	
    	<div class="ni_enquiry_content" style="border:1px solid #9C27B0">
    <div class="ni-pro-info">
				<h4 style="text-align:center; font-size:16px">
				VTAG AIRDROP REPORTS
				</h4>
				  <div style="clear:both"></div>
                   
         <div style="clear:both"></div>
         <div style="border:1px solid #9C27B0"></div>
    	<h3>VTAG AIRDROP Dashboard</h3>
    	<div class="ni_enquiry_box" style="background-color:#F44336; color:#FFF;">
        	<h3>Total Enquiry</h3>
            <span><?php echo count($totalcount); ?></span> 
        </div>
       <div class="ni_enquiry_box" style="background-color:#9C27B0; color:#FFF;">
        	<h3>Today Started Enquiry</h3>
         	 <span><?php echo count($todaycountst); ?></span> 
        </div>
		<div class="ni_enquiry_box" style="background-color:#D47E7E; color:#FFF;">
        	<h3>Today Submitted Enquiry</h3>
         	 <span><?php echo count($todaycountsm); ?></span> 
        </div>
		<div style="clear:both"></div><br clear="all"><br clear="all">
		<div class="ni_enquiry_box" style="background-color:#52FF05; color:#FFF;">
        	<h3>Total Approved Enquiry</h3>
         	 <span><?php echo count($approved); ?></span> 
        </div>
		<div class="ni_enquiry_box" style="background-color:#FF0505; color:#FFF;">
        	<h3>Total Rejected Enquiry</h3>
         	 <span><?php echo count($rejected); ?></span> 
        </div>
        <div style="clear:both"></div>
    </div>	
    <?php
	}
	
}
endif;
?>
<style>
#toplevel_page_ni-enquiry-dashboard ul li:nth-child(4){display:none;}
</style>