<?php
/*
 * Theme Metabox Options
 * @package saasty
 * @since 1.4.0
 * */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {
    $prefix = 'saasty_product';

    /*-------------------------------------
		saasty Event Options
	-------------------------------------*/
    CSF::createMetabox($prefix . '_product_options', array(
        'title' => esc_html__('Product Badge', 'saasty'),
        'post_type' => array('product'),
        'context'   => 'side',
    ));

    CSF::createSection($prefix . '_product_options', array(
        'fields' => array(
            array(
                'id'      => 'product_badge_label_switcher',
                'type'    => 'switcher',
                'title'   => 'Switcher',
                'label'   => 'Do you want activate it ?',
                'default' => true
            ),

            array(
                'id'      => 'product_badge_label_text',
                'type'    => 'text',
                'title'   => esc_html__('Product Badge', 'saasty'),
                'default' => 'New'
            ),



        )
    ));
}
