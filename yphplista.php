<?php
/* 
Plugin Name: yPHPlista
Plugin URI: 
Author URI: http://yonatanr.net
Version: 1.1.1
Author: Yonatan Reinberg
Description: Integrate PHPList signup with your wordpress theme with pretty AJAX (now widgetized!).  Dont forget to <a href="options-general.php?page=yPHPlista">set it up</a>.
 
Copyright 2011  Yonatan Reinberg (email : yoni [a t ] s o cia l-ink DOT net) - http://social-ink.net
*/

	//defaults for the options
		add_option('yphplista_url', 'http://');			
		add_option('yphplista_listname', 'enter list name');			
		add_option('yphplista_htmlemail', 'true');			
		add_option('yphplista_listnum', '1');			
		add_option('yphplista_subscribepage', '1');			
		add_option('yphplista_subscribetext', 'Sign up now!');			
		add_option('yphplista_headlinetext', 'Sign up for our newsletter:');			
	
	
	//options/admin stuff
	add_action('admin_menu', 'yphplista_add_menu');		//options page

		function yphplista_admin() {  
			 include('yphplista_admin.php');  
		 }  
		 
		function yphplista_add_menu() {  
		  add_options_page("yPHPlista", "yPHPlista", 'manage_options', "yPHPlista", "yphplista_admin");  
		}  

	//script inits

		function yphplista_enqueue_scripts() {
			$plugin_url = get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__));
			 wp_enqueue_script("jquery");
		}
		if (!is_admin()) {
			add_action('init', 'yphplista_enqueue_scripts');
		}	
		
	//shortcode hook
	add_action('wp_head', 'yphplista_jquery_header');			//header

	add_shortcode('yphplista', 'yphplista_output');				//add the shortcode for [yphplista]
	
	add_action("plugins_loaded", "yphplista_widget_init");		//widgetize
	
	
	//add widget support
		function yphplista_widgetize($args) {
		  echo 'yPHPLista';
		  echo yphplista_output();

		}
 
 
		function yphplista_widget_init()
		{
		  register_sidebar_widget(__('yPHPLista'), 'yphplista_widgetize');
		}



		function yphplista_jquery_header()
		{
			$plugin_url = get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__));
			
			echo "\n\n<!-- Beginning of scripting by yPHPlista by Yonatan Reinberg/Social Ink (c) 2010 - http://social-ink.net - yoni@social-ink.net -->\n\n";
			
			echo '<link href="' . $plugin_url . '/yphplista.css" rel="stylesheet" type="text/css" />' . "\n";	
				
			//start the script here
			
				$scriptoutput = "<script type=\"text/javascript\">\n";
				
				$scriptoutput .= "//<![CDATA[\n\n"; //cdata to validate XHTML
				
				$scriptoutput .= "var \$j_p = jQuery.noConflict();\n";
				
				$scriptoutput .= "\$j_p(function(){\n
								\n";
								
				//NEWSLETTER SIGNUP FORM SUBMISSION
				$scriptoutput .=  "\$j_p(\"#yphp_submit\").click(function(){

									//set the button up
									\$j_p('#yphp_submit').val('Submitting...');
									
									//Retrieve the contents of the textarea (the content)
									var signup_email = \$j_p(\"#yphp_email\").val();
									var signup_url = \$j_p(\"#yphp_subscribeurl\").val();
									var signup_listname = \$j_p(\"#yphp_listname\").val();
									var signup_listnum = \$j_p(\"#yphp_listnum\").val();
									var signup_htmlemail = \$j_p(\"#yphp_htmlemail\").val();
									var list_params = \"\";

									//Build the paramy of lists
									\$j_p('.yphp_multlists').each(function(index) {
										 list_params = list_params + \"&list[\" + \$j_p(this).val() + \"]=signup\";
									  }); 
									  
									
									//Build the URL that we will send
									var url_paramies = \"VerificationCodeX=&htmlemail=\" + signup_htmlemail + \"&listname=\" + signup_listname + \"&subscribe=subscribe&email=\" + escape(signup_email) + list_params;

									//Use jQuery's ajax function to send it
									 \$j_p.ajax({
									   type: \"POST\",
									   url: signup_url,
									   data: url_paramies,
									   success: function(){
											\$j_p(\"#yphp_newsletterform\").before(\$j_p(\"<p id='yphplista_success' class='yphplista_resultmsg'>Thanks for signing up for our newsletter, <i>\" + signup_email + \"</i>!  Please check your email to confirm your signup.</p>\").fadeIn(\"slow\"));
											\$j_p('.submission-elements').fadeOut(\"slow\");
									   },					   
									   error: function(){
											\$j_p(\"#yphp_newsletterform\").before(\$j_p(\"<p id='yphplista_failure' class='yphplista_resultmsg'>Sorry, we couldn't add your address.  Please try again or contact the system administrator, <i>\" + signup_email + \"</i>!  Please check your email to confirm your signup.</p>\").fadeIn(\"slow\"));
									   }
									 });

									//We return false so when the button is clicked, it doesn't follow the action
									return false;

								});";									
								
				$scriptoutput .= "});\n";	//close JQuery ouput
				
				$scriptoutput .= "	//]]>"; //close cdata to validate XHTML
				
				$scriptoutput .= "\n <!--\n	function yphp_clearDefault(myelement) {
											if (myelement.defaultValue==myelement.value) myelement.value = \"\";
										} 
										// -->";
				
				$scriptoutput .= "\n</script>";								
								
			echo $scriptoutput;
			
			echo "\n\n<!-- End of scripting by yPHPlista by Yonatan Reinberg/Social Ink (c) 2010 - http://social-ink.net - yoni@social-ink.net -->\n\n";
		}

		function yphplista($template_id=null,$listname=null,$listnum=null) {	//for function within the program
		
			if($template_id==null)	
				$template_id = get_option('yphplista_subscribepage');
				
			if($listname==null)	
				$listname = get_option('yphplista_listname');	

			if($listnum==null)	
				$listnum = get_option('yphplista_listnum');
			
			echo yphplista_output(array('template_id'=>$template_id,'listname'=>$listname,'listnum'=>$listnum));
		}
		
		function yphplista_output($atts=null) {
		
			extract(shortcode_atts(array(	//get the attributes if any
				'template_id' => get_option('yphplista_subscribepage'),
				'listname' => get_option('yphplista_listname'),
				'listnum' => get_option('yphplista_listnum'),
			), $atts)); 
			
			//construct the necessary variables
			$id_url = get_option('yphplista_url');
			$id_url .= "?p=subscribe&id=" . $template_id;
			$id_name = $listname;
			$id_number = explode(",", $listnum);
			
			//get email options
			$id_html = get_option('yphplista_htmlemail');
			if($id_html)
				$htmlemail = 1;
			else
				$htmlemail = 0;
				
			//get text options
			$caption_headline = get_option('yphplista_headlinetext');
			$caption_subscribe = get_option('yphplista_subscribetext');				
			
			$output = "<div id=\"yphplista_frame\">
							<h2 id=\"yphplista_title\">". $caption_headline . "</h2>
							
							<form method=\"post\" name=\"yphp_subscribeform\" id=\"yphp_newsletterform\" action=\"" . $id_url . "\" onsubmit=\"\">
								<input type=\"text\" name=\"email\" value=\"your email\" id=\"yphp_email\" class=\"submission-elements\" onfocus=\"yphp_clearDefault(this)\" />
								<input type=\"hidden\" name=\"htmlemail\" value=\"" . $htmlemail . "\" id=\"yphp_htmlemail\" />								
								<input type=\"hidden\" name=\"yphp_subscribeurl\" value=\"" . $id_url . "\" id=\"yphp_subscribeurl\" />";
								
								foreach($id_number as $onelist) {  //for support for multiple lists - potentially - maybe in version 1.2
									$output .=  	"<input type=\"hidden\" class=\"yphp_multlists\" id=\"yphp_listnum" . $onelist . "\" name=\"yphp_listnum" . $onelist . "\" value=\"" . $onelist . "\" />
													<input type=\"hidden\" id=\"yphp_subcommand_jshelp" . $onelist . "\" name=\"list[" . $onelist . "]\" value=\"signup\" /> <!--for JS degrading -->";
								}
								
			$output .= 			"<input type=\"hidden\" id=\"yphp_listname\" name=\"listname\" value=\"" . $id_name . "\" />
								<div style=\"display:none\"> <input type=\"text\" name=\"VerificationCodeX\" value=\"\" size=\"20\" /></div>								
								<input type=\"submit\" name=\"subscribe\" id=\"yphp_submit\" value=\"" . $caption_subscribe . "\" class=\"subscribe-button submission-elements\" />
							</form>
						</div>";
			
			return $output;

		 }	?>
