<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = 'saasty_service_meta';
    $prefix_side = 'saasty_service_meta_side';

    //
    // Create a metabox
    CSF::createMetabox($prefix, array(
        'title'     => 'Service Options',
        'post_type' => 'service',
    ));

    //
    // Create a metabox
    CSF::createMetabox($prefix_side, array(
        'title'     => 'Service Thumbnail',
        'post_type' => 'service',
        'context'   => 'side',
    ));

    //
    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'Service Slider',
        'fields' => array(

            array(
                'id'    => 'service_slider_switcher',
                'type'  => 'switcher',
                'title' => esc_html__('Service Slider Switcher', 'saasty'),
            ),

            array(
                'id'     => 'service_slider_list',
                'type'   => 'repeater',
                'title'  => 'Service Slider List',
                'dependency' => array('service_slider_switcher', '==', 'true'), // check for true/false by field id
                'fields' => array(

                    array(
                        'id'    => 'service_slider_image',
                        'type'  => 'gallery',
                        'title' => esc_html__('Slider Image', 'saasty'),
                    ),

                ),
            ),

        )
    ));

    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'Service CTA',
        'fields' => array(
            array(
                'id'      => 'service_cta_form_title',
                'type'    => 'text',
                'title'   => esc_html__('CTA Form Title', 'saasty'),
                'default' => saasty_kses('Ready to take plan? It’s just a <br> matter of one click', 'saasty'),
            ),
            array(
                'id'      => 'service_cta_form_tsub_itle',
                'type'    => 'text',
                'title'   => esc_html__('CTA Form Sub Title', 'saasty'),
                'default' => saasty_kses('Try it risk free — we don’t charge cancellation fees.', 'saasty'),
            ),
            array(
                'id'      => 'service_cta_form_bottom_text',
                'type'    => 'textarea',
                'title'   => esc_html__('CTA Form Bottom Text', 'saasty'),
                'default' => saasty_kses('  <a href="#">Already a member? </a>  <a href="#">Sign in.</a>', 'saasty'),
            ),

            array(
                'id'          => 'service_contact_form7',
                'type'        => 'select',
                'title'       => esc_html__('Contact Form 7', 'saasty'),
                'placeholder' => esc_html__('Select an option', 'saasty'),
                'options'     => od_get_contact_form_7(),
            ),


        )
    ));

    // Create a section
    CSF::createSection($prefix_side, array(

        'fields' => array(

            array(
                'id'    => 'service_thumbnail_image',
                'type'  => 'media',
                'title' => esc_html__('Thumbnail Image', 'saasty'),
            ),





        )
    ));
}
