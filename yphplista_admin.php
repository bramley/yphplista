<? /*
	yPHPlista, v1.1.1
	yonatan reinberg, 2010-11. 
	yoni@social-ink.net
	http://social-ink.net
	if you like this plugin please visit our site and donate or hire us do some work for you!
	
	This software is licensed under the <a href="http://creativecommons.org/licenses/GPL/2.0/">CC-GNU GPL</a> version 2.0 or later,.
	
	yonatan reinberg or social ink are in no way responsible for any damage, software vulnerability, data issues or technical problems arising from this software
	
	I ask that you keep my name here if you modify the program.

*/ ?>

<?php 
	if($_POST['yphplist_sent'] == 'Y') {
		//This is after they entered settings. So lets save them.

		$id_url = $_POST['id_url'];
		update_option('yphplista_url', $id_url);	

		$id_name = $_POST['id_name'];
		update_option('yphplista_listname', $id_name);				
		
		$id_num = $_POST['id_num'];
		update_option('yphplista_listnum', $id_num);				
		
		$id_htmlemail = $_POST['id_htmlemail'];
		update_option('yphplista_htmlemail', $id_htmlemail);		
		
		$id_subscribe = $_POST['id_subscribe'];
		update_option('yphplista_subscribepage', $id_subscribe);				
		
		$caption_subscribe = $_POST['caption_subscribe'];
		update_option('yphplista_subscribetext', $caption_subscribe);			
		
		$caption_headline = $_POST['caption_headline'];
		update_option('yphplista_headlinetext', $caption_headline);	


		?>
		
		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		
<?php
	} else {
		//list options
		$id_url = get_option('yphplista_url');
		$id_name = get_option('yphplista_listname');
		$id_num = get_option('yphplista_listnum');
		$id_subscribe = get_option('yphplista_subscribepage');
		$id_htmlemail = get_option('yphplista_htmlemail');
		$caption_headline = get_option('yphplista_headlinetext');
		$caption_subscribe = get_option('yphplista_subscribetext');
	
	}

	?>

<div class="wrap">
	<h2>yPHPlista by yonatan reinberg</h2>
		
	<div class="postbox-container" style="width:60%; margin-right:5%; " >
		<div class="metabox-holder">
			<div id="jq_effects" class="postbox">
				<div class="handlediv" title="Click to toggle"><br /></div>

				<h3><a class="togbox">+</a> yPHPlista options</h3>
				
				<div class="inside"  style="padding:10px;">
					<form name="yphplista_options" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
					
						<table class="form-table">
						
							<input type="hidden" name="yphplist_sent" value="Y">
							
									<h4>PHPList details</h4>		
									<p>full url: <input type="text" name="id_url" value="<?php echo $id_url; ?>" size="50"> (root directory of phplist, with trailing / - ex: http://mycompany.org/list/)</p>
									<p>default list name: <input type="text" name="id_name" value="<?php echo $id_name; ?>" size="20"> (find this under your "list of lists")</p>
									<p>default list number: <input type="text" name="id_num" value="<?php echo $id_num; ?>" size="3"> (find this under your "list of lists")</p>
									<p>default subscribe page id: <input type="text" name="id_subscribe" value="<?php echo $id_subscribe; ?>" size="3"> (find this under your "subscribe pages")</p>

									<h4>Ensure these are set on your chosen subscribe page:</h4>
										<em>&raquo;&nbsp;&nbsp;Don't offer choice, default to HTML</em> should be checked<br />
										<em>&raquo;&nbsp;&nbsp;Don't display email confirmation</em> should be checked<br />
									<br />
									<h4>List options</h4>
									html email default <input type="checkbox" name="id_htmlemail" id="id_htmlemail" value="true" <?php if ($id_htmlemail) { echo 'checked=checked'; } ?> />
									
									<h4>Display/content</h4>
									<p>Headline: <input type="text" name="caption_headline" value="<?php echo $caption_headline; ?>" size="50"> (ex: "Sign up for our newsletter!")</p>
									<p>button caption: <input type="text" name="caption_subscribe" value="<?php echo $caption_subscribe; ?>" size="20"> (ex: "hit submit and go")</p>				
									
									<hr />
					
									<p class="submit">
									<input type="submit" class="button-primary" name="Submit" value="<?php _e('Update Options', 'yphplist_trdom' ) ?>" />
									</p>
									
									
					
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<div class="postbox-container" style="width:20%;">
		<div class="metabox-holder">	
			<div class="meta-box-sortables">
				<div id="yPHPLista-what" class="postbox">
					<div class="handlediv" title="Click to toggle"><br /></div>
					<h3 class="hndle"><span>what it is</span></h3>
					<div class="inside" style="padding:10px;">
						<p>written by yonatan reinberg 2010/11 - v1.1</p>
						<p>to use after setting up, go into your post/page and add shortcode [yphplista] wherever you want the phplist subscribe box to appear. <strong>new:</strong>if your theme is widget-enabled, you can add it under <a href="widgets.php">widgets menu</a>.</p>
						<p>any questions, comments, loves, hates or if you want to go for a bike ride, visit social ink at <a href="http://social-ink.net">social-ink.net</a></p>
						<hr />
						<? $beer_url = get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__)) . '/images/icon_beer.gif'; ?>
						<p><img src="<? echo $beer_url ?>" style="float:left;margin-right:15px;margin-bottom:15px;" />did this plugin really help you out? <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=accounts@social-ink.net&currency_code=&amount=&return=&item_name=Buy+Me+A+Beer+Social+Ink+donation">buy me a beer (suggested $5)!</a></p>
					</div>
				</div>				
				
				<div id="yPHPLista-weirdness" class="postbox">
					<div class="handlediv" title="Click to toggle"><br /></div>
					<h3 class="hndle"><span>weirdness?</span></h3>
					<div class="inside" style="padding:10px;">
						<p><i>HALP</i>: where do i find these settings?  the URL should have the root directory where you installed phpLIST. no biggy. the listname is the one you have setup (you need to do that first).  you also need to create a subscribe page from the phplist backend, (click "subscribe pages" on your admin sidebar). click "view page" and try subscribing from there to make sure everything is working well...</p>
						<p>advanced: To use an alternate subscribe "page" use the shortcode with temple_id, like [yphplista template_id=3].  To use an alternate list use the shortcode with listname AND listnum, like [yphplista linstame="secondlist" listnum=3]. </p>
						<p>HALP: my email isn't signing up but I'm getting a success box! that success/failure box on the frontend is what the script receives from the server; it may report a false positive initially, so make sure to test it a few times to make sure emails are going into the appropriate list, etc. (note AJAX and WP only work on the same server for security reasons)</p>			
						<p>other questions: visit <a href="http://www.social-ink.net/blog/yphplista-an-ajax-wordpress-plugin-for-phplist-integration">plugin page and ask</a>!</p>
					</div>
				</div>
						
			</div>

		</div>
	</div>
	
 </div>