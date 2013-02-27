snippets
========
This is a collection of useful pieces of WordPress code shared among the University of Texas WordPress community.  If you have some code you use a lot and think it might be helpful to others please clone the repository and make a pull request.

Use the template below for generally useful code and the second template for Genesis code.

General Template
================

```
/*
*
*  SNIPPET TEMPLATE (DELETE THIS LINE) 
*
* Title:
* Purpose:    
*       
* Dependencies: 
*         1.  
*         2.  
*         
* Usage:      
*         1.  Paste the code into your functions.php file.
*         2.  
*/

add_action ( '',  'wpconfab_' );

function wpconfab_() {

}
```

Genesis Template
================
```
/*
*
*  SNIPPET TEMPLATE (DELETE THIS LINE) 
*
* Title:      
* Dependencies: 
*         1.  The Genesis WordPress Framework
*         2.  
*         
* Usage:      
*         1.  Paste the code into your functions.php file.
*         2.  
*/

remove_action ( 'genesis_', 'genesis_' );
add_action ( 'genesis_',  'wpconfab_' );

function wpconfab_() {

}

```
