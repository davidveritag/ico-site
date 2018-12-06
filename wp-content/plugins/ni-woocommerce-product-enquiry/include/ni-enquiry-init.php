<?php
if ( ! defined( 'ABSPATH' ) ) { exit;}

if( !class_exists( 'ni_enquiry_init' ) ) :

require_once('ni-enquiry-function.php');
	
class ni_enquiry_init extends ni_enquiry_function{
	function __construct(){
		
		add_action('admin_init', array( &$this, 'admin_init' ) );
		add_action( 'admin_menu',  array(&$this,'admin_menu' ));	
		add_action( 'wp_head', array(&$this,'wp_head'), 12.5 );
		add_action( 'wp_footer', array(&$this,'wp_footer'), 12.5 );
		add_action( 'ni_enquiry_form_data', array(&$this,'ni_enquiry_send_email'));
		add_action( 'admin_enqueue_scripts',  array(&$this,'admin_enqueue_scripts' ));
		
		
		
		add_action( 'wp_ajax_ni_enquiry_ajax_request',  array(&$this,'enquiry_ajax_request' ));
		add_action( 'wp_ajax_nopriv_ni_enquiry_ajax_request',  array(&$this,'enquiry_ajax_request' ));
		add_filter( 'plugin_row_meta',  array(&$this,'ni_enquiry_plugin_row_meta' ), 10, 2 );
		
		add_filter( 'admin_footer_text',  array(&$this,'admin_footer_text' ),101);
		
		$this->add_enquiry_setting_page();
	}
	function admin_footer_text($text){
	
		$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : '';
		$admin_pages = $this->get_admin_pages();
		if (in_array($page,$admin_pages)){
				
				$text = sprintf( __( 'Thank you for using our plugins <a href="%s" target="_blank">shamlatech</a>' ,'shamlatech'), 
				__( 'http://shamlatech.com/'  ,'shamlatech') );
				$text = "<span id=\"footer-thankyou\">". $text ."</span>"	 ;
			
		 }
		return $text ; 
	}
	function get_admin_pages(){
		$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : '';
		$admin_pages = array();
		$admin_pages[] = 'ni-enquiry-dashboard';
		$admin_pages[] = 'ni-enquiry-listing';
		$admin_pages[] = 'ni-enquiry-addon';
		$admin_pages[] = 'ni-enquiry-listing';
		return $admin_pages;
	
	}
	function ni_enquiry_plugin_row_meta($links, $file){
		if ( $file == "ni-woocommerce-product-enquiry/ni-woocommerce-product-enquiry.php" ) {
				$row_meta = array(
				
				'ni_pro_version'=> '<a target="_blank" href="http://naziinfotech.com/product/ni-woocommerce-product-enquiry-pro">Buy Pro Version</a>',
				
				'ni_pro_review'=> '<a target="_blank" href="https://wordpress.org/plugins/ni-woocommerce-product-enquiry/#reviews">Write a Review</a>'	);
					
	
				return array_merge( $links, $row_meta );
			}
			return (array) $links;
	}
	function admin_enqueue_scripts(){
		if (isset($_REQUEST["page"])) {
			 $page = $_REQUEST["page"];
			  if ("ni-enquiry-list" ==$page || $page =="ni-enquiry-dashboard"){
			  	/*JQuery UI*/
				wp_register_style('ni-enquiry-admin', plugins_url( '../css/ni-enquiry-admin.css', __FILE__ ));
				wp_enqueue_style('ni-enquiry-admin' );
			  }
		}
	}
	function admin_init(){
	}
	function admin_menu(){
		add_menu_page('VTAG','VTAG','manage_options','ni-enquiry-dashboard',array(&$this,'add_page'),plugins_url( '../images/icon2.png', __FILE__ ),56.36);
    	add_submenu_page('ni-enquiry-dashboard', 'Dashboard', 'Dashboard', 'manage_options', 'ni-enquiry-dashboard' , array(&$this,'add_page'));
		add_submenu_page('ni-enquiry-dashboard', 'VTAG Listing', 'VTAG Listing', 'manage_options', 'ni-enquiry-listing' , array(&$this,'add_page'));
		//add_submenu_page('ni-enquiry-dashboard', 'Add-ons', 'Add-ons', 'manage_options', 'ni-enquiry-addon' , array(&$this,'add_page'));
	}
	function add_page(){
		if (isset($_REQUEST["page"])){
			$page = $_REQUEST["page"];
			if ($page=="ni-enquiry-dashboard"){
				include_once("ni-enquiry-dashboard.php");
				$obj =  new ni_enquiry_dashboard();
				$obj->init();
			}
			if ($page=="ni-enquiry-addon") {
				include_once("ni-addons.php");
				$obj =  new ni_enquiry_addons();
				$obj->page_init();
			}
			if ($page=="ni-enquiry-listing") {
				include_once("ni-enquiry-listing.php");
				$obj =  new ni_enquiry_listing();
				$obj->init();
			}

		}
	}
	function wp_head(){
		//add_action('woocommerce_single_product_summary', array(&$this,'add_button'),40);
		if(is_product()) :
				
			add_action('woocommerce_after_add_to_cart_form', array(&$this,'add_button'));
			
			wp_enqueue_script('jquery-ui-dialog');
			//wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css'); 
			//wp_enqueue_script('jquery-ui-core');
			
			wp_enqueue_script( 'ni-enquiry', plugins_url( '../js/ni-enquiry.js', __FILE__ ) , array( 'jquery' ) );
			
			
			wp_enqueue_script( 'ni-enquiry-ajax-script', plugins_url( '../js/ni-enquiry-ajax-script.js', __FILE__ ) , array( 'jquery' ) );
			wp_localize_script( 'ni-enquiry-ajax-script', 'ni_enquiry_ajax_object', array( 'ni_enquiry_ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234, 'admin_url' => admin_url("admin.php"), 'admin_page'=>(isset($_REQUEST["page"]) ? $_REQUEST["page"] : '') ) );
			
			wp_register_style('ni-enquiry', plugins_url( '../css/ni-enquiry.css', __FILE__ ));
			wp_enqueue_style('ni-enquiry' );
			
			/*JQuery UI*/
			wp_register_style('in-jquery-ui', plugins_url( '../css/jquery-ui.css', __FILE__ ));
			wp_enqueue_style('in-jquery-ui' );
			
			/*Ni JQuery Popup*/
			wp_register_style('ni-popup-css', plugins_url( '../css/ni-popup.css', __FILE__ ));
			wp_enqueue_style('ni-popup-css' );
			
		endif;
	}
	function wp_footer(){
		if(is_product()) :
		
		global $product;
	   // $id = $product->id;
		?>
        <div class="popup ni-popup-content" data-popup="popup-1">
			<div class="popup-inner">
				<form name="frm_hd_ni_enquiry" id="frm_hd_ni_enquiry">
                <div class="ni_enquiry_message alert alert-danger"></div>
                <table class="ni_enquiry_table" cellpadding="0" cellspacing="0">
                	
                	<tr>
                    	<td class="ni_enquiry_text"><label for="ni_full_name">Full Name:</label></td>
                        <td class="ni_enquiry_value"><input type="text" id="ni_full_name" name="ni_full_name" size="40"  /></td>
                    </tr>
                    <tr>
                    	<td class="ni_enquiry_text"><label for="ni_email_address">Email Address:</label></td>
                        <td class="ni_enquiry_value"><input type="text" id="ni_email_address" name="ni_email_address" size="40" /></td>
                    </tr>
                     <tr>
                    	<td class="ni_enquiry_text"><label for="ni_contact_number">Contact Number:</label> </td>
                        <td class="ni_enquiry_value"><input type="text" id="ni_contact_number"  name="ni_contact_number" size="40" /></td>
                    </tr>
                    <tr>
                    	<td class="ni_enquiry_text"><label for="ni_enquiry_description">Enquiry:</label></td>
                        <td class="ni_enquiry_value"><textarea id="ni_enquiry_description" rows="5" cols="38" name="ni_enquiry_description"></textarea></td>
                    </tr>
                    <tr>
                    	<td><a data-popup-close="popup-1"  href="#">Close</a></td>
                    	<td class="ni_normal_button"><button type="button" class="single_add_to_cart_button button alt btn_ni_send">Send</button></td>
                    </tr>
                </table>
                 <input type="hidden" id="ni_ajax_url" name="ni_ajax_url" value="<?php echo admin_url( 'admin-ajax.php' ); ?>" />
          		 <input type="hidden" name="action" id="action" value="ni_enquiry_ajax_request" />
                 <input type="hidden" name="ni_product_id" id="ni_product_id" value="<?php echo $product->get_id() ?>" />
              </form>
				<a class="popup-close" data-popup-close="popup-1" href="#">x</a>
			</div>
		</div>
        <?php 
			//http://cssdeck.com/labs/twitter-bootstrap-alerts
		endif;
	}
	function add_button(){
		$enquiry_option = get_option( 'ni_enquiry_option' );
		$enquiry_button_text =  isset($enquiry_option['ni_enquiry_button_text'])?$enquiry_option['ni_enquiry_button_text']:'';
		if (strlen($enquiry_button_text)==0){
			$enquiry_button_text = 'enquiry';
		}
		?>
        <div id="ni_enquiry" class="woocommerce">
        
            <input type="button"  data-popup-open="popup-1" class="single_add_to_cart_button button alt" id="btn_ni_enquiry"  value="<?php echo $enquiry_button_text  ?>" />
        </div>
        <?php
	}
	function enquiry_ajax_request(){	
		$ni_full_name = $_REQUEST['ni_full_name'];
		$ni_email_address = $_REQUEST['ni_email_address'];
		$ni_contact_number = $_REQUEST['ni_contact_number'];
		$ni_enquiry_description = $_REQUEST['ni_enquiry_description'];
		$ni_product_id = $_REQUEST['ni_product_id'];
		
		global $wpdb;
		$wpdb->insert( 
	'wp_course_enquiry', 
	array( 
		'ni_full_name' => $ni_full_name, 
		'ni_email_address' => $ni_email_address, 
		'ni_contact_number' => $ni_contact_number,
		'ni_enquiry_description' => $ni_enquiry_description,
		'ni_product_id' => $ni_product_id
	)
);

		do_action("ni_enquiry_form_data",$_REQUEST);
		die;
	}
	function ni_enquiry_send_email($request){
		$data 			= array();
		$enquiry_option = get_option( 'ni_enquiry_option' );
	//	$shop_name =     	 bloginfo( 'name' ); 
 		
		$to_email 			= $enquiry_option['ni_to_email'];
		$subject_line 		= $enquiry_option['ni_subject_line'];
		
		$add_cc_email 		= $enquiry_option['add_cc_email'];
		
		$ni_from_email		= $enquiry_option['ni_from_email'];
		$enquiry_from_name		= $enquiry_option['enquiry_from_name'];
		
		$thank_you_message 	= $enquiry_option['ni_thank_you_message'];
		if ($thank_you_message =="")
		{
		$thank_you_message = "Thank you message for contact with us.";
		}
		$email_to_customer 	= isset($enquiry_option['enable_email_to_customer'])?'yes':'no';
		
		
		 $html  		= "";
		 $product_name  = "";
		 $category  	= "";
		 $price  		= "";
		 $sku  			= "";
		 
		 $product_id 	= $request["ni_product_id"];
		 //echo json_encode($request);
		// die;
		 $product_info  = $this->get_product_info( $product_id);
		 $category      = $this->get_product_category_by_id($product_id);
		 $product_name 	= get_the_title($product_id);
		 
		 $html .= "<div style=\"overflow-x:auto;\">";
		 
		 $html .= "<table  style=\"width:75%; border:1px solid #00838f; border-collapse: collapse; margin: 0 auto;\" cellpadding=\"0\" cellspacing=\"0\" >";
		 
		 $html .= "		<tr>";
		 $html .= "			<td colspan=\"2\"  style=\"background:#0097A7;color:#FFFFFF; height:150; padding:15px;font-size:18;font-weight:bold\" >Customer Information</td>";
		 $html .= "		</tr>";
		 $html .= "		<tr>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f; width:200px\" >Full Name</td>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;\" >".$request["ni_full_name"]."</td>";
		 $html .= "		</tr>";
		 $html .= "		<tr>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;width:200px\" >Email Address</td>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;\" >".$request["ni_email_address"]."</td>";
		 $html .= "		</tr>";
		 
		 $html .= "		<tr>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;width:200px\" >Contact Number</td>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;\" >".$request["ni_contact_number"]."</td>";
		 $html .= "		</tr>";
		 
		 $html .= "		<tr>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;width:200px\" >Enquiry</td>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;\" >".$request["ni_enquiry_description"]."</td>";
		 $html .= "		</tr>";
		
		 $html .= "		<tr>";
		 $html .= "			<td colspan=\"2\" style=\"background:#0097A7;color:#FFFFFF; height:150; padding:15px;font-size:18;font-weight:bold\">Product Information</td>";
		 $html .= "		</tr>";
		 $html .= "		<tr>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;width:200px\" >Product Name</td>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;\" >{$product_name}</td>";
		 $html .= "		</tr>";
		 $html .= "		<tr>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;width:200px\" >Category</td>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;\" >{$category}</td>";
		 $html .= "		</tr>";
		 $html .= "		<tr>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;width:200px\" >Price</td>";
		 $html .= "			<td style=\"padding:10px;border-bottom: 1px solid #00838f;\" >".$product_info["price"]."</td>";
		 $html .= "		</tr>";
		 $html .= "		<tr>";
		 $html .= "			<td style=\"padding:10px;width:200px\" >SKU</td>";
		 $html .= "			<td style=\"padding:10px;\" >".$product_info["sku"]."</td>";
		 $html .= "		</tr>";
		 $html .= "</table>";
		 $html .= "</div>";
		 
		
		/*$headers = array(
			'Reply-To' => "Gustavo Bordoni <gustavo@bordoni.me>"
		);
		*/
		//$headers = array('Content-Type: text/html; charset=UTF-8');
		$headers =  array();
		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		if ($enquiry_from_name ==""){
			$enquiry_from_name = "";
		}
		if ($ni_from_email)
		$headers[] = 'From: '.$enquiry_from_name.' <' .$ni_from_email. '>';
		if ($add_cc_email)
		$headers[] = 'Cc: <' .$add_cc_email. '>';
		//enquiry_from_name
		
		 $status = wp_mail($to_email, $subject_line, $html, $headers);
		if ($email_to_customer =="yes"){
			 $status2 = wp_mail($request["ni_email_address"], $subject_line, $html, $headers);
		}
		 //if ($email_to_customer =="yes")
		  //$status = $this->ni_send_email2($request["ni_email_address"],$subject_line,$html );
		  //$status = $this->ni_send_email2($to_email,$subject_line,$html );
		 if ($status){
			 $status = "SUCCESS";
		 }else{
		  	$status = "FAIL";
		 }
		 $data["status"] = $status ;
		 $data["message"] = $thank_you_message  ;
		 //$data["other"] = $email_to_customer;
		 
		 /*Set Count*/
		 $this->set_enquiry_count();
		 echo  json_encode( $data);
		 
	
		 
		 //echo $subject_line; 
		 //echo json_encode($product_info);
		 //echo $product_info["price"];
		 
		 
		
	}
	function add_enquiry_setting_page()
	{
		include_once("ni-enquiry-setting.php");	
		$obj = new ni_enquiry_setting();
	}
	function test(){
				/*Added By Anzar Ahmed*/
		function add_content_after_addtocart_button_func() {
		
				// Echo content.
				echo '<div class="second_content">Other content here!</div>';
		
		}
		//add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart_button_func' );
		
		//Button
		//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		
		//add_action( 'woocommerce_after_shop_loop_item', 'my_woocommerce_template_loop_add_to_cart', 10 );
		
		function my_woocommerce_template_loop_add_to_cart() {
			global $product;
			echo '<form action="' . esc_url( $product->get_permalink( $product->id ) ) . '" method="get">
					<button type="submit" class="single_add_to_cart_button button alt">' . __('More Detail', 'woocommerce') . '</button>
				  </form>';
		}
	}
}

endif;
?>