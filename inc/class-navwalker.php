<?php
/**
 * WP Bootstrap Navwalker
 *
 * @package WP-Bootstrap-Navwalker
 */

/*
 * Class Name: WP_Bootstrap_Navwalker
 * Plugin Name: WP Bootstrap Navwalker
 * Plugin URI:  https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 4 navigation style in a custom theme using the WordPress built in menu manager.
 * Author: Edward McIntyre - @twittem, WP Bootstrap, William Patton - @pattonwebz
 * Version: 4.1.0
 * Author URI: https://github.com/wp-bootstrap
 * GitHub Plugin URI: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * GitHub Branch: master
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/* Check if Class Exists. */
if ( !class_exists( 'saasty_Navwalker_Class' ) ) {
    class saasty_Navwalker_Class extends Walker_Nav_Menu {

        // Start Level
        function start_lvl( &$output, $depth = 0, $args = array() ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat( $t, $depth );
            $classes = array( 'it-submenu submenu' );

            $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $output .= "{$n}{$indent}<ul$class_names>{$n}";
        }

        // Start Element
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            // Check if the item has a custom field (selected mega-menu post)
            if ( !empty($item->custom_field) ) {
                $classes[] = 'has-dropdown   p-static'; // Add 'p-static' class here
            }

            

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $class_names .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
            $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
            $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
            $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $title = apply_filters( 'the_title', $item->title, $item->ID );

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

       
         // Append the mega-menu content with the selected class
         if (!empty($item->custom_field)) {
            // Get the post content
            $post_content = get_post_field('post_content', $item->custom_field);
            
            // Retrieve the mega menu class
            $mega_menu_class = get_post_meta($item->ID, '_menu_item_mega_menu_class', true);
            $mega_menu_class = !empty($mega_menu_class) ? esc_attr($mega_menu_class) : 'default-mega-menu-class'; // Add a default class if none provided

            // Check if Elementor is active
            if (did_action('elementor/loaded')) {
                // Render the content with Elementor
                $elementor_content = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($item->custom_field);
                $mega_menu_content = '<div class="it-submenu has-home-img-width submenu has-home-img ' . $mega_menu_class . '">' . $elementor_content . '</div>';
            } else {
                // Fallback to normal content rendering
                $fallback_content = apply_filters('the_content', $post_content);
                $mega_menu_content = '<div class="it-submenu has-home-img-width submenu has-home-img ' . $mega_menu_class . '">' . $fallback_content . '</div>';
            }

            // Append the mega-menu content to the item output
            $item_output .= $mega_menu_content;
        }


            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }
}
