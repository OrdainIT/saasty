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
        'title'  => 'Team Skill',
        'fields' => array(

            array(
                'id'    => 'service_skill_switcher',
                'type'  => 'switcher',
                'title' => esc_html__('Team Skill Switcher', 'saasty'),
            ),

            array(
                'id'     => 'service_skill_list',
                'type'   => 'repeater',
                'title'  => esc_html__('Team Skill List', 'saasty'),
                'dependency' => array('service_slider_switcher', '==', 'true'), // check for true/false by field id
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
                'id'    => 'service_social_switcher',
                'type'  => 'switcher',
                'title' => esc_html__('Team Social Switcher', 'saasty'),
            ),



        )
    ));



    // end section
}
