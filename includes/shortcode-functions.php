<?php

/**
 * This file has all the main shortcode functions
 * @package Detailed Skillbar Plugin
 * @since 1.1
 * @author Martin DENIZET : http://martin-denizet.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://martin-denizet.com
 * @License: GNU General Public License version 2.0
 * @License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @credit AJ Clarke : http://sympleplorer.com
 * Based on Symple Shortcodes Plugin from AJ Clarke : http://sympleplorer.com
 */

/*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');


/*
 * Skillbar
 * @since v1.0
 */
if (!function_exists('detailed_skillbar_shortcode')) {

    function detailed_skillbar_shortcode($atts, $content = NULL) {
        extract(shortcode_atts(array(
            'title' => '',
            'percentage' => '100',
            'color' => '#6adcfa',
            'class' => '',
            'animate' => 'inview',
            'show_percent' => 'true'
                        ), $atts));

        $has_content = false;
        if ($content != NULL && !empty($content)) {
            $has_content = true;
            $class .= ' detailed-skillbar-toggle-trigger';
        }
        
        
        if ($animate == 'inview'){
            //Use the inview plugin to start the skillbar animation
            $class .= ' detailed-skillbar-inview-anim';
        }else{
            //Use the document.ready event to  start the skillbar animation
            $class .= ' detailed-skillbar-documentready-anim';
        }

        // Enque scripts
        wp_enqueue_script('inview-plugin');
        wp_enqueue_script('detailed_skillbar');
        

        // Display the skillbar
        $output = '<div class="detailed-skillbar">';
        $output .= '<div class="detailed-skillbar-header ' . $class . '" data-percent="' . $percentage . '%">';
        if ($title !== '')
            $output .= '<div class="detailed-skillbar-title" style="background: ' . $color . ';"><span>' . $title . '</span></div>';
        $output .= '<div class="detailed-skillbar-bar" style="background: ' . $color . ';"></div>';
        if ($show_percent == 'true') {
            $output .= '<div class="detailed-skill-bar-percent">' . $percentage . '%</div>';
        }
        $output .= '</div>';
        //Add the details
        if ($has_content) {
            $output .= '<div class="detailed-skillbar-container">' . do_shortcode($content) . '</div>';
        }
        $output .= '</div>';

        return $output;
    }

    add_shortcode('detailed_skillbar', 'detailed_skillbar_shortcode');
}

