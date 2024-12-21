<?php

/**
 * saasty customizer
 *
 * @package saasty
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


add_action(
    'init',
    function () {

        if (class_exists('kirki')) {

            /**
             * Added Panels & Sections
             */

            //Add panel
            new \Kirki\Panel(
                'saasty_customizer',
                [
                    'priority'    => 10,
                    'title'       => esc_html__('Travello Customizer', 'saasty'),
                ]
            );

            /**
             * Customizer Section
             */
            //=========== General Settings ================ //
            new \Kirki\Section(
                'saasty_general_settngs',
                [
                    'title'       => esc_html__('General Settings', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );



            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'saasty_preloader',
                    'label'       => esc_html__('Preloader On/Off', 'saasty'),
                    'section'     => 'saasty_general_settngs',
                    'default'     => 'off',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );

            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'saasty_backtotop',
                    'label'       => esc_html__('Back To Top On/Off', 'saasty'),
                    'section'     => 'saasty_general_settngs',
                    'default'     => 'off',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );










            //=========== Theme Typography ================ //
            new \Kirki\Section(
                'saasty_typography',
                [
                    'title'       => esc_html__('Theme Typography', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );

            new \Kirki\Field\Typography(
                [
                    'settings'    => 'saasty_typography_setting',
                    'label'       => esc_html__('Body Typography', 'saasty'),
                    'description' => esc_html__('The full set of options.', 'saasty'),
                    'section'     => 'saasty_typography',
                    'priority'    => 10,
                    'transport'   => 'auto',
                    'default'     => [
                        'font-family'     => 'Plus Jakarta Sans',
                        'variant'      => '400',
                        'color'           => '#5f6168',
                        'font-size'       => '16px',
                        'line-height'     => '1.2',
                    ],
                ]
            );



            new \Kirki\Field\Typography(
                [
                    'settings'    => 'saasty_typography_h1',
                    'label'       => esc_html__('H1 Typography', 'saasty'),
                    'description' => esc_html__('The full set of options.', 'saasty'),
                    'section'     => 'saasty_typography',
                    'priority'    => 10,
                    'transport'   => 'auto',
                    'default'     => [
                        'font-family'     => 'Barlow Condensed',
                        'variant'         => 'regular',
                        'font-weight'      => '700',
                        'color'           => '#00102f',
                        'font-size'       => '40px',
                        'line-height'     => '1.2',
                    ],
                ]
            );

            new \Kirki\Field\Typography(
                [
                    'settings'    => 'saasty_typography_h2',
                    'label'       => esc_html__('H2 Typography', 'saasty'),
                    'description' => esc_html__('The full set of options.', 'saasty'),
                    'section'     => 'saasty_typography',
                    'priority'    => 10,
                    'transport'   => 'auto',
                    'default'     => [
                        'font-family'     => 'Barlow Condensed',
                        'variant'         => 'regular',
                        'font-weight'      => '700',
                        'color'           => '#00102f',
                        'font-size'       => '32px',
                        'line-height'     => '1.2',
                    ],
                ]
            );

            new \Kirki\Field\Typography(
                [
                    'settings'    => 'saasty_typography_h3',
                    'label'       => esc_html__('H3 Typography', 'saasty'),
                    'description' => esc_html__('The full set of options.', 'saasty'),
                    'section'     => 'saasty_typography',
                    'priority'    => 10,
                    'transport'   => 'auto',
                    'default'     => [
                        'font-family'     => 'Barlow Condensed',
                        'variant'         => 'regular',
                        'font-weight'      => '700',
                        'color'           => '#00102f',
                        'font-size'       => '28px',
                        'line-height'     => '1.2',
                    ],
                ]
            );
            new \Kirki\Field\Typography(
                [
                    'settings'    => 'saasty_typography_h4',
                    'label'       => esc_html__('H4 Typography', 'saasty'),
                    'description' => esc_html__('The full set of options.', 'saasty'),
                    'section'     => 'saasty_typography',
                    'priority'    => 10,
                    'transport'   => 'auto',
                    'default'     => [
                        'font-family'     => 'Barlow Condensed',
                        'variant'         => 'regular',
                        'font-weight'      => '700',
                        'color'           => '#00102f',
                        'font-size'       => '24px',
                        'line-height'     => '1.2',
                    ],
                ]
            );
            new \Kirki\Field\Typography(
                [
                    'settings'    => 'saasty_typography_h5',
                    'label'       => esc_html__('H5 Typography', 'saasty'),
                    'description' => esc_html__('The full set of options.', 'saasty'),
                    'section'     => 'saasty_typography',
                    'priority'    => 10,
                    'transport'   => 'auto',
                    'default'     => [
                        'font-family'     => 'Barlow Condensed',
                        'variant'         => 'regular',
                        'font-weight'      => '700',
                        'color'           => '#00102f',
                        'font-size'       => '20px',
                        'line-height'     => '1.2',
                    ],
                ]
            );
            new \Kirki\Field\Typography(
                [
                    'settings'    => 'saasty_typography_h6',
                    'label'       => esc_html__('H6 Typography', 'saasty'),
                    'description' => esc_html__('The full set of options.', 'saasty'),
                    'section'     => 'saasty_typography',
                    'priority'    => 10,
                    'transport'   => 'auto',
                    'default'     => [
                        'font-family'     => 'Barlow Condensed',
                        'variant'         => '700',
                        'font-wight'      => '700',
                        'color'           => '#00102f',
                        'font-size'       => '16px',
                        'line-height'     => '1.2',
                    ],
                ]
            );

            //=========== Theme Color ================ //
            new \Kirki\Section(
                'saasty_theme_color',
                [
                    'title'       => esc_html__('Theme Color', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );
            new \Kirki\Field\Color(
                [
                    'settings'    => 'saasty_theme_pcolor',
                    'label'       => __('Theme Color 1', 'saasty'),
                    'section'     => 'saasty_theme_color',
                    'priority'    => 10,
                    'transport'   => 'auto',
                    'default'     => '#7771F7',
                    'output'      => [
                        [
                            'element'  => ':root',
                            'property' => '--it-theme-1',
                        ],
                    ],
                ]
            );
            new \Kirki\Field\Color(
                [
                    'settings'    => 'saasty_theme_scolor',
                    'label'       => __('Theme Color 2', 'saasty'),
                    'section'     => 'saasty_theme_color',
                    'priority'    => 10,
                    'default'     => '#189C84',
                    'transport'   => 'auto',
                    'output'      => [
                        [
                            'element'  => ':root',
                            'property' => '--it-theme-2',
                        ],
                    ],
                ]
            );
            new \Kirki\Field\Color(
                [
                    'settings'    => 'saasty_secoundary_scolor',
                    'label'       => __('Theme Color 3', 'saasty'),
                    'section'     => 'saasty_theme_color',
                    'priority'    => 10,
                    'default'     => '#085442',
                    'transport'   => 'auto',
                    'output'      => [
                        [
                            'element'  => ':root',
                            'property' => '--it-theme-3',
                        ],
                    ],
                ]
            );
            new \Kirki\Field\Color(
                [
                    'settings'    => 'saasty_secoundary_scolor1',
                    'label'       => __('Theme Color 4', 'saasty'),
                    'section'     => 'saasty_theme_color',
                    'priority'    => 10,
                    'default'     => '#1fe290',
                    'transport'   => 'auto',
                    'output'      => [
                        [
                            'element'  => ':root',
                            'property' => '--it-theme-4',
                        ],
                    ],
                ]
            );
            new \Kirki\Field\Color(
                [
                    'settings'    => 'saasty_secoundary_scolor2',
                    'label'       => __('Theme Color 5', 'saasty'),
                    'section'     => 'saasty_theme_color',
                    'priority'    => 10,
                    'default'     => '#3b37f4',
                    'transport'   => 'auto',
                    'output'      => [
                        [
                            'element'  => ':root',
                            'property' => '--it-theme-5',
                        ],
                    ],
                ]
            );
            new \Kirki\Field\Color(
                [
                    'settings'    => 'saasty_secoundary_scolor3',
                    'label'       => __('Theme Color 6', 'saasty'),
                    'section'     => 'saasty_theme_color',
                    'priority'    => 10,
                    'default'     => '#746fff',
                    'transport'   => 'auto',
                    'output'      => [
                        [
                            'element'  => ':root',
                            'property' => '--it-theme-6',
                        ],
                    ],
                ]
            );








            //=========== Header Top Info Settings ================ //
            new \Kirki\Section(
                'header_top_setting',
                [
                    'title'       => esc_html__('Header Top Info Setting', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );

            // Header Top Switch

            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'header_top_switcher',
                    'label'       => esc_html__('Topbar Switcher', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'section'     => 'header_top_setting',
                    'default'     => 'off',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'header_top_phone_number',
                    'label'    => esc_html__('Phone Number', 'saasty'),
                    'section'  => 'header_top_setting',
                    'default'  => esc_html__('(00)8757845682', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'header_top_email_id',
                    'label'    => esc_html__('Email Addres', 'saasty'),
                    'section'  => 'header_top_setting',
                    'default'  => esc_html__('info@saasty.com', 'saasty'),
                    'priority' => 10,
                ]
            );


            new \Kirki\Field\Text(
                [
                    'settings' => 'header_top_Address',
                    'label'    => esc_html__('Address', 'saasty'),
                    'section'  => 'header_top_setting',
                    'default'  => esc_html__('Moon ave, New York, 2020 NY US', 'saasty'),
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'header_top_Address_url',
                    'label'    => esc_html__('Address URL', 'saasty'),
                    'section'  => 'header_top_setting',
                    'default'  => esc_html__('https://goo.gl/maps/qzqY2PAcQwUz1BYN9', 'saasty'),
                    'priority' => 10,
                ]
            );







            //=========== Header Socials ================ //

            new \Kirki\Section(
                'saasty_header_socials',
                [
                    'title'       => esc_html__('Header Top Socials Settings', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );

            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'header_social_switcher',
                    'label'       => esc_html__('Header Social Swithcer', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'section'     => 'saasty_header_socials',
                    'default'     => 'off',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'header_social_facebook_url',
                    'label'    => esc_html__('Facebook URL', 'saasty'),
                    'section'  => 'saasty_header_socials',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'header_social_instagram_url',
                    'label'    => esc_html__('Instagram URL', 'saasty'),
                    'section'  => 'saasty_header_socials',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'header_social_twitter_url',
                    'label'    => esc_html__('Twitter URL', 'saasty'),
                    'section'  => 'saasty_header_socials',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'header_social_linkedin_url',
                    'label'    => esc_html__('LinkedIn URL', 'saasty'),
                    'section'  => 'saasty_header_socials',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );

            //=========== Header Right ================ //

            new \Kirki\Section(
                'saasty_header_right_settings',
                [
                    'title'       => esc_html__('Header Right Settings', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );


            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'header_right_switcher',
                    'label'       => esc_html__('Header Right Swithcer', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'section'     => 'saasty_header_right_settings',
                    'default'     => 'off',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );


            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'header_right_btn_switcher',
                    'label'       => esc_html__('Button Switcher', 'saasty'),
                    'section'     => 'saasty_header_right_settings',
                    'default'     => 'off',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'header_right_btn_text',
                    'label'    => esc_html__('Button Text', 'saasty'),
                    'section'  => 'saasty_header_right_settings',
                    'default'  => esc_html__('Get Started', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\URL(
                [
                    'settings' => 'header_right_btn_url',
                    'label'    => esc_html__('Button URL', 'saasty'),
                    'section'  => 'saasty_header_right_settings',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'header_right_btn_login_switcher',
                    'label'       => esc_html__('Login BTN Switcher', 'saasty'),
                    'section'     => 'saasty_header_right_settings',
                    'default'     => 'off',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'header_right_login_btn_text',
                    'label'    => esc_html__('Login Text', 'saasty'),
                    'section'  => 'saasty_header_right_settings',
                    'default'  => esc_html__('Log In', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\URL(
                [
                    'settings' => 'header_right_login_btn_url',
                    'label'    => esc_html__('Log In URL', 'saasty'),
                    'section'  => 'saasty_header_right_settings',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'header_right_search_icon_switcher',
                    'label'       => esc_html__('Search Icon Switcher', 'saasty'),
                    'section'     => 'saasty_header_right_settings',
                    'default'     => 'off',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );
            new \Kirki\Field\Image(
                [
                    'settings'    => 'header_right_search_logo',
                    'label'       => esc_html__('Search Form Logo', 'saasty'),
                    'section'     => 'saasty_header_right_settings',
                ]
            );

            // Header Logo & Style Settings
            new \Kirki\Section(
                'saasty_header_logo',
                [
                    'title'       => esc_html__('Header Settings', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );

            new \Kirki\Field\Radio_Image(
                [
                    'settings'    => 'saasty_header_style',
                    'label'       => esc_html__('Select Header Style', 'saasty'),
                    'section'     => 'saasty_header_logo',
                    'default'     => 'header-style-11',
                    'priority'    => 10,
                    'multiple'    => 1,
                    'choices'     => [
                        'header-style-11'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
                        'header-style-22' => get_template_directory_uri() . '/inc/img/header/header-2.png',
                    ],
                ]
            );

            //Header Logo
            new \Kirki\Field\Image(
                [
                    'settings'    => 'header_logo',
                    'label'       => esc_html__('Header Logo', 'saasty'),
                    'description' => esc_html__('Upload Your Logo Here', 'saasty'),
                    'section'     => 'saasty_header_logo',
                    'default'     => get_template_directory_uri() . '/assets/img/logo/logo-1.png',
                ]
            );



            // Header Logo & Style Settings
            new \Kirki\Section(
                'saasty_header_side_info',
                [
                    'title'       => esc_html__('Header Side Info', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );

            //Header Logo
            new \Kirki\Field\Image(
                [
                    'settings'    => 'header_side_logo',
                    'label'       => esc_html__('Header Side Info Logo', 'saasty'),
                    'description' => esc_html__('Upload Your Logo Here', 'saasty'),
                    'section'     => 'saasty_header_side_info',
                    'default'     => get_template_directory_uri() . '/assets/img/logo/logo-2.png',
                ]
            );




            new \Kirki\Field\Text(
                [
                    'settings' => 'side_info_title',
                    'label'    => esc_html__('Title', 'saasty'),
                    'section'  => 'saasty_header_side_info',
                    'default'  => esc_html__('Get In Touch', 'saasty'),
                    'priority' => 10,
                ]
            );





            new \Kirki\Field\Text(
                [
                    'settings' => 'side_info_phone',
                    'label'    => esc_html__('Phone', 'saasty'),
                    'section'  => 'saasty_header_side_info',
                    'default'  => esc_html__('(00)45611227890', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'side_info_location',
                    'label'    => esc_html__('Address', 'saasty'),
                    'section'  => 'saasty_header_side_info',
                    'default'  => esc_html__('238, Arimantab, Moska - USA.', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Url(
                [
                    'settings' => 'side_info_location_url',
                    'label'    => esc_html__('Address URL', 'saasty'),
                    'section'  => 'saasty_header_side_info',
                    'default'  => esc_html__('htits://www.google.com/maps/@37.4801311,22.8928877,3z', 'saasty'),
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'side_info_social_switcher',
                    'label'       => esc_html__('Social Icon Show/Hide', 'saasty'),
                    'section'     => 'saasty_header_side_info',
                    'default'     => 'on',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'side_info_twitter_url',
                    'label'    => esc_html__('Twitter URL', 'saasty'),
                    'section'  => 'saasty_header_side_info',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'side_info_instagram_url',
                    'label'    => esc_html__('Instagram URL', 'saasty'),
                    'section'  => 'saasty_header_side_info',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'side_info_facebook_url',
                    'label'    => esc_html__('Facebook URL', 'saasty'),
                    'section'  => 'saasty_header_side_info',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'side_info_dribbble_url',
                    'label'    => esc_html__('Dribbble URL', 'saasty'),
                    'section'  => 'saasty_header_side_info',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );

            // BreadCrumb Settings
            new \Kirki\Section(
                'saasty_breadcrumb_settings',
                [
                    'title'       => esc_html__('Breadcrumb Settings', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );

            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'breadcrumb_switcher',
                    'label'       => esc_html__('Breadcrumb On/Off', 'saasty'),
                    'section'     => 'saasty_breadcrumb_settings',
                    'default'     => 'on',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );

            new \Kirki\Field\Image(
                [
                    'settings'    => 'breadcrumb_image',
                    'label'       => esc_html__('Breadcrumb BG Image', 'saasty'),
                    'description' => esc_html__('Upload Breadcrumb Image', 'saasty'),
                    'section'     => 'saasty_breadcrumb_settings',
                    'default'      => get_template_directory_uri() . '/assets/img/breadcrumb/breadcrumb-bg.jpg',
                ]
            );

            new \Kirki\Field\Image(
                [
                    'settings'    => 'breadcrumb_thumb_shap',
                    'label'       => esc_html__('Breadcrumb Thumbnail', 'saasty'),
                    'description' => esc_html__('Upload Thumbnail Image', 'saasty'),
                    'section'     => 'saasty_breadcrumb_settings',
                    'default'      => get_template_directory_uri() . '/assets/img/breadcrumb/thumb-1.png',
                ]
            );



            //Blog Settings
            new \Kirki\Section(
                'saasty_404_settings',
                [
                    'title'       => esc_html__('404 Settings', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );

            new \Kirki\Field\Image(
                [
                    'settings'    => '_image_404_setup',
                    'label'       => esc_html__('Upload 404 Image', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'section'     => 'saasty_404_settings',
                    'default'     => get_template_directory_uri() . '/assets/img/inner-page/error/thumb-1.png',
                ]
            );

            new \Kirki\Field\Textarea(
                [
                    'settings' => 'saasty_error_desc',
                    'label'    => esc_html__('Title Two', 'saasty'),
                    'section'  => 'saasty_404_settings',
                    'default'  => saasty_kses('It looks like nothing was found at this location. Maybe try one of the <br>  links below or a search?.', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'saasty_error_link_text',
                    'label'    => esc_html__('Button Text', 'saasty'),
                    'section'  => 'saasty_404_settings',
                    'default'  => esc_html__('Back to Home', 'saasty'),
                    'priority' => 10,
                ]
            );

            //Blog Settings
            new \Kirki\Section(
                'saasty_blog_settings',
                [
                    'title'       => esc_html__('Blog Settings', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );
            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'saasty_blog_author_switch',
                    'label'       => esc_html__('Blog Author Meta On/Off', 'saasty'),
                    'section'     => 'saasty_blog_settings',
                    'default'     => 'on',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );
            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'saasty_blog_date_switch',
                    'label'       => esc_html__('Blog Date Meta On/Off', 'saasty'),
                    'section'     => 'saasty_blog_settings',
                    'default'     => 'on',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'saasty_blog_btn',
                    'label'    => esc_html__('Button Text', 'saasty'),
                    'section'  => 'saasty_blog_settings',
                    'default'  => esc_html__('Read More', 'saasty'),
                    'priority' => 10,
                ]
            );


            new \Kirki\Field\Radio_Image(
                [
                    'settings'    => 'saasty_bolg_style',
                    'label'       => esc_html__('Select Blog Style', 'saasty'),
                    'section'     => 'saasty_blog_settings',
                    'default'     => 'blog-style-1',
                    'priority'    => 10,
                    'multiple'    => 1,
                    'choices'     => [
                        'blog-style-1'   => get_template_directory_uri() . '/inc/img/blog/blog_style_1.png',
                        'blog-style-2' => get_template_directory_uri() . '/inc/img/blog/blog_style_2.png',
                    ],
                ]
            );


            //Events Settings
            new \Kirki\Section(
                'saasty_event_settings',
                [
                    'title'       => esc_html__('Event Settings', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );

            new \Kirki\Field\Select(
                [
                    'settings'    => 'saasty_event_style',
                    'label'       => esc_html__('Select Event Style', 'saasty'),
                    'section'     => 'saasty_event_settings',
                    'default'     => 'style-1',
                    'choices'     => [
                        'style-1' => esc_html__('style 1', 'saasty'),
                        'style-2' => esc_html__('style 2', 'saasty'),
                    ],
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'saasty_event_post_per_page',
                    'label'    => esc_html__('Post Per Page', 'saasty'),
                    'default'     => esc_html__('6', 'saasty'),
                    'section'  => 'saasty_event_settings',
                    'priority' => 10,
                ]
            );












            // Footer Settings
            new \Kirki\Section(
                'saasty_footer_settings',
                [
                    'title'       => esc_html__('Footer Settings', 'saasty'),
                    'description' => esc_html__('', 'saasty'),
                    'panel'       => 'saasty_customizer',
                    'priority'    => 10,
                ]
            );


            new \Kirki\Field\Select(
                [
                    'settings'    => 'saasty_default_footer',
                    'label'       => esc_html__('Select Footer Style', 'saasty'),
                    'section'     => 'saasty_footer_settings',
                    'default'     => 'footer-style-1',
                    'placeholder' => esc_html__('Select a Footer Style', 'saasty'),
                    'choices'     => [
                        'footer-style-1' => esc_html__('Footer Style 1', 'saasty'),
                        'footer-style-2' => esc_html__('Footer Style 2', 'saasty'),
                        'footer-style-3' => esc_html__('Footer Style 3', 'saasty'),
                        'footer-style-4' => esc_html__('Footer Style 4', 'saasty'),
                        'footer-style-5' => esc_html__('Footer Style 5', 'saasty'),
                        'footer-style-6' => esc_html__('Footer Style 6', 'saasty'),
                        'footer-style-7' => esc_html__('Footer Style 7', 'saasty'),
                        'footer-style-8' => esc_html__('Footer Style 8', 'saasty'),
                        'footer-style-9' => esc_html__('Footer Style 9', 'saasty'),
                    ],
                ]
            );




            new \Kirki\Field\Image(
                [
                    'settings'    => 'saasty_footer_bg_image',
                    'label'       => esc_html__('Footer Background Image', 'saasty'),
                    'description' => esc_html__('Upload Background Image.', 'saasty'),
                    'section'     => 'saasty_footer_settings',
                    'default'      => "",
                ]
            );

            new \Kirki\Field\Image(
                [
                    'settings'    => 'saasty_footer_5_shap',
                    'label'       => esc_html__('Footer 5 Shap', 'saasty'),
                    'description' => esc_html__('Upload Shap Image.', 'saasty'),
                    'section'     => 'saasty_footer_settings',
                    'default'      => get_template_directory_uri() . '/assets/img/shape/footer-7-1.png',
                ]
            );

            new \Kirki\Field\Image(
                [
                    'settings'    => 'saasty_footer_7_shap',
                    'label'       => esc_html__('Footer 7 Shap', 'saasty'),
                    'description' => esc_html__('Upload Shap Image.', 'saasty'),
                    'section'     => 'saasty_footer_settings',
                    'default'      => get_template_directory_uri() . '/assets/img/shape/footer-shape-9-1.png',
                ]
            );









            new \Kirki\Field\Textarea(
                [
                    'settings' => 'footer_copywrite_text',
                    'label'    => esc_html__('Footer Copywrite Text', 'saasty'),
                    'section'  => 'saasty_footer_settings',
                    'default'  => saasty_kses('Copyright © 2024 <span><a href="/">Saasty</a></span> . All Rights Reserved Created by <span><a href="#">Ordianit</a></span>', 'saasty'),
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'saasty_footer_social_switcher',
                    'label'       => esc_html__('Footer Right Area Show/Hide', 'saasty'),
                    'section'     => 'saasty_footer_settings',
                    'default'     => 'on',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );
            new \Kirki\Field\Textarea(
                [
                    'settings' => 'footer__bottom_right_text',
                    'label'    => esc_html__('Footer Bottom Right Text', 'saasty'),
                    'section'  => 'saasty_footer_settings',
                    'default'  => saasty_kses('Social media', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Textarea(
                [
                    'settings' => 'footer__bottom_right_three_text',
                    'label'    => esc_html__('Footer Bottom Right Text', 'saasty'),
                    'description' => esc_html__('Only For Footer Style 2'),
                    'section'  => 'saasty_footer_settings',
                    'default'  => saasty_kses(' <div class="it-copyright-link">
                              <a class="border-line-black" href="#">Privacy & Terms.</a>
                              <a class="border-line-black" href="#">Contact Us</a>
                           </div>', 'saasty'),
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'saasty_footer_facebook_url',
                    'label'    => esc_html__('Facebook URL', 'saasty'),
                    'section'  => 'saasty_footer_settings',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'saasty_footer_twitter_url',
                    'label'    => esc_html__('Twitter URL', 'saasty'),
                    'section'  => 'saasty_footer_settings',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'saasty_footer_instagram_url',
                    'label'    => esc_html__('Instagram URL', 'saasty'),
                    'section'  => 'saasty_footer_settings',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );
            new \Kirki\Field\Text(
                [
                    'settings' => 'saasty_footer_youtube_url',
                    'label'    => esc_html__('Youtube URL', 'saasty'),
                    'section'  => 'saasty_footer_settings',
                    'default'  => esc_html__('#', 'saasty'),
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\Image(
                [
                    'settings'    => 'saasty_footer_1_bg_image',
                    'label'       => esc_html__('Footer  BG Image', 'saasty'),
                    'description' => esc_html__('The saved value will be the URL.', 'saasty'),
                    'section'     => 'saasty_footer_settings',
                    'default'     => '',
                ]
            );







            new \Kirki\Field\Checkbox_Switch(
                [
                    'settings'    => 'footer_style_two_switcher',
                    'label'       => esc_html__('Footer Style 2 On/Off', 'saasty'),
                    'section'     => 'saasty_footer_settings',
                    'default'     => 'off',
                    'choices'     => [
                        'on'  => esc_html__('Enable', 'saasty'),
                        'off' => esc_html__('Disable', 'saasty'),
                    ],
                ]
            );
        };

        new \Kirki\Field\Checkbox_Switch(
            [
                'settings'    => 'footer_style_three_switcher',
                'label'       => esc_html__('Footer Style 3 On/Off', 'saasty'),
                'section'     => 'saasty_footer_settings',
                'default'     => 'off',
                'choices'     => [
                    'on'  => esc_html__('Enable', 'saasty'),
                    'off' => esc_html__('Disable', 'saasty'),
                ],
            ]
        );
        new \Kirki\Field\Checkbox_Switch(
            [
                'settings'    => 'footer_style_four_switcher',
                'label'       => esc_html__('Footer Style 4 On/Off', 'saasty'),
                'section'     => 'saasty_footer_settings',
                'default'     => 'off',
                'choices'     => [
                    'on'  => esc_html__('Enable', 'saasty'),
                    'off' => esc_html__('Disable', 'saasty'),
                ],
            ]
        );
        new \Kirki\Field\Checkbox_Switch(
            [
                'settings'    => 'footer_style_five_switcher',
                'label'       => esc_html__('Footer Style 5 On/Off', 'saasty'),
                'section'     => 'saasty_footer_settings',
                'default'     => 'off',
                'choices'     => [
                    'on'  => esc_html__('Enable', 'saasty'),
                    'off' => esc_html__('Disable', 'saasty'),
                ],
            ]
        );
        new \Kirki\Field\Checkbox_Switch(
            [
                'settings'    => 'footer_style_six_switcher',
                'label'       => esc_html__('Footer Style 6 On/Off', 'saasty'),
                'section'     => 'saasty_footer_settings',
                'default'     => 'off',
                'choices'     => [
                    'on'  => esc_html__('Enable', 'saasty'),
                    'off' => esc_html__('Disable', 'saasty'),
                ],
            ]
        );
        new \Kirki\Field\Checkbox_Switch(
            [
                'settings'    => 'footer_style_seven_switcher',
                'label'       => esc_html__('Footer Style 7 On/Off', 'saasty'),
                'section'     => 'saasty_footer_settings',
                'default'     => 'off',
                'choices'     => [
                    'on'  => esc_html__('Enable', 'saasty'),
                    'off' => esc_html__('Disable', 'saasty'),
                ],
            ]
        );
        new \Kirki\Field\Checkbox_Switch(
            [
                'settings'    => 'footer_style_eight_switcher',
                'label'       => esc_html__('Footer Style 8 On/Off', 'saasty'),
                'section'     => 'saasty_footer_settings',
                'default'     => 'off',
                'choices'     => [
                    'on'  => esc_html__('Enable', 'saasty'),
                    'off' => esc_html__('Disable', 'saasty'),
                ],
            ]
        );
        new \Kirki\Field\Checkbox_Switch(
            [
                'settings'    => 'footer_style_nine_switcher',
                'label'       => esc_html__('Footer Style 9 On/Off', 'saasty'),
                'section'     => 'saasty_footer_settings',
                'default'     => 'off',
                'choices'     => [
                    'on'  => esc_html__('Enable', 'saasty'),
                    'off' => esc_html__('Disable', 'saasty'),
                ],
            ]
        );




        if (class_exists('WooCommerce')) {
            new \Kirki\Section(
                'od_woocommerce_section',
                [
                    'title'       => esc_html__('Mcssa Woocommerce Option', 'saasty'),
                    'description' => esc_html__('Mcssa Woocommerce Option', 'saasty'),
                    'panel'       => 'woocommerce',
                    'priority'    => 160,
                ]
            );

            new \Kirki\Field\Select(
                [
                    'settings'    => 'saasty_shop_style',
                    'label'       => esc_html__('Select Shop page Layout', 'saasty'),
                    'section'     => 'od_woocommerce_section',
                    'default'     => 'style-1',
                    'placeholder' => esc_html__('Choose an option', 'saasty'),
                    'choices'     => [
                        'style-1' => esc_html__('Shop Full Width', 'saasty'),
                        'style-2' => esc_html__('Shop Sidebar', 'saasty'),
                    ],
                ]
            );
            new \Kirki\Field\Select(
                [
                    'settings'    => 'saasty_shop_style_product',
                    'label'       => esc_html__('Select Product Layout', 'saasty'),
                    'section'     => 'od_woocommerce_section',
                    'default'     => 'layout-1',
                    'placeholder' => esc_html__('Choose an option', 'saasty'),
                    'choices'     => [
                        'layout-1' => esc_html__('Layout 1', 'saasty'),
                        'layout-2' => esc_html__('Layout 2', 'saasty'),
                    ],
                ]
            );
        }
    }
);
