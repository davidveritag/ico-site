<?php 
if(!oneline_lite_checkbox_filter('services','section_on_off')) :
if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) {
$heading = get_theme_mod('our_services_heading','');
$subheading = get_theme_mod('our_services_subheading','');

global $wpdb;
$user = wp_get_current_user();
$post_id = $wpdb->get_results("SELECT * FROM wp_airdrop_bounty WHERE user_id=".$user->ID);

if(count($post_id) == 0)
{
		$step1 = 'show';
		$step2 = 'disabled'; 
		$step3 = 'disabled'; 
		$step4 = 'disabled'; 
		$step5 = 'disabled'; 
		$step6 = 'disabled'; 
		$step7 = 'disabled'; 
}else
{
	if(empty($post_id[0]->step1) && empty($post_id[0]->step2) && empty($post_id[0]->step3) && empty($post_id[0]->step4) && empty($post_id[0]->step5) && empty($post_id[0]->step6) && empty($post_id[0]->step_status)) 
	{ 
		$step1 = 'show';
		$step2 = 'disabled'; 
		$step3 = 'disabled'; 
		$step4 = 'disabled'; 
		$step5 = 'disabled'; 
		$step6 = 'disabled'; 
		$step7 = 'disabled'; 
	}elseif(!empty($post_id[0]->step1) && empty($post_id[0]->step2) && empty($post_id[0]->step3) && empty($post_id[0]->step4) && empty($post_id[0]->step5) && empty($post_id[0]->step6) && empty($post_id[0]->step_status)) 
	{ 
		$step1 = 'disabled';
		$step2 = 'show'; 
		$step3 = 'disabled'; 
		$step4 = 'disabled'; 
		$step5 = 'disabled'; 
		$step6 = 'disabled'; 
		$step7 = 'disabled'; 
	}elseif(!empty($post_id[0]->step1) && !empty($post_id[0]->step2) && empty($post_id[0]->step3) && empty($post_id[0]->step4) && empty($post_id[0]->step5) && empty($post_id[0]->step6) && empty($post_id[0]->step_status)) 
	{ 
		$step1 = 'disabled';
		$step2 = 'disabled'; 
		$step3 = 'show'; 
		$step4 = 'disabled'; 
		$step5 = 'disabled'; 
		$step6 = 'disabled'; 
		$step7 = 'disabled'; 	
	}elseif(!empty($post_id[0]->step1) && !empty($post_id[0]->step2) && !empty($post_id[0]->step3) && empty($post_id[0]->step4) && empty($post_id[0]->step5) && empty($post_id[0]->step6) && empty($post_id[0]->step_status)) 
	{ 
		$step1 = 'disabled';
		$step2 = 'disabled'; 
		$step3 = 'disabled'; 
		$step4 = 'show'; 
		$step5 = 'disabled'; 
		$step6 = 'disabled'; 
		$step7 = 'disabled'; 
	}elseif(!empty($post_id[0]->step1) && !empty($post_id[0]->step2) && !empty($post_id[0]->step3) && !empty($post_id[0]->step4) && empty($post_id[0]->step5) && empty($post_id[0]->step6) && empty($post_id[0]->step_status)) 
	{ 
		$step1 = 'disabled';
		$step2 = 'disabled'; 
		$step3 = 'disabled'; 
		$step4 = 'disabled'; 
		$step5 = 'show'; 
		$step6 = 'disabled'; 
		$step7 = 'disabled'; 
	}elseif(!empty($post_id[0]->step1) && !empty($post_id[0]->step2) && !empty($post_id[0]->step3) && !empty($post_id[0]->step4) && !empty($post_id[0]->step5) && empty($post_id[0]->step6) && empty($post_id[0]->step_status)) 
	{ 
		$step1 = 'disabled';
		$step2 = 'disabled'; 
		$step3 = 'disabled'; 
		$step4 = 'disabled'; 
		$step5 = 'disabled'; 
		$step6 = 'show'; 
		$step7 = 'disabled'; 
	}
	elseif(!empty($post_id[0]->step1) && !empty($post_id[0]->step2) && !empty($post_id[0]->step3) && !empty($post_id[0]->step4) && !empty($post_id[0]->step5) && !empty($post_id[0]->step6) && empty($post_id[0]->step_status))
	{ 
		$step1 = '';
		$step2 = ''; 
		$step3 = ''; 
		$step4 = ''; 
		$step5 = ''; 
		$step6 = ''; 
		$step7 = 'show'; 
	}
	elseif(!empty($post_id[0]->step1) && !empty($post_id[0]->step2) && !empty($post_id[0]->step3) && !empty($post_id[0]->step4) && !empty($post_id[0]->step5) && !empty($post_id[0]->step6) && !empty($post_id[0]->step_status) && ($post_id[0]->step_status=='Approved')) 
	{ 
		$step1 = 'disabled';
		$step2 = 'disabled'; 
		$step3 = 'disabled'; 
		$step4 = 'disabled'; 
		$step5 = 'disabled'; 
		$step6 = 'disabled'; 
		$step7 = 'show'; 
	}	
	elseif(($post_id[0]->step_status=='Approved'))
	{ 
		$step1 = 'disabled';
		$step2 = 'disabled'; 
		$step3 = 'disabled'; 
		$step4 = 'disabled'; 
		$step5 = 'disabled'; 
		$step6 = 'disabled'; 
		$step7 = 'show'; 
	}
	elseif($post_id[0]->step_status=='Rejected')
	{ 
		$step1 = '';
		$step2 = ''; 
		$step3 = ''; 
		$step4 = ''; 
		$step5 = ''; 
		$step6 = ''; 
		$step7 = 'show';
	}		
	//$empty = '';
}	
?>
<div class="service-wrapper">
<?php echo  oneline_lite_svg_enable(); ?>
<section id="services" class="<?php echo svg_active();?>">
    <div class="container">
        <div class="page-services">
            <div class="service-block">
				<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
				<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
			<?php if ( is_user_logged_in() ) { ?>
				<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="container">
 <div class="row">
  <div class="process">
   <div class="process-row nav nav-tabs">
    <div class="process-step">
     <button type="button" class="btn btn-circle" data-toggle="tab" href="#menu1" <?php echo $step1; ?>>Step 1</button>
    </div>
    <div class="process-step">
     <button type="button" class="btn btn-circle" data-toggle="tab" href="#menu2" <?php echo $step2; ?>>Step 2</button>

    </div>
    <div class="process-step">
     <button type="button" class="btn btn-circle" data-toggle="tab" href="#menu3" <?php echo $step3; ?>>Step 3</button>

    </div>
    <div class="process-step">
     <button type="button" class="btn btn-circle" data-toggle="tab" href="#menu4" <?php echo $step4; ?>>Step 4</button>

    </div>
	<div class="process-step">
     <button type="button" class="btn btn-circle" data-toggle="tab" href="#menu5" <?php echo $step5; ?>>Step 5</button>

    </div>
	<div class="process-step">
     <button type="button" class="btn btn-circle" data-toggle="tab" href="#menu6" <?php echo $step6; ?>>Step 6</button>

    </div>
	<div class="process-step">
     <button type="button" class="btn btn-circle" data-toggle="tab" href="#menu7" <?php echo $step7; ?>><i class="fa fa-check fa-3x"></i></button>
    </div>
   </div>
  </div>
  <div class="tab-content <?php if($step1 == 'show') {echo 'active in'; }?>">
   <div id="menu1" class="tab-pane fade">
   <p style="text-align:center;">
   <ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
      <li class="service-list2">
         <div class="service-title"><a href="javascript:void;">Earn 20 Vtags</a></div>
      </li>
      <li class="service-list3">
         <div class="service-title"><a href="javascript:void;">Please join vtag telegram group, take a screenshot and upload the file</a></div>
      </li>
   </ul>
   </p>
   <div class="col-lg-12">
      <div class="col-lg-4"></div>
      <div class="col-lg-2"><a href="https://t.me/veriHUB" class="next-step" target="_blank" style="padding-top:15px;">Visit Link </a></div>
      <div class="col-lg-2">
         <form enctype="multipart/form-data" id="fupForm1">
            <?php if($post_id[0]->step_status!='Approved') {?>
            <div class="file-upload">
               <label for="upload" class="file-upload__label">Upload</label>
               <input type="hidden" value="step1" name="step1"/>
               <input type="file" class="form-control file-upload__input" id="upload" name="file" required />
            </div>
            <?php } ?>
      </div>
      <div class="col-lg-4"><p class="statusMsg"></p></div>
   </div>
   <div class="clearfix">&nbsp;</div>
   <div class="col-lg-12">
   <div class="col-lg-3 np1"></div>
   <div class="col-lg-6 np2">Upload the file & Click Next to go further</div>
   <div class="col-lg-3 np3">   
   <ul class="list-unstyled list-inline pull-right">
   <li><input type="submit" name="submit" class="next-step submitBtn" id="fupForm1" value="Next"/></li>
   </ul></div>
   </form>
   </div>
</div>
   
   
   <div id="menu2" class="tab-pane fade <?php if($step2 == 'show') {echo 'active in'; }?>">
        		<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void;">Earn 40 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void;">Please follow Jason Lim veriTAG linkedin account, take a screenshot and upload the file</a></div>
                    </li>
                </ul>
				
				
				<div class="col-lg-12">
	 <div class="col-lg-4"></div>
	 <div class="col-lg-2"><a href="https://www.linkedin.com/in/jason-veritag" class="next-step" target="_blank" style="padding-top:15px;">Visit Link </a></div>
	 <div class="col-lg-2">	 
	 <?php if($post_id[0]->step_status!='Approved') {?>
	 <form enctype="multipart/form-data" id="fupForm2">
			<div class="file-upload">
				<label for="upload" class="file-upload__label">Upload</label>
				<input type="hidden" value="step2" name="step2"/>
				<input type="file" class="form-control file-upload__input" id="upload" name="file" required />
			</div>
	 <?php } ?>
	 </div>
	 <div class="col-lg-4"><p class="statusMsg"></p></div>
	</div>
	
	<div class="clearfix">&nbsp;</div>
				
	 <div class="col-lg-3 np1">
	     <button type="button" class="prev-step"><span><i class="fa fa-chevron-left"></i> &nbsp;Previous</span></button>
     </div>
	 <div class="col-lg-6 np2">You have completed 1st Step. Click Next to go further</div>
	 <div class="col-lg-3 np3">
     	<input type="submit" name="submit" class="next-step submitBtn" id="fupForm2" value="Next"/>
     </div>
	</form>

   </div>
   
   
   <div id="menu3" class="tab-pane fade <?php if($step3 == 'show') {echo 'active in'; }?>">
		<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void;">Earn 80 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void;">Please follow veriTAG linkedin account, take a screenshot and upload the file</a></div>
                    </li>
                </ul>
				
	<div class="col-lg-12">
	 <div class="col-lg-4"></div>
	 <div class="col-lg-2"><a href="https://www.linkedin.com/company/veritag-pte-ltd" class="next-step" target="_blank" style="padding-top:15px;">Visit Link </a></div>
	 <div class="col-lg-2">	 
	 <?php if($post_id[0]->step_status!='Approved') {?>
	 <form enctype="multipart/form-data" id="fupForm3">
			<div class="file-upload">
				<label for="upload" class="file-upload__label">Upload</label>
				<input type="hidden" value="step3" name="step3"/>
				<input type="file" class="form-control file-upload__input" id="upload" name="file" required />
			</div>	  
	 <?php } ?>
	 </div>
	 <div class="col-lg-4"><p class="statusMsg"></p></div>
	</div>
	
	<div class="clearfix">&nbsp;</div>
				
    <div class="col-lg-3 np1">
        <button type="button" class="prev-step"><span><i class="fa fa-chevron-left"></i> &nbsp;Previous</span></button>
    </div>
    <div class="col-lg-6 np2">You have completed 2nd Step. Click Next to go further</div>
    <div class="col-lg-3 np3">
        <input type="submit" name="submit" class="next-step submitBtn" id="fupForm3" value="Next"/>
    </div>
	</form>
</div>
  
   
   <div id="menu4" class="tab-pane fade <?php if($step4 == 'show') {echo 'active in'; }?>">
    <ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void;">Earn 160 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void;">Refer a friend into telegram community. Friend must participate in airdrop</a></div>
                    </li>
                </ul>
				<div class="col-lg-12">
	 <div class="col-lg-3"></div>
	 <div class="col-lg-2"><a href="https://t.me/veriHUB" class="next-step" target="_blank" style="padding-top:15px;">Visit Link </a></div>
	 <div class="col-lg-3">	 
	 <?php if($post_id[0]->step_status!='Approved') {?>
	 <form enctype="multipart/form-data" id="fupForm4">
			<div class="">
				<input type="hidden" value="step4" name="step4"/>
				<input type="text" class="form-control" id="step4_value" name="step4_value" required placeholder="Please indicate your friend's telegram ID"/>
			</div>	
	 <?php } ?>
	 </div>
	 <div class="col-lg-4"><p class="statusMsg"></p></div>
	</div>
	
	<div class="clearfix">&nbsp;</div>
    <div class="col-lg-3 np1">
        <button type="button" class="prev-step"><span><i class="fa fa-chevron-left"></i> &nbsp;Previous</span></button>
    </div>
    <div class="col-lg-6 np2">You have completed 3rd Step. Click Next to go further</div>
    <div class="col-lg-3 np3">
        <input type="submit" name="submit" class="next-step submitBtn" id="fupForm4" value="Next"/>
    </div>
	</form>
   </div>
   <div id="menu5" class="tab-pane fade <?php if($step5 == 'show') {echo 'active in'; }?>">
   <ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void;">Earn 1280 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void;">Refer more than 5 friends into telegram community at https://t.me/veriHUB (increase to 1,280 vtags). Friends must participate in airdrop</a></div>
                    </li>
                </ul>
				
				<div class="col-lg-12">
	 <div class="col-lg-3"></div>
	 <div class="col-lg-2"><a href="https://t.me/veriHUB" class="next-step" target="_blank" style="padding-top:15px;">Visit Link </a></div>
	 <div class="col-lg-3">	 
	 <?php if($post_id[0]->step_status!='Approved') {?>
	 <form enctype="multipart/form-data" id="fupForm5">
			<div class="">
				<input type="hidden" value="step5" name="step5"/>
				<input type="text" class="form-control" id="step5_value" name="step5_value" required placeholder="Please indicate all your friend's telegram ID"/>
			</div>	 
	 <?php } ?>
	 </div>
	 <div class="col-lg-4"><p class="statusMsg"></p></div>
	</div>
	
	<div class="clearfix">&nbsp;</div>
	
    <div class="col-lg-3 np1">
        <button type="button" class="prev-step"><span><i class="fa fa-chevron-left"></i> &nbsp;Previous</span></button>
    </div>
	<div class="col-lg-6 np2">You have completed 4th Step. Click Next to go further</div>
	<div class="col-lg-3 np3">
	    <input type="submit" name="submit" class="next-step submitBtn" id="fupForm5" value="Next"/>
	</div>
	</form>
   </div>
   
   <div id="menu6" class="tab-pane fade <?php if($step6 == 'show') {echo 'active in'; }?>">
   <br/><br/>
    <ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
                    <li class="service-list2" style="margin:0% 4% 0% 3% !important;">
                        <div class="service-title"><a href="javascript:void;">Earn 2,560 Vtags</a></div>
                    </li>
                    <li class="service-list3" style="margin:0% 4% 0% 0% !important;">
						<div class="service-title"><a href="javascript:void;">Purchase 20,000 vtags with 1 ETH (increase to 2,560 vtags). Indicate contract address</a></div>
                    </li>
	</ul>		<br/><br/>
	<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">	
					<li class="service-list2" style="margin:0% 4% 0% 3% !important;">
                        <div class="service-title"><a href="javascript:void;">Earn 5,120 Vtags</a></div>
                    </li>
                    <li class="service-list3" style="margin:0% 4% 0% 0% !important;">
						<div class="service-title"><a href="javascript:void;">Purchase another 20,000 vtags (total 40000 with 2 ETH) (Increase to 5,120 vtags)</a></div>
                    </li>
    </ul><br/><br/>
	<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">	
					<li class="service-list2" style="margin:0% 4% 0% 3% !important;">
                        <div class="service-title"><a href="javascript:void;">Earn 10,240 Vtags</a></div>
                    </li>
                    <li class="service-list3" style="margin:0% 4% 0% 0% !important;">
						<div class="service-title"><a href="javascript:void;">Purchase another 20,000 vtags (total 60,000 with 3 ETH) (increase to 10,240 vtags)</a></div>
                    </li>
    </ul><br/><br/>
	<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">	
					<li class="service-list2" style="margin:0% 4% 0% 3% !important;">
                        <div class="service-title"><a href="javascript:void;">Earn 20,480 Vtags</a></div>
                    </li>
                    <li class="service-list3" style="margin:0% 4% 0% 0% !important;">
						<div class="service-title"><a href="javascript:void;">Purchase another 20,000 vtags (total 80,000 with 8 ETH) (increase to 20,480 vtags)</a></div>
                    </li>
    </ul><br/><br/>
				
				<div class="col-lg-12">
	 <div class="col-lg-4"></div>
	 <div class="col-lg-2"><a href="https://docs.google.com/forms/d/15QkbQTN2bSk2vMJIqkrUjYQ_WjjRGFhz3Gm1TEbEhu4/viewform?edit_requested=true" class="next-step" target="_blank" style="padding-top:15px;">Visit Link </a></div>
	 <div class="col-lg-2">	 
	 <?php if($post_id[0]->step_status!='Approved') {?>
	 <form enctype="multipart/form-data" id="fupForm6">
			<div class="">				
				<input type="hidden" value="step6" name="step6"/>
				<input type="text" class="form-control" id="step6_value" name="step6_value" required placeholder="Please Indicate contract address"/>
			</div>	  
	 <?php } ?>
	 </div>
	 <div class="col-lg-4"><p class="statusMsg"></p></div>
	</div>
	
	<div class="clearfix">&nbsp;</div>
	
	
    <div class="col-lg-3 np1">
    	<button type="button" class="prev-step"><span><i class="fa fa-chevron-left"></i> &nbsp;Previous</span></button>
    </div>
	 <div class="col-lg-6 np2">Investment address ETH : 0x7D6871dDd38E82d55812c5D6a6768Ef420317456<br/>
	 You have completed 5th Step. Click Next to go further</div>
    <div class="col-lg-3 np3">
        <input type="submit" name="submit" class="next-step submitBtn" id="fupForm6" value="Next"/>
		</form>
    </div>
   </div>
   
   
   <div id="menu7" class="tab-pane fade <?php if($step7 == 'show') {echo 'active in'; }?>">
   <br/><br/>
	<?php if($post_id[0]->step_status == '') { ?>
    <h3>Your Airdrop form Applications Verifications in Progress</h3>
    <p>Once verifiy the applications, will send you an email with status and further details to your registered Emails</p>
   <?php } elseif($post_id[0]->step_status == 'Rejected') { ?>
	<h3>Your Airdrop form Applications Verifications Rejected</h3>
	<p>Thanks for your participation in vtag airdrop. <br/> We have checked and verified your airdrop process and has notice discrepancies in your submission. <br/> Please go back and resubmit.</p>
    <p></p>
   <?php } else { ?>
   <p>Thanks for your participation in vtag airdrop.<br/> We have checked and verified your airdrop process <br/> and is please to announce that you will be awarded the following vtag when the ICO close</p>
   <?php } ?>
	<div class="col-lg-12">
	 <div class="col-lg-4"></div>
	 <div class="col-lg-4">
	<br/>
	<?php if($post_id[0]->step_status == '') { ?>
		<button type="button" class="btn btn-info btn-lg"><i class="fa fa-spinner"></i> Verifications in Progress !!!</button>
	<?php } elseif($post_id[0]->step_status == 'Rejected') { ?>
		<button type="button" class="btn btn-danger btn-lg"><i class="fa fa-warning"></i> Verifications Rejected !!!</button>
	<?php } else { ?>
		<button type="button" class="btn btn-success btn-lg"><i class="fa fa-check"></i> Verifications Completed !!!</button>
	 <?php } ?>
				
	 </div>
	 <div class="col-lg-4"><p class="statusMsg"></p></div>
	</div>
	
	<div class="clearfix">&nbsp;</div>

   </div>
   
  </div>
 </div>
</div>
			
			<?php } else { ?>

               <ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
					<li class="service-list1">
                        <div class="service-title"><a href="javascript:void(0)">STEP 1</a></div>
                    </li>
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void(0)">Earn 20 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void(0)">Please join vtag telegram group, take a screenshot and upload the file</a></div>
                    </li>
                </ul>
				
				<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
					<li class="service-list1">
                        <div class="service-title"><a href="javascript:void(0)">STEP 2</a></div>
                    </li>
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void(0)">Earn 40 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void(0)">Please follow Jason Lim veriTAG linkedin account, take a screenshot and upload the file</a></div>
                    </li>
                </ul>
				
				<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
					<li class="service-list1">
                        <div class="service-title"><a href="javascript:void(0)">STEP 3</a></div>
                    </li>
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void(0)">Earn 80 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void(0)">Please follow veriTAG linkedin account, take a screenshot and upload the file</a></div>
                    </li>
                </ul>
				
				<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
					<li class="service-list1">
                        <div class="service-title"><a href="javascript:void(0)">STEP 4</a></div>
                    </li>
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void(0)">Earn 160 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void(0)">Refer a friend into telegram community. Friend must participate in airdrop</a></div>
                    </li>
                </ul>
				
				<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
					<li class="service-list1">
                        <div class="service-title"><a href="javascript:void(0)">STEP 5</a></div>
                    </li>
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void(0)">Earn 1280 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void(0)">Refer a friend into telegram community. Friend must participate in airdrop</a></div>
                    </li>
                </ul>
				
				<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
					<li class="service-list1">
                        <div class="service-title"><a href="javascript:void(0)">STEP 6</a></div>
                    </li>
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void(0)">Earn 2560 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void(0)">Purchase 20,000 vtags with 1 ETH (increase to 2,560 vtags). Indicate contract address</a></div>
                    </li>
                </ul>
				
				<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
					<li class="service-list1">
                        <div class="service-title"><a href="javascript:void(0)">STEP 7</a></div>
                    </li>
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void(0)">Earn 5120 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void(0)">Purchase another 20,000 vtags (total 40000) (Increase to 5,120 vtags). indicate contract address.</a></div>
                    </li>
                </ul>
				
				<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
					<li class="service-list1">
                        <div class="service-title"><a href="javascript:void(0)">STEP 8</a></div>
                    </li>
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void(0)">Earn 10,240 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void(0)">Purchase another 20,000 vtags (total 60,000) (increase to 10,240 vtags). Indicate contract address.</a></div>
                    </li>
                </ul>
				
				<ul class="service-grid wow fadeInLeft" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s;">
					<li class="service-list1">
                        <div class="service-title"><a href="javascript:void(0)">STEP 9</a></div>
                    </li>
                    <li class="service-list2">
                        <div class="service-title"><a href="javascript:void(0)">Earn 20,480 Vtags</a></div>
                    </li>
                    <li class="service-list3">
						<div class="service-title"><a href="javascript:void(0)">Purchase another 20,000 vtags (total 80,000) (increase to 20,480 vtags). Indicate contract address.</a></div>
                    </li>
                </ul>
	<?php } ?>
            </div>
        </div>
		
		
			
    </div>
</section>
<?php
echo oneline_lite_svg_bottom_enable();
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php endif ;?>
<script>
$(function(){
	$('.service-list1, .service-list2, .service-list3').on('click',function(){
		$("#menu #menu-item-8").trigger("click");
	 });
 $('.btn-circle').on('click',function(){
   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
   $(this).addClass('btn-info').removeClass('btn-default').blur();
 });

 $('.next-step, .prev-step').on('click', function (e){
   var $activeTab = $('.tab-pane.active');

   $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');

   /*if ( $(e.target).hasClass('next-step') )
   {
      var nextTab = $activeTab.next('.tab-pane').attr('id');
      $('[href="#'+ nextTab +'"]').addClass('btn-info').removeClass('btn-default');
      $('[href="#'+ nextTab +'"]').tab('show');
   }
   else
   {
      var prevTab = $activeTab.prev('.tab-pane').attr('id');
      $('[href="#'+ prevTab +'"]').addClass('btn-info').removeClass('btn-default');
      $('[href="#'+ prevTab +'"]').tab('show');
   }*/
 });
});
</script>

<script>
$(document).ready(function(e){
	
	/*$(".submitBtn").click(function() {
		var id = $(this).attr('id');
		alert("#"+id);
		$("#"+id).submit(function(e) {
			alert('formsubmit');
		});
	});*/
	
    $("#fupForm1").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm1').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm1')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
					//redirect the page
					setTimeout(function() {
						location.reload();
					}, 1000);
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#fupForm1').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
	
	$("#fupForm2").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm2').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm2')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
					//redirect the page
					setTimeout(function() {
						location.reload();
					}, 1000);
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#fupForm2').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
	
	$("#fupForm3").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm3').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm3')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
					//redirect the page
					setTimeout(function() {
						location.reload();
					}, 1000);
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#fupForm3').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
	
	$("#fupForm4").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm4').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm4')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
					//redirect the page
					setTimeout(function() {
						location.reload();
					}, 1000);
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#fupForm4').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
	
	$("#fupForm5").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm5').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm5')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
					//redirect the page
					setTimeout(function() {
						location.reload();
					}, 1000);
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#fupForm5').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
	
	$("#fupForm6").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm6').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm6')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
					//redirect the page
					setTimeout(function() {
						location.reload();
					}, 1000);
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#fupForm6').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
	
	$("#fupForm7").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm7').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm7')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
					//redirect the page
					setTimeout(function() {
						location.reload();
					}, 1000);
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#fupForm7').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
	
    
    //file type validation
    $("#file").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Please select a valid image file (JPEG/JPG/PNG).');
            $("#file").val('');
            return false;
        }
    });
});
</script>
<style>
a:hover, a:focus{color: #fff !important;}
.btn-info {
    background: linear-gradient(to right, #67D690 0%, #00A99D 100%) !important;    
}
</style>