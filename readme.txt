=== yPHPlista ===
Contributors: yonisink
Donate link: http://www.social-ink.net/donating-to-social-ink
Tags: phplist, newsletter, subscription, ajax, mailing list
Requires at least: 2.9
Tested up to: 3.0.5
Stable Tag: 1.1.1

yPHPlista integrates your PHPList install with beautiful AJAX.

== Description ==

yPHPlista is a new plugin I wrote because I was unsatisfied with current ones integrating phplist with wordpress. this plugin does it best, and it does it with style. both ajax ("same page") signup and gracefully degrading JS so your users can visit their normal subscription page.

For more information visit http://social-ink.net or http://www.social-ink.net/blog/yphplista-an-ajax-wordpress-plugin-for-phplist-integration

Please note, as with every plugin or theme modification, you should do a backup of your files beforehand.  Although we've tested this across many installs, we are not responsible for anything it does to your system and do not guarantee support.

== Installation ==

1. Upload `yphplista` directory to your  '/wp-content/plugins/' directory
2. Activate the yPHPlista plugin through the 'Plugins' page in WordPress
3. Set it up with your PHPlist settings.
4. Add a new page or post to your wordpress and type in the [yphplista] shortcode wherever you want the signup box to appear.
5. NEW: you can now add yPHPLista as a widget if your theme is widgetized through your backend.
6. NEW: if you're keen on editing your theme, use the function <? yphplista() ?> alone (for use with default backend options) or <? echo yphplista(template id,list name,string with comma delimited list numbers) ?> (eg <? echo yphplista(1,'hello','4,5') ?>)
6. That's all - yPHPlista will take care of the rest.

== Frequently Asked Questions ==

= Can I choose different names, ids, subscribe pages? =

Now you can: To use an alternate subscribe "page" use the shortcode with temple_id, like [yphplista template_id=3].  To use an alternate list use the shortcode with listname AND listnum, like [yphplista linstame="secondlist" listnum=3].  To use as a function, use <? echo yphplista(template id,list name,string with comma delimited list numbers) ?> (eg <? echo yphplista(1,'hello','4,5') ?>)

= What about validation/authorization/spam prevention =

At the current time yPHPLista does not validate email addresses, nor does it employ any spam prevention techniques like reCAPTCHA, etc.  If you need this functionality, be in touch for personalized support.  note: PHPList has some built in validation (eg it won't accept .ocm domains for example) but again that's not part of the plugin.

= It's not working! =

Wow, that's broad.  Have you correctly set up <a href="http://www.phplist.com/">PHPList</a>, created a list, and a subscribe page?  All of these things are NOT under the purview of this plugin; basically make sure everything's running well on that side before you attempt to use this.  

= I have PHPList setup but it's still not working! =

Have you created a subscribe page, and entered the correct settings in the plugin settings page?  Remember, each subscribe page has an "id" (the default is 1) and we need to make sure they're created in order to use this plugin.  

Also note two major caveats: WP doesn't allow you to use AJAX cross-server; that is, you can't have your wp install at "http://mywp.com" and your newsletter at "http://mynews.com/newsletter" and expect it to work flawlessly. this is for security reasons. also note that if there are two instances of phplist on the same page, one MIGHT fail (not sure), so make sure to triple test multiple loops or queries. this is because phplist requires certain naming conventions for its form elements that sometimes won't interact perfectly with jquery...

= But seriously, it isn't working, even if i get a green successful box... =

That green box (success) and red box (failure) can report false results.  Try disabling javascript on your browser and navigating to your page, and subscribing. Does it take you to the "subscribe" page that you set up through phplist? if so, the problem is with the plugin and i'd love if you commented in the <a href="http://www.phplist.com/">plugin homepage</a>.  if it doesnt work, then you entered your settings incorrectly or have set up phplist incorrectly.

= Can I change how things look? =

Certainly. CSS is your best friend. everything is id'd and class'd

== Screenshots ==

1. yCyclista options page.

== Changelog ==

= 1.1.1 =
* Added backend function

= 1.1 =
* Added multiple list support, widgetization, and fixed some minor bugs

= 1.0 =
* First version released.

== Upgrade Notice ==

= 1.1.1 = 
* As always upgrade at your own risk, but all should work well!

= 1.0 =
* Nothing to see here, folks.
