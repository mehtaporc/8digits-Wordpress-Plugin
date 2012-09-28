<?php
/*
Plugin Name: 8digits Plugin
Plugin URI: http://www.8digits.com/
Description: 8digits for wordpress plugin
Author: 8digits Monitoring Platform
Version: 1.0
*/
function trackingCodeFunction() {

echo '<script type="text/javascript">';
echo 'var _trackingCode =' ;
echo ' "';
echo get_option('tracking_code');
echo '"';
echo ';';
echo	'
(function() {
		var wa = document.createElement("script"); wa.type = "text/javascript"; wa.async = true;
		wa.src = ("https:" == document.location.protocol ? "https:// " : "http://") + "tr2-static.8digits.com/js/wm.js?"+ Math.random();
		var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(wa, s);
	})();

				</script>';
}
add_action('wp_footer', 'trackingCodeFunction');
function add_eightdigits_options()  
{  
    add_options_page('8digits Setting', '8digits Setting', 'manage_options', 'functions','eightdigits_setting');  
}  
add_action('admin_menu', 'add_eightdigits_options');
?>
<?php  
function eightdigits_setting()  
{  
?>  
    <div class="wrap">  
        <h2>8digits Setting</h2>  
        <form method="post" action="options.php" id="trackingCodeForm">  
            <?php wp_nonce_field('update-options') ?>  
            <p><strong>Tracking Code:</strong><br />  
                <input type="text" name="tracking_code" id="tracking_code" size="8" value="" maxlength="8" data-options="required:true"/>  
            </p> 
            <p><input type="submit" name="Submit" value="Save" /></p>  
            <input type="hidden" name="action" value="update" />  
            <input type="hidden" name="page_options" value="tracking_code" />  
            <p><strong>Your Tracking Code : <?php echo get_option('tracking_code'); ?></strong><br /> 
            <p>Don't have an 8digits tracking code? <a href="http://www.8digits.com/web/pricing/index" target="_blank">Click here </a>.</p>
        </form>  
    </div>  


    
<?php  
	
}  
?>
