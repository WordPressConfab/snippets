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
*         
* Usage:      
*         1.  Paste the code into your functions.php file.
*         2.  
*/


add_action( 'genesis_meta', 'wpconfab_add_viewport_meta_tag' );
function wpconfab_add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/*
*
* Title: Post Limit Override
* Purpose: In wordpress, the user can set the maximum number of posts to view on any page
*		that uses the loop to display posts. This is nice for the user but can cause some 
*		unwanted effects when displaying some template pages. My example use case involves
* 		the author template page. My requirements were to display ALL the posts for a 
*		particular author, not limited by the max post option in wordpress. 
*
*		For more reading: http://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
*       
* Dependencies: 
*         1.  None 
*         
* Usage:      
*         1.  Paste the code into your functions.php file.
*         2.  Alter the if conditionals to match your requirements.
*/

// Function to override the set value of Post Limit in Wordpress
function theme_post_override ( $query ) {
	// Only act on author pages 
	if ( is_author() ) {
		// Display ALL posts
		$query->set( 'posts_per_page', -1 );
		return;
	}
	// Act on 'custom' post type when displaying archive of posts
	if ( is_post_type_archive(' custom' ) ) {
		// Display 10 posts
		$query->set( 'posts_per_page', 10 );
	}
}
add_action( 'pre_get_posts', 'theme_post_override', 1);


/*
*
*
* Title:		5.  Add a skip nav tag to Genesis themes
* Purpose:		Improves site accessibility by adding a like screen reader users can click on to skip directly to the content section of the page. 
*
* Dependencies: 
*         1.  The Genesis WordPress Framework
*         
* Usage:      
*         1.  Paste the code into your functions.php file.
*/


add_action( 'genesis_meta', 'wpconfab_add_skip_nav' );
function wpconfab_add_skip_nav() {
  echo '<a class="skipnav" href="#content">Skip to main content</a>';
}