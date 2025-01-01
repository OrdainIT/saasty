<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = 'saasty_job_meta';

    //
    // Create a metabox
    CSF::createMetabox($prefix, array(
        'title'     => 'Job Options',
        'post_type' => 'job',
    ));



    CSF::createSection($prefix,
        array(
            'title'  => 'Job Type',
            'fields' => array(
                array(
                    'id'      => 'job_type',
                    'type'    => 'select',
                    'title'   => esc_html__('Job Type', 'saasty'),
                    'options' => array(
                        'Full Time' => 'Full Time',
                        'Part Time' => 'Part Time',
                        'Freelance' => 'Freelance',
                        'Internship' => 'Internship',
                        'Temporary' => 'Temporary',
                    ),
                ),

                array(
                    'id'      => 'job_location',
                    'type'    => 'text',
                    'title'   => esc_html__('Job Location', 'saasty'),
                    'default' => saasty_kses(' Opa Locka 33056', 'saasty'),
                ),

                array(
                    'id'      => 'job_apply_button_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Apply',
                        'saasty'
                    ),
                    'default' => saasty_kses('Apply Now', 'saasty'),
                ),
                array(
                    'id'      => 'job_apply_link',
                    'type'    => 'text',
                    'title'   => esc_html__('Apply Link', 'saasty'),
                    'default' => saasty_kses('#', 'saasty'),
                ),

                // contact us button

                array(
                    'id'      => 'job_contact_us_button_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Contact Us',
                        'saasty'
                    ),
                    'default' => saasty_kses('Contact Us', 'saasty'),
                ),

                array(
                    'id'      => 'job_contact_us_link',
                    'type'    => 'text',
                    'title'   => esc_html__('Contact Us Link', 'saasty'),
                    'default' => saasty_kses('#', 'saasty'),
                ),
                


            )

        )
    );

  

    //
    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'Job Slider',
        'fields' => array(

            array(
                'id'    => 'job_slider_switcher',
                'type'  => 'switcher',
                'title' => esc_html__('Job Slider Switcher', 'saasty'),
            ),

            array(
                'id'     => 'job_slider_list',
                'type'   => 'repeater',
                'title'  => 'Job Slider List',
                'dependency' => array('job_slider_switcher', '==', 'true'), // check for true/false by field id
                'fields' => array(

                    array(
                        'id'    => 'job_slider_image',
                        'type'  => 'gallery',
                        'title' => esc_html__('Slider Image', 'saasty'),
                    ),

                ),
            ),

        )
    ));

    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'Job CTA',
        'fields' => array(
            array(
                'id'      => 'job_cta_form_title',
                'type'    => 'text',
                'title'   => esc_html__('CTA Form Title', 'saasty'),
                'default' => saasty_kses('Ready to take plan? It’s just a <br> matter of one click', 'saasty'),
            ),
            array(
                'id'      => 'job_cta_form_tsub_itle',
                'type'    => 'text',
                'title'   => esc_html__('CTA Form Sub Title', 'saasty'),
                'default' => saasty_kses('Try it risk free — we don’t charge cancellation fees.', 'saasty'),
            ),
            array(
                'id'      => 'job_cta_form_bottom_text',
                'type'    => 'textarea',
                'title'   => esc_html__('CTA Form Bottom Text', 'saasty'),
                'default' => saasty_kses('  <a href="#">Already a member? </a>  <a href="#">Sign in.</a>', 'saasty'),
            ),

            array(
                'id'          => 'job_contact_form7',
                'type'        => 'select',
                'title'       => esc_html__('Contact Form 7', 'saasty'),
                'placeholder' => esc_html__('Select an option', 'saasty'),
                'options'     => od_get_contact_form_7(),
            ),


        )
    ));

 
}
