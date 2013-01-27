<?php
/*
Plugin Name: My Wordpress Login Logo
Plugin URI: http://digitcodes.com
Description: My Wordpress Login Logo lets you to add a custom logo in your wordpress login page instead of the usual wordpress logo.
Version: 1.1
Author: Afsal Rahim
Author URI: http://afsalrahim.tk
*/

function DC_MyWP_login_logo() {
	$custom_logo_url = get_option('wp_custom_login_logo_url',plugins_url('images/mylogo.png', __FILE__));
	$custom_logo_height = get_option('wp_custom_login_logo_height','70');
	$custom_logo_width = get_option('wp_custom_login_logo_width','320');
	
    echo '<style type="text/css">
	.login h1 a { background-image:url('.$custom_logo_url.') !important; background-size:'.$custom_logo_width.'px '.$custom_logo_height .'px; height:'.$custom_logo_height .'px; width:'.$custom_logo_width.'px;}
	#login {width:'.$custom_logo_width.'px;}
    </style>';
}

function DC_MyWP_login_url() {
	$custom_login_url = get_option('wp_custom_login_url',home_url());
	return $custom_login_url;
}

function DC_MyWP_login_title() {
	$custom_login_title = get_option('wp_custom_login_title',get_bloginfo('description'));
	return $custom_login_title;
}

add_action('login_head', 'DC_MyWP_login_logo');
add_filter('login_headerurl', 'DC_MyWP_login_url');
add_filter("login_headertitle", 'DC_MyWP_login_title');


function DC_MyWP_login_logo_options() { 
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

	wp_register_style( 'DC_MyWP_login_logo_Styles', plugins_url('styles.css', __FILE__) );
	wp_enqueue_style( 'DC_MyWP_login_logo_Styles' );
	
	global $current_user;
    get_currentuserinfo();
	
	if($_POST['update_MyWP_login_logo'] == 'update') {
		$custom_logo_url = $_POST['wp_custom_login_logo_url'];
		update_option('wp_custom_login_logo_url', $custom_logo_url);
		$custom_logo_height = $_POST['wp_custom_login_logo_height'];
		update_option('wp_custom_login_logo_height', $custom_logo_height);
		$custom_logo_width = $_POST['wp_custom_login_logo_width'];
		update_option('wp_custom_login_logo_width', $custom_logo_width);
		$custom_login_title = $_POST['wp_custom_login_title'];
		update_option('wp_custom_login_title', $custom_login_title);
		$custom_login_url = $_POST['wp_custom_login_url'];
		update_option('wp_custom_login_url', $custom_login_url);

?>
		<div class="updated"><p><strong><?php _e('Login Page Logo Updated.' ); ?></strong></p></div>
<?php
	} else {
	$custom_logo_url = get_option('wp_custom_login_logo_url',plugins_url('images/mylogo.png', __FILE__));
	$custom_logo_height = get_option('wp_custom_login_logo_height','70');
	$custom_logo_width = get_option('wp_custom_login_logo_width','320');
	$custom_login_title = get_option('wp_custom_login_title',get_bloginfo('description'));
	$custom_login_url = get_option('wp_custom_login_url',home_url());
	}
?>
<div class="wrap columns-2 dd-wrap">
	<h2><img src="<?php echo plugins_url('images/plugin_header_logo.png', __FILE__); ?>" alt="My Wordpress Login Logo" /></h2>
	<p>by <strong>Afsal Rahim</strong> from <strong><a title="DigitCodes.com" href="http://digitcodes.com">digitcodes.com</a></strong></p>
			
	<div class="metabox-holder has-right-sidebar" id="poststuff">
			
		<div class="inner-sidebar" id="side-info-column">
					
			<div class="postbox">
			<div id="sidebar-subscribe-box"><div class="sidebar-subscribe-box-wrapper"><p>GET MORE FREE WP plugins &amp; wordpress tips &amp; Tricks. Subscribe to our Free newsletter!</p><div class="sidebar-subscribe-box-form">
								<form action="http://feedburner.google.com/fb/a/mailverify" class="sidebar-subscribe-box-form" method="post" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=digitcodes', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" target="popupwindow">
								<input type="hidden" name="uri" value="digitcodes" />
								<input type="hidden" name="loc" value="en_US" />
								<input placeholder="<?php echo  $current_user->user_email; ?>" value="<?php echo  $current_user->user_email; ?>" autocomplete="off" name="email" class="sidebar-subscribe-box-email-field" />
								<input type="submit" class="sidebar-subscribe-box-email-button" style="background:none repeat scroll 0 0 #0099FF;color:#fff;border:1px solid #007FFF;" title="" value="Subscribe Now!" /><br/> <br/>
								</form>
			</div></div></div>
			</div>

			<div class="postbox">
				<h3>Plugin Info</h3>
				<div class="inside">
					<p><b>My Wordpress Login Logo</b> lets you to add a custom logo in your wordpress login page instead of the usual wordpress logo.</p><p> It also allows you to specify the height and width of the logo. By adding your custom logo in your login page, you can make your website more proffesional and also impress the guest bloggers and other users who view these pages.</p>
					<p>I hope you enjoyed the plugin. Don't forget to rate us!</p>
					<h4>Please Like & Follow. :)</h4>
						<p><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FDigitcodes%2F214280698706689&amp;send=false&amp;layout=button_count&amp;width=180&amp;show_faces=false&amp;font=verdana&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=382980691790038" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:21px;" allowTransparency="true"></iframe> 
				
						<a href="https://twitter.com/afsalrahim" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @afsalrahim</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</p>

				</div>
			</div>				
			

			
			<div class="postbox">
				<div class="inside">
				<p class="description">
				For more help <a href="mailto:afsalrahimvnkt@gmail.com">email me</a>.
				</p>
				</div>
			</div>
			
		</div>	
			
			
		<div id="post-body">
		<div id="post-body-content">
		
				<div class="stuffbox">
				<h3>Your Current Login Page Logo</h3>
				<div class="inside">
				<p class="description"><img src="<?php echo $custom_logo_url; ?>" alt="" /></p> 
				</div>
				</div>
				
				
				<div class="stuffbox">
				<h3>Update or Change Logo</h3>
				<div class="inside">
				<form name="DC_MyWP_login_logo_form" method="post" action="">
				<input type="hidden" name="update_MyWP_login_logo" value="update">
				<p>Logo URL : <input type="text" name="wp_custom_login_logo_url" value="<?php echo $custom_logo_url; ?>" size="70"><br/>
				<span class="description">Example: <code>http://yoursite.com/wp-content/uploads/2013/01/logo.png</code></span></p>
				<p>Width: <input type="text" name="wp_custom_login_logo_width" value="<?php echo $custom_logo_width; ?>" size="5">px</p>
				<p>Height: <input type="text" name="wp_custom_login_logo_height" value="<?php echo $custom_logo_height; ?>" size="5">px</p>
				<br/>
				<p>Homepage Logo Link : <input type="text" name="wp_custom_login_url" value="<?php echo $custom_login_url; ?>" size="70"><br/>
				<span class="description">This is the url opened when clicked on the logo in your login page.</p>
				<p>Title : <input type="text" name="wp_custom_login_title" value="<?php echo $custom_login_title; ?>" size="40"></p>
				<input type="submit" class="button-primary" name="Submit" value="Update" />
				</form>
				</div>
				</div>
				
				
			<div class="postbox">
				<h3>Help & FAQ</h3>
				<div class="inside">
					<p><h4>Q1. How does it Works?</h4>
					[-] Upload your desired logo using the WordPress media uploader or  <a href="media-new.php">click here</a><br/>
					[-] Copy the uploaded image's File URL path and input it in the Logo URL field.<br/>
					[-] That's it! You can now logout and check your <code>yousite.com/wp-admin/</code> page to see the changes.
					</p>
					<p><h4>Q2. How to change the logo size?</h4>
					Simply input your desired logo height and width in the given fields to change the displayed logo size.</p>
					<p><h4>Q3. What is the recommened logo size?</h4>
					Less than or equal to 320px width and 70px height is the recommended logo size for your Wordpress Login Page.</p>
				</div>
			</div>		
			
		</div>
		</div>

</div>
<?php
 }

function DC_MyWP_login_logo_actions() {  
	add_options_page('My Wordpress Login Logo Options', 'My Wordpress Login Logo', 'manage_options', 'DC_MyWP_login_logo_options', 'DC_MyWP_login_logo_options');  
}  

add_action('admin_menu', 'DC_MyWP_login_logo_actions');  
?>