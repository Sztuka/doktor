<?php
/**
 * Plugin Name: Custom Dashboard Enhancements
 * Description: Customizes the "At a Glance" widget in the WordPress dashboard.
 * Version: 1.0
 * Author: Your Name
 */

// Add Custom Post Types to "At a Glance" Widget
function custom_post_type_at_a_glance() {
    $custom_post_types = array('opinie', 'zabieg'); 
    
    foreach ($custom_post_types as $post_type) {
        $post_type_object = get_post_type_object($post_type);
        $num_posts = wp_count_posts($post_type);
        $num = number_format_i18n($num_posts->publish);
        
        // Define the singular and plural forms for each post type
        $forms = array(
            'opinie' => array('opinia', 'opinie', 'opinii'),
            'zabieg' => array('zabieg', 'zabiegi', 'zabiegów')
        );
        
        $text = $num . ' ' . polish_plural_forms($num, ...$forms[$post_type]);
        
        if (current_user_can($post_type_object->cap->edit_posts)) {
            $output = '<a href="edit.php?post_type=' . $post_type . '">' . $text . '</a>';
        } else {
            $output = $text;
        }
        
        echo '<li class="post-count ' . $post_type . '-count">' . $output . '</li>';
    }
}
add_action('dashboard_glance_items', 'custom_post_type_at_a_glance');

// Polish Plural Forms Function
function polish_plural_forms($num, $singular, $plural1, $plural2) {
    if ($num == 1) {
        return $singular;
    } elseif ($num % 10 >= 2 && $num % 10 <= 4 && ($num % 100 < 10 || $num % 100 >= 20)) {
        return $plural1;
    } else {
        return $plural2;
    }
}

// Add Custom CSS to Admin Dashboard
function custom_admin_styles() {
    echo '
    <style>
        #dashboard_right_now .opinie-count a:before {
            content: "\f122"; /* Change to your desired dashicon unicode */
        }
        #dashboard_right_now .zabieg-count a:before {
            content: "\f481"; /* Change to your desired dashicon unicode */
        }
    </style>';
}
add_action('admin_head', 'custom_admin_styles');
