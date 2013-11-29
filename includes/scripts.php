<?php
//Register inview plugin from https://github.com/protonet/jquery.inview
wp_register_script( 'inview-plugin', plugin_dir_url( __FILE__ ) . 'js/jquery.inview.js', array ( 'jquery' ) );
wp_register_script( 'detailed_skillbar', plugin_dir_url( __FILE__ ) . 'js/detailed_skillbar.js', array ( 'jquery', 'inview-plugin' ), '1.0', true );
wp_enqueue_style('detailed_shortcode_styles', plugin_dir_url( __FILE__ ) . 'css/detailed_skillbar_styles');
?>
