<?php

//
// Add options pages to admin menu
//

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page('Theme Options');
  acf_add_options_page('Link Sets');
  acf_add_options_page('Contact');

}
