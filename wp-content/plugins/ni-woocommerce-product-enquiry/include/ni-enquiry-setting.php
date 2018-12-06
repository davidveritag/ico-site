<?php
//header('Location: http://shamlatech.net/vtag/wp-admin/admin.php?page=ni-enquiry-listing');exit;
if ( ! defined( 'ABSPATH' ) ) { exit;}
if( !class_exists( 'ni_enquiry_setting' ) ) {
	class ni_enquiry_setting{
		
		
		
		function __construct() {
			 add_action( 'admin_menu', array( $this, 'add_setting_page' ) );
			 add_action( 'admin_init', array( $this, 'admin_init' ),110 );
			 add_action( 'admin_init', array( $this, 'admin_init_save'),100 );
		}
		function add_setting_page(){
			add_submenu_page( "ni-enquiry-dashboard", 'Setting', 'Setting', 'manage_options', 'ni-enquiry-listing', array( $this, 'setting_page' ) );
		}
		function admin_init_save(){
		//echo '<pre>',print_r($_REQUEST,1),'</pre>';	
		if (isset($_REQUEST["ni_enquiry_option"])){
			//$this->options = get_option( 'ni_enquiry_option' );

			//$option_value = $_REQUEST["ni_email_option"];
		   // echo json_encode($_REQUEST["ni_enquiry_option"]);
			//die;
			update_option('ni_enquiry_option',$_REQUEST["ni_enquiry_option"]);
			//die;
		}
		
	}
		function setting_page(){
			    // Set class property
			$this->options = get_option( 'ni_enquiry_option' );
			//$this->options = get_option( 'invoice_setting_option' );
			?>
			<div class="wrap">
				<?php //screen_icon(); ?>
			  <!--  <h2>My Settings</h2>           -->
				<form method="post">
				<?php
					// This prints out all hidden setting fields
					settings_fields( 'ni_enquiry_option_group' );   
					do_settings_sections( 'my-setting-admin' );
					submit_button(); 
				?>
				</form>
			</div>
			<?php
		}
		function admin_init(){
			register_setting(
				'ni_enquiry_option_group', // Option group
				'ni_enquiry_option', // Option name
				array( $this, 'sanitize' ) // Sanitize
			);
			
			add_settings_section(
				'setting_section_id', // ID
				'Enquiry Settings', // Title
				array( $this, 'print_section_info' ), // Callback
				'my-setting-admin' // Page
			);
			
		
			/*Email Variable*/
			/*To Email*/
			add_settings_field(
				'ni_to_email', 
				'To Email Address', 
				array( $this, 'add_to_email' ), 
				'my-setting-admin', 
				'setting_section_id'
			);
			/*cc Email*/
			add_settings_field(
				'ni_cc_email', 
				'CC Email Address', 
				array( $this, 'add_cc_email' ), 
				'my-setting-admin', 
				'setting_section_id'
			);
			/*Subject Line*/
			add_settings_field(
				'ni_subject_line', 
				'Subject Line', 
				array( $this, 'add_subject_line' ), 
				'my-setting-admin', 
				'setting_section_id'
			);
			/*Subject Line*/
		/*	add_settings_field(
				'ni_subject_line', 
				'Subject Line', 
				array( $this, 'add_subject_line' ), 
				'my-setting-admin', 
				'setting_section_id'
			);
			*/
			/*From Email*/
			add_settings_field(
				'ni_from_email', 
				'From Email Address', 
				array( $this, 'add_from_email' ), 
				'my-setting-admin', 
				'setting_section_id'
			);
			
			/*From Name*/
			add_settings_field(
				'ni_enquiry_from_name', 
				'From Name', 
				array( $this, 'add_enquiry_from_name' ), 
				'my-setting-admin', 
				'setting_section_id'
			);
			
			/*enquiry_button_text*/
			add_settings_field(
				'ni_enquiry_button_text', 
				'Enquiry Button Text', 
				array( $this, 'add_enquiry_button_text' ), 
				'my-setting-admin', 
				'setting_section_id'
			); 
			/*Email To Customer*/
			add_settings_field(
				'enable_email_to_customer', 
				'Email to customer', 
				array( $this, 'enable_email_to_customer' ), 
				'my-setting-admin', 
				'setting_section_id'
			);  
			
			add_settings_field(
				'ni_thank_you_message', 
				'Thank you message', 
				array( $this, 'add_thank_you_message' ), 
				'my-setting-admin', 
				'setting_section_id'
			); 
			
			
			
			 
		}
		
		function add_to_email(){
			printf(
				'<input type="text" id="ni_to_email" name="ni_enquiry_option[ni_to_email]" value="%s" size="40"/>',
				isset( $this->options['ni_to_email'] ) ? esc_attr( $this->options['ni_to_email']) : ''
				//esc_attr( $this->options['name'])
			);
		}
		function add_cc_email(){
			printf(
				'<input type="text" id="add_cc_email" name="ni_enquiry_option[add_cc_email]" value="%s" size="40" />',
				isset( $this->options['add_cc_email'] ) ? esc_attr( $this->options['add_cc_email']) : ''
				//esc_attr( $this->options['name'])
			);
		}
		function add_subject_line(){
			printf(
				'<input type="text" id="ni_subject_line" name="ni_enquiry_option[ni_subject_line]" value="%s"  size="40" />',
				isset( $this->options['ni_subject_line'] ) ? esc_attr( $this->options['ni_subject_line']) : ''
				//esc_attr( $this->options['name'])
			);
			
		}
		function add_from_email(){
			printf(
				'<input type="text" id="ni_from_email" name="ni_enquiry_option[ni_from_email]" value="%s" size="40" />',
				isset( $this->options['ni_from_email'] ) ? esc_attr( $this->options['ni_from_email']) : ''
				//esc_attr( $this->options['name'])
			);			
		}
		function add_enquiry_from_name(){
			printf(
				'<input type="text" id="enquiry_from_name" name="ni_enquiry_option[enquiry_from_name]" value="%s" size="40" />',
				isset( $this->options['enquiry_from_name'] ) ? esc_attr( $this->options['enquiry_from_name']) : ''
				//esc_attr( $this->options['name'])
			);		
		}
		function add_enquiry_button_text(){
			printf(
				'<input type="text" id="ni_enquiry_button_text" name="ni_enquiry_option[ni_enquiry_button_text]" value="%s" size="40" />(change the enquiry button text like quotation, inquiry, enquiry etc)',
				isset( $this->options['ni_enquiry_button_text'] ) ? esc_attr( $this->options['ni_enquiry_button_text']) : 'Enquiry'
				
			);	
		}
		function enable_email_to_customer() {
			$html = '<input type="checkbox" id="enable_email_to_customer" name="ni_enquiry_option[enable_email_to_customer]" value="1"' . checked(isset( $this->options['enable_email_to_customer'] ), true, false) . '/>';
			$html .= '<label for="enable_email_to_customer">send an email enquiry form copy to customer </label>';
			echo $html;
	
		}
		function add_thank_you_message() {
			$us_partners_desc = $this->options;
			//print_r($this->options);
			//http://wp-kama.ru/filecode/wp-includes/class-wp-editor.php
			echo wp_editor( isset($us_partners_desc["ni_thank_you_message"])?stripslashes( $us_partners_desc["ni_thank_you_message"]):'', 'ni_thank_you_message', 
			array(
				'textarea_name' => 'ni_enquiry_option[ni_thank_you_message]',
			//	'textarea_rows' =>50,
			//	'editor_height' =>10 
				//'width' => 50
				) 
			 );
			//	die;
		}
		
		function print_section_info(){
    		print 'Enter your settings below:';
		}
		function sanitize( $input ){
			if( !is_numeric( $input['id_number'] ) )
				$input['id_number'] = '';  
		
			if( !empty( $input['title'] ) )
				$input['title'] = sanitize_text_field( $input['title'] );
				
			if( !empty( $input['color'] ) )
				$input['color'] = sanitize_text_field( $input['color'] );
			return $input;
		}
	}
}
?>