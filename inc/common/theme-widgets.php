<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saasty_widgets_init()
{

    $footer_style_2_switch = get_theme_mod('footer_style_two_switcher', false);
    $footer_style_3_switch = get_theme_mod('footer_style_three_switcher', false);
    $footer_style_4_switch = get_theme_mod('footer_style_four_switcher', false);
    $footer_style_5_switch = get_theme_mod('footer_style_five_switcher', false);
    $footer_style_6_switch = get_theme_mod('footer_style_six_switcher', false);
    $footer_style_7_switch = get_theme_mod('footer_style_seven_switcher', false);
    $footer_style_8_switch = get_theme_mod('footer_style_eight_switcher', false);
    $footer_style_9_switch = get_theme_mod('footer_style_nine_switcher', false);

    /**
     * blog sidebar
     */
    register_sidebar([
        'name'          => esc_html__('Blog Sidebar', 'saasty'),
        'id'            => 'blog-sidebar',
        'description'          => esc_html__('Set Your Blog Widget', 'saasty'),
        'before_widget' => '<div id="%1$s" class="it-common-sidebar-widget it-blog-sidebar-search mb-55 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="it-blog-sidebar-title mb-35">',
        'after_title'   => '</h4>',
    ]);
    /**
     * Shop sidebar
     */
    register_sidebar([
        'name'          => esc_html__('Wocommerce Sidebar', 'saasty'),
        'id'            => 'shop-sidebar',
        'description'          => esc_html__('Set Your Shop Widget', 'saasty'),
        'before_widget' => '<div id="%1$s" class="it-common-sidebar-widget it-shop-widget  mb-35  %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="it-shop-widget-title">',
        'after_title'   => '</h3>',
    ]);



    $footer_widgets = get_theme_mod('footer_widget_number', 4);

    // footer default
    for ($num = 1; $num <= $footer_widgets; $num++) {
        register_sidebar([
            'name'          => sprintf(esc_html__('Footer Style 1 : %1$s', 'saasty'), $num),
            'id'            => 'footer-' . $num,
            'description'   => sprintf(esc_html__('Footer column %1$s', 'saasty'), $num),
            'before_widget' => '<div id="%1$s" class="it-footer-widget   %2$s it-footer-col-' . $num . '     %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="it-footer-widget-title">',
            'after_title'   => '</h4>',
        ]);
    }

    // footer 2
    if ($footer_style_2_switch) {
        for ($num = 1; $num <= $footer_widgets; $num++) {

            register_sidebar([
                'name'          => sprintf(esc_html__('Footer Style 2 : %1$s', 'saasty'), $num),
                'id'            => 'footer-2-' . $num,
                'description'   => sprintf(esc_html__('Footer Column 2 : %1$s', 'saasty'), $num),
                'before_widget' => '<div id="%1$s" class="it-footer-widget   %2$s pg-footer-col-3-' . $num . '     %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="it-footer-widget-title">',
                'after_title'   => '</h4>',
            ]);
        }
    }

    // footer 3
    if ($footer_style_3_switch) {
        for ($num = 1; $num <= $footer_widgets; $num++) {

            register_sidebar([
                'name'          => sprintf(esc_html__('Footer Style 3 : %1$s', 'saasty'), $num),
                'id'            => 'footer-3-' . $num,
                'description'   => sprintf(esc_html__('Footer Column 3 : %1$s', 'saasty'), $num),
                'before_widget' => '<div id="%1$s" class="it-footer-widget   %2$s it-footer-col-' . $num . '     %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="it-footer-widget-title">',
                'after_title'   => '</h4>',
            ]);
        }
    }

    // footer 2
    if ($footer_style_4_switch) {
        for ($num = 1; $num <= $footer_widgets; $num++) {

            register_sidebar([
                'name'          => sprintf(esc_html__('Footer Style 4 : %1$s', 'saasty'), $num),
                'id'            => 'footer-4-' . $num,
                'description'   => sprintf(esc_html__('Footer Column 4 : %1$s', 'saasty'), $num),
                'before_widget' => '<div id="%1$s" class="it-footer-widget   %2$s it-footer-col-' . $num . '     %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="it-footer-widget-title">',
                'after_title'   => '</h4>',
            ]);
        }
    }

    // footer 2
    if ($footer_style_5_switch) {
        for ($num = 1; $num <= $footer_widgets; $num++) {

            register_sidebar([
                'name'          => sprintf(esc_html__('Footer Style 5 : %1$s', 'saasty'), $num),
                'id'            => 'footer-5-' . $num,
                'description'   => sprintf(esc_html__('Footer Column 5 : %1$s', 'saasty'), $num),
                'before_widget' => '<div id="%1$s" class="it-footer-widget   %2$s it-footer-col-' . $num . '     %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="it-footer-widget-title">',
                'after_title'   => '</h4>',
            ]);
        }
    }

    // footer 2
    if ($footer_style_6_switch) {
        for ($num = 1; $num <= $footer_widgets; $num++) {

            register_sidebar([
                'name'          => sprintf(esc_html__('Footer Style 6 : %1$s', 'saasty'), $num),
                'id'            => 'footer-6-' . $num,
                'description'   => sprintf(esc_html__('Footer Column 6 : %1$s', 'saasty'), $num),
                'before_widget' => '<div id="%1$s" class="it-footer-widget   %2$s it-footer-col-' . $num . '     %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="it-footer-widget-title">',
                'after_title'   => '</h4>',
            ]);
        }
    }
    // footer 2
    if ($footer_style_7_switch) {
        for ($num = 1; $num <= 5; $num++) {

            register_sidebar([
                'name'          => sprintf(esc_html__('Footer Style 7 : %1$s', 'saasty'), $num),
                'id'            => 'footer-7-' . $num,
                'description'   => sprintf(esc_html__('Footer Column 7 : %1$s', 'saasty'), $num),
                'before_widget' => '<div id="%1$s" class="it-footer-widget   %2$s it-footer-col-9-' . $num . '     %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="it-footer-widget-title">',
                'after_title'   => '</h4>',
            ]);
        }
    }



    // footer 8
    if ($footer_style_8_switch) {
        for ($num = 1; $num <= $footer_widgets; $num++) {

            register_sidebar([
                'name'          => sprintf(esc_html__('Footer Style 8 : %1$s', 'saasty'), $num),
                'id'            => 'footer-2-' . $num,
                'description'   => sprintf(esc_html__('Footer Column 8 : %1$s', 'saasty'), $num),
                'before_widget' => '<div id="%1$s" class="it-footer-widget   %2$s it-footer-col-' . $num . '     %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="it-footer-widget-title">',
                'after_title'   => '</h4>',
            ]);
        }
    }

    // footer 2
    if ($footer_style_9_switch) {
        for ($num = 1; $num <= $footer_widgets; $num++) {

            register_sidebar([
                'name'          => sprintf(esc_html__('Footer Style 9 : %1$s', 'saasty'), $num),
                'id'            => 'footer-9-' . $num,
                'description'   => sprintf(esc_html__('Footer Column 9 : %1$s', 'saasty'), $num),
                'before_widget' => '<div id="%1$s" class="it-footer-widget   %2$s it-footer-col-' . $num . '     %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="it-footer-widget-title">',
                'after_title'   => '</h4>',
            ]);
        }
    }
}
add_action('widgets_init', 'saasty_widgets_init');
