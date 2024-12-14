<?php
//include All metabox here

// Page Metabox
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_page_settings',
        'title' => 'Page Settings',
        'fields' => array(
            array(
                'key' => 'field_hide_breadcrumb',
                'label' => 'Hide Breadcrumb',
                'name' => 'hide_breadcrumb',
                'type' => 'true_false',
                'instructions' => 'Is Invisible Breadcrumb',
                'required' => 0,
                'ui' => 1,
                'wrapper' => array(
                    'width' => '25', // Set width to 50%
                    'class' => '',
                    'id' => '',
                ),
            ),
            array(
                'key' => 'field_breadcrumb_bg',
                'label' => 'Breadcrumb BG',
                'name' => 'breadcrumb_bg',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'wrapper' => array(
                    'width' => '25', // Set width to 50%
                    'class' => '',
                    'id' => '',
                ),
            ),
            array(
                'key' => 'field_header_logo',
                'label' => 'Header Logo',
                'name' => 'header_logo_page',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'wrapper' => array(
                    'width' => '25', // Set width to 50%
                    'class' => '',
                    'id' => '',
                ),
            ),
            array(
                'key' => 'field_header_style',
                'label' => 'Header Style',
                'name' => 'header_style',
                'type' => 'select',
                'ui' => 1,
                'choices' => array(
                    'header-style-11' => 'Header Style 1',
                    'header-style-22' => 'Header Style 2',
                ),
                'default_value' => 'header-style-11',
                'wrapper' => array(
                    'width' => '25', // Set width to 50%
                    'class' => '',
                    'id' => '',
                ),
            ),
            // Default Footer
            array(
                'key' => 'field_footer_style',
                'label' => 'Footer Style',
                'name' => 'footer_style',
                'type' => 'select',
                'ui' => 1,
                'choices' => array(
                    'footer-style-1' => 'Footer Style 1',
                    'footer-style-2' => 'Footer Style 2',
                ),
                'default_value' => 'footer-style-1',
                'wrapper' => array(
                    'width' => '25', // Set width to 50%
                    'class' => '',
                    'id' => '',
                ),
            ),
            // Footer Tabs


            //  array(
            //         'key' => 'saasty_field_footer_tab',
            //         'label' => 'Select Footer Type',
            //         'name' => 'mccsa_footer_type',
            //         'type' => 'radio',
            //         'choices' => array(
            //             'basic' => 'Basic Footer',
            //             'elementor' => 'Elementor Footer',
            //         ),
            //         'layout' => 'horizontal',
            //         'default_value' => 'basic', // Default to Basic Footer
            //         'wrapper' => array(
            //             'width' => '50',
            //             'class' => '',
            //             'id' => '',
            //         ),
            //     ),



            // // Basic Header

            //  array(
            //         'key' => 'saasty_field_basic_footer',
            //         'label' => 'Basic Footer',
            //         'name' => 'saasty_basic_footer',
            //         'type' => 'group',
            //         'conditional_logic' => array(
            //             array(
            //                 array(
            //                     'field' => 'saasty_field_footer_tab',
            //                     'operator' => '==',
            //                     'value' => 'basic',
            //                 ),
            //             ),
            //         ),
            //         'sub_fields' => array(
            //             array(
            //                 'key' => 'field_footer_style',
            //                 'label' => 'Footer Style',
            //                 'name' => 'footer_style',
            //                 'type' => 'select',
            //                 'ui' => 1,
            //                 'choices' => array(
            //                     'footer-style-1' => 'Footer Style 1',
            //                     'footer-style-2' => 'Footer Style 2',
            //                     'footer-style-3' => 'Footer Style 3',
            //                     'footer-style-4' => 'Footer Style 4',
            //                     'footer-style-5' => 'Footer Style 5',
            //                 ),
            //                 'default_value' => 'footer-style-1',
            //                 'wrapper' => array(
            //                     'width' => '50',
            //                     'class' => '',
            //                     'id' => '',
            //                 ),
            //             ),
            //         ),
            //     ),


            // //Elemetor Footer


            //  array(
            //         'key' => 'saasty_field_elementor_footer',
            //         'label' => 'Elementor Footer',
            //         'name' => 'saasty_elementor_footer',
            //         'type' => 'group',
            //         'conditional_logic' => array(
            //             array(
            //                 array(
            //                     'field' => 'saasty_field_footer_tab',
            //                     'operator' => '==',
            //                     'value' => 'elementor',
            //                 ),
            //             ),
            //         ),
            //         'sub_fields' => array(
            //             array(
            //                 'key' => 'saasty_field_select_elementor_header_footer_post',
            //                 'label' => 'Select  Footer',
            //                 'name' => 'select_header_footer_post_footer',
            //                 'type' => 'post_object',
            //                 'post_type' => array('elementor_library'), // Your custom post type
            //                 'return_format' => 'id',
            //                 'multiple' => 0,
            //                 'wrapper' => array(
            //                     'width' => '50',
            //                     'class' => '',
            //                     'id' => '',
            //                 ),
            //             ),
            //         ),
            //     ),



            // // End Footer

            // array(
            //     'key' => 'field_footer_style',
            //     'label' => 'Footer Style',
            //     'name' => 'footer_style',
            //     'type' => 'select',
            //     'ui' => 1,
            //     'choices' => array(
            //         'footer-style-1' => 'Footer Style 1',
            //         'footer-style-2' => 'Footer Style 2',
            //         'footer-style-3' => 'Footer Style 3',
            //         'footer-style-4' => 'Footer Style 4',
            //         'footer-style-5' => 'Footer Style 5',
            //     ),
            //     'default_value' => 'style1',
            //     'wrapper' => array(
            //         'width' => '25', // Set width to 50%
            //         'class' => '',
            //         'id' => '',
            //     ),
            // ),

            array(
                'key' => 'field_select_menu',
                'label' => 'Select Menu',
                'name' => 'select_menu',
                'type' => 'select',
                'ui' => 1,
                'choices' => array(), // This will be populated dynamically
                'return_format' => 'value',
                'wrapper' => array(
                    'width' => '25', // Set width to 50%
                    'class' => '',
                    'id' => '',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),

            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

endif;

// Dynamically populate the Select Menu field with available menus
add_filter('acf/load_field/key=field_select_menu', 'acf_load_menu_choices');
function acf_load_menu_choices($field)
{
    $menus = wp_get_nav_menus();
    $field['choices'] = array('' => 'Select Menu');
    foreach ($menus as $menu) {
        $field['choices'][$menu->slug] = $menu->name;
    }
    return $field;
}

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_post_format_settings',
        'title' => 'Post Format Settings',
        'fields' => array(
            array(
                'key' => 'field_format_link',
                'label' => 'Format Link',
                'name' => 'format_link',
                'type' => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
                array(
                    'param' => 'post_format',
                    'operator' => '!=',
                    'value' => 'standard',
                ),
                array(
                    'param' => 'post_format',
                    'operator' => '!=',
                    'value' => 'image',
                ),
                array(
                    'param' => 'post_format',
                    'operator' => '!=',
                    'value' => 'gallery',
                ),
                array(
                    'param' => 'post_format',
                    'operator' => '!=',
                    'value' => 'quote',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;

// New field group for gallery post format
if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_post_format_gallery',
        'title' => 'Gallery Post Format',
        'fields' => array(
            array(
                'key' => 'field_gallery_images',
                'label' => 'Gallery Images',
                'name' => 'gallery_images',
                'type' => 'gallery',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'insert' => 'append',
                'library' => 'all',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
                array(
                    'param' => 'post_format',
                    'operator' => '==',
                    'value' => 'gallery',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;
