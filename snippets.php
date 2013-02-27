<?php
/* 
* 
* Code Usage Instructions:
*
* 1.  This code all assumes that it will be used on WordPress. Any other dependencies should be explicitly stated.  
* 2.  Each cluster of code below is intended to be used independantly of the other code listed.  Any dependencies (external or internal) are noted in the comments above the particular functions.
* 3.  In some cases external, user-specified files (such as images) are required for the function to work properly.  In those cases I have noted that in the comments.
* 4.  Each function name has been prefixed with "wpconfab_" those letters are used by WordPress developers to informally namespace their functions.  In most cases you will want to change them to match the prefix used within your theme.
* 

Table of Contents
1.  Replace default favicon with a theme-specific favicon
2.  Add Viewport meta tag for mobile browsers (general)
3.  Add Viewport meta tag for mobile browsers (Genesis)  


*/

/*
* 
* Title:		1.  Replace default favicon with a theme-specific favicon
* Purpose:    
*
* Dependencies:	
*				1.	The Genesis framework.
*				2.  Requires a favicon with the title favicon.ico to be stored in the images folder of your theme.
*
* Usage:			
*				1.  Paste the code into your functions.php file.
*				2.  Create a favicon.ico file and save it in your theme's "images" folder.  (You can save it elsewhere if you wish, but then you will need to update the value of the href in the function.)  
*/

remove_action ( 'genesis_meta', 'genesis_load_favicon' );
add_action ( 'genesis_meta',  'wpconfab_load_favicon' );

function wpconfab_load_favicon() {
	?>
		<link rel="Shortcut Icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
	<?php
}

/*
*
*
* Title:		2.  Add Viewport meta tag for mobile browsers (general)
* Purpose:		Makes responsive websites possible by enabling viewport width detection  
*
* Dependencies: 
*         1.  none 
*         
* Usage:      
*         1.  Paste the code into your functions.php file.
*         2.  
*/


add_action( 'wp_head', 'wpconfab_add_viewport_meta_tag' );
function wpconfab_add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/*
*
*
* Title:		3.  Add Viewport meta tag for mobile browsers (Genesis)
* Purpose:		Makes responsive websites possible by enabling viewport width detection  
*
* Dependencies: 
*         1.  The Genesis WordPress Framework
*         2.  
*         
* Usage:      
*         1.  Paste the code into your functions.php file.
*         2.  
*/


add_action( 'genesis_meta', 'wpconfab_add_viewport_meta_tag' );
function wpconfab_add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}