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
    $prefix = 'saasty_events';

    /*-------------------------------------
		saasty Event Options
	-------------------------------------*/
    CSF::createMetabox($prefix . '_expolore_options', array(
        'title' => esc_html__('Event Explore Content', 'saasty'),
        'post_type' => array('events'),
    ));

    CSF::createSection($prefix . '_expolore_options', array(
        'fields' => array(
            array(
                'id'      => 'event_expolore_title',
                'type'    => 'text',
                'title'   => esc_html__('Explore Title', 'saasty'),
                'default' => 'Explored.'
            ),

            array(
                'id'       => 'event_expolore_content',
                'type'     => 'wp_editor',
                'title'    => esc_html__('Explore Conent', 'saasty'),
                'sanitize' => false,
            ),
            array(
                'id'    => 'event_expolore_content_img',
                'type'  => 'media',
                'title'    => esc_html__('Image', 'saasty'),
            ),

        )
    ));

    CSF::createMetabox($prefix . '_extra_meta_options', array(
        'title' => esc_html__('Event Options', 'saasty'),
        'post_type' => array('events'),
    ));


    CSF::createSection($prefix . '_extra_meta_options', array(
        'fields' => array(
            array(
                'id'      => 'event_date_switcher',
                'type'    => 'switcher',
                'title'   => esc_html__('Date Switcher', 'saasty'),
                'label'   => 'Do you want Hide it ?',
                'default' => true
            ),


            array(
                'id'      => 'event_date_title',
                'type'    => 'text',
                'title'   => esc_html__('Event Date Title', 'saasty'),
                'default' => esc_html__('Event Date', 'saasty')
            ),

            array(
                'id'       => 'event_date',
                'type'     => 'text',
                'title'    => esc_html__('Event Date', 'saasty'),
                'default' => esc_html__('13 August, 2023', 'saasty')
            ),
            array(
                'id'       => 'event_time',
                'type'     => 'text',
                'title'    => esc_html__('Event Time', 'saasty'),
                'default' => esc_html__('09:00 - 11:00 AM', 'saasty')
            ),
            array(
                'id'      => 'event_location_switcher',
                'type'    => 'switcher',
                'title'   => esc_html__('Location Switcher', 'saasty'),
                'label'   => 'Do you want Hide it ?',
                'default' => true
            ),
            array(
                'id'      => 'event_location_title',
                'type'    => 'text',
                'title'   => esc_html__('Event Location Title', 'saasty'),
                'default' => esc_html__('Event Location', 'saasty')
            ),
            array(
                'id'      => 'event_location',
                'type'    => 'text',
                'title'   => esc_html__('Event Location Title', 'saasty'),
                'default' => esc_html__('14947 Romines Mill RoadDallas, TX 75204', 'saasty')
            ),
            array(
                'id'      => 'event_button_text',
                'type'    => 'text',
                'title'   => esc_html__('Button Text', 'saasty'),
                'default' => esc_html__('Join Event', 'saasty')
            ),
            array(
                'id'      => 'event_button_url',
                'type'    => 'text',
                'title'   => esc_html__('Button URL', 'saasty'),
                'default' => esc_html__('http://example.com', 'saasty')
            ),

        )
    ));
}
