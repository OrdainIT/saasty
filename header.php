<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package saasty
 * 
 */


?>

<!doctype html>
<html <?php language_attributes(); ?> <?php
                                        $saasty_rtl = get_option('saasty_rtl', 'off'); // Get RTL setting
                                        if ($saasty_rtl === 'on') {
                                            echo 'dir="rtl"';  // Add dir="rtl" when RTL is enabled
                                        }
                                        ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php if (is_singular() && pings_open(get_queried_object())): ?>
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>





    <?php
    $saasty_preloader = get_theme_mod('saasty_preloader', false);
    $saasty_backtotop = get_theme_mod('saasty_backtotop', false);


    ?>



    <div id="magic-cursor">
        <div id="ball"></div>
    </div>




    <?php if (!empty($saasty_preloader)): ?>
        <!-- preloader -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- preloader end  -->
    <?php endif; ?>



    <?php if (!empty($saasty_backtotop)): ?>
        <!-- back-to-top-start  -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="far fa-angle-up"></i>
        </button>
        <!-- back-to-top-end  -->

    <?php endif; ?>







    <?php do_action('search_form_show'); ?>

    <!-- header start -->
    <?php do_action('saasty_header_style'); ?>
    <!-- header end -->

    <!-- Before main Smooth Wrapper -->

    <?php do_action('saasty_before_main_content'); ?>

    <!-- Breadcrumb_wrapper -->
    <?php do_action('saasty_breadcrumb_content'); ?>