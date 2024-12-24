<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = 'saasty_team_meta';

    //
    // Create a metabox
    CSF::createMetabox($prefix, array(
        'title'     => 'Team Options',
        'post_type' => 'team',
    ));



    //
    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'Team Designation',
        'fields' => array(

            array(
                'id'    => 'team_designation',
                'type'  => 'text',
                'title' => esc_html__('Designation', 'saasty'),
                'default' => esc_html__('Marketing Expert', 'saasty'),
            )



        )
    ));



    //
    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'Team Skill',
        'fields' => array(

            array(
                'id'    => 'team_skill_switcher',
                'type'  => 'switcher',
                'title' => esc_html__('Team Skill Switcher', 'saasty'),
            ),

            array(
                'id'     => 'team_skill_list',
                'type'   => 'repeater',
                'title'  => esc_html__('Team Skill List', 'saasty'),
                'dependency' => array('team_skill_switcher', '==', 'true'), // check for true/false by field id
                'fields' => array(

                    array(
                        'id'    => 'service_skill_name',
                        'type'  => 'text',
                        'title' => esc_html__('Skill Name', 'saasty'),
                    ),

                    array(
                        'id'    => 'service_skill_value',
                        'type'  => 'text',
                        'title' => esc_html__('Skill Value', 'saasty'),
                    ),

                ),
            ),

        )
    ));


    //
    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'Team Social',
        'fields' => array(

            array(
                'id'    => 'team_social_switcher',
                'type'  => 'switcher',
                'title' => esc_html__('Team Social Switcher', 'saasty'),
            ),

            array(
                'id'      => 'team_social_facebook_url',
                'type'    => 'text',
                'title'   => esc_html__('Facebook URL', 'saasty'),
                'default' => esc_html__('#', 'saasty'),
                'dependency' => array('team_social_switcher', '==', 'true'), // check for true/false by field id
            ),
            array(
                'id'      => 'team_social_twitter_url',
                'type'    => 'text',
                'title'   => esc_html__('Twitter URL', 'saasty'),
                'default' => esc_html__('#', 'saasty'),
                'dependency' => array('team_social_switcher', '==', 'true'), // check for true/false by field id
            ),
            array(
                'id'      => 'team_social_linkedin_url',
                'type'    => 'text',
                'title'   => esc_html__('Linkedin URL', 'saasty'),
                'default' => esc_html__('#', 'saasty'),
                'dependency' => array('team_social_switcher', '==', 'true'), // check for true/false by field id
            ),
            array(
                'id'      => 'team_social_instagram_url',
                'type'    => 'text',
                'title'   => esc_html__('Instagram URL', 'saasty'),
                'default' => esc_html__('#', 'saasty'),
                'dependency' => array('team_social_switcher', '==', 'true'), // check for true/false by field id
            ),




        )
    ));



    //
    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'Team Contact',
        'fields' => array(

            array(
                'id'    => 'team_contact_switcher',
                'type'  => 'switcher',
                'title' => esc_html__('Team Contact Switcher', 'saasty'),
            ),

            array(
                'id'      => 'team_contact_phone',
                'type'    => 'text',
                'title'   => esc_html__('Phone Number', 'saasty'),
                'default' => saasty_kses('(00) 875 784 5682', 'saasty'),
                'dependency' => array('team_contact_switcher', '==', 'true'), // check for true/false by field id
            ),
            array(
                'id'      => 'team_contact_email',
                'type'    => 'text',
                'title'   => esc_html__('Email Address', 'saasty'),
                'default' => esc_html__('info@saasty.com', 'saasty'),
                'dependency' => array('team_contact_switcher', '==', 'true'), // check for true/false by field id
            ),
            array(
                'id'      => 'team_contact_address',
                'type'    => 'text',
                'title'   => esc_html__('Address', 'saasty'),
                'default' => esc_html__('Hudson, Wisconsin(WI), 54016', 'saasty'),
                'dependency' => array('team_contact_switcher', '==', 'true'), // check for true/false by field id
            ),
            array(
                'id'      => 'team_contact_map',
                'type'    => 'text',
                'title'   => esc_html__('Address URL', 'saasty'),
                'default' => esc_html__('#', 'saasty'),
                'dependency' => array('team_contact_switcher', '==', 'true'), // check for true/false by field id
            ),

        )
    ));

    //
    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'Team Button',
        'fields' => array(

            array(
                'id'    => 'team_button_switcher',
                'type'  => 'switcher',
                'title' => esc_html__('Team Button Switcher', 'saasty'),
            ),

            array(
                'id'      => 'team_button_text',
                'type'    => 'text',
                'title'   => esc_html__('Button Text', 'saasty'),
                'default' => saasty_kses('Contact Us', 'saasty'),
                'dependency' => array('team_button_switcher', '==', 'true'), // check for true/false by field id
            ),
            array(
                'id'      => 'team_button_url',
                'type'    => 'text',
                'title'   => esc_html__('Button URL', 'saasty'),
                'default' => esc_html__('#', 'saasty'),
                'dependency' => array('team_button_switcher', '==', 'true'), // check for true/false by field id
            ),

        )
    ));



    //
    // Create a section
    CSF::createSection($prefix, array(
        'title'  => 'Team Carousel',
        'fields' => array(
            array(
                'id'    => 'team_carousel_switcher',
                'type'  => 'switcher',
                'title' => esc_html__('Team Carousel Switcher', 'saasty'),
            ),
            array(
                'id'      => 'team_carousel_title',
                'type'    => 'text',
                'title'   => esc_html__('Related Post Title', 'saasty'),
                'default' => esc_html__('Related Team', 'saasty'),
                'dependency' => array('team_carousel_switcher', '==', 'true'), // check for true/false by field id
            ),
        )
    ));




    // end section
}
