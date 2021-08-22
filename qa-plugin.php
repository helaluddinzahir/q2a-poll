<?php
        
/*              
        Plugin Name: blog
        Plugin URI: https://github.com/helaluddinzahir/q2a-blog
        Plugin Update Check URI: https://raw.github.com/helaluddinzahir/q2a-blog/master/qa-plugin.php
        Plugin Description: write a blog post
        Plugin Version: 2.3
        Plugin Date: 2021-08-22
        Plugin Author: helal Uddin zahir
        Plugin Author URI: https://tollashi.net/user/Helaluddinzahir             
        Plugin License: GPLv2                           
        Plugin Minimum Question2Answer Version: 1.5
*/                      
                        
                        
    if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
                    header('Location: ../../');
                    exit;   
    }               

    qa_register_plugin_module('module', 'qa-blog-admin.php', 'qa_blog_admin', 'blog Admin');
    qa_register_plugin_module('event', 'qa-blog-check.php', 'qa_blog_event', 'blog Admin');
    qa_register_plugin_module('page', 'qa-blog-page.php', 'qa_blog_page', 'blog page');
    
    qa_register_plugin_layer('qa-blog-layer.php', 'blog Layer');
                    
    if(function_exists('qa_register_plugin_phrases')) {
        qa_register_plugin_overrides('qa-blog-overrides.php');
        qa_register_plugin_phrases('qa-blog-lang-*.php', 'blogs');
    } 

	if(!function_exists('qa_permit_check')) {
		function qa_permit_check($opt) {
			if(qa_opt($opt) == QA_PERMIT_POINTS)
				return qa_get_logged_in_points() >= qa_opt($opt.'_points');
			return !qa_permit_value_error(qa_opt($opt), qa_get_logged_in_userid(), qa_get_logged_in_level(), qa_get_logged_in_flags());
		}
	}	

/*                              
        Omit PHP closing tag to help avoid accidental output
*/                              
                          

