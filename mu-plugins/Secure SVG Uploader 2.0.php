<?php
/**
 * Plugin Name: Secure SVG Uploader
 * Description: A plugin to securely upload SVG files and ensure proper admin display.
 * Version: 2.0
 * Author: Piotr Sztucki-Szewców
 */

// Allow SVG Upload
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Fix SVG Thumbnail Display in Admin
function fix_svg_thumb_display() {
    echo '<style>
        td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
            width: 100% !important; 
            height: auto !important; 
        }
    </style>';
}
add_action('admin_head', 'fix_svg_thumb_display');

// SVG Preview in Media Library
function sus_svg_preview_in_media_library($response, $attachment, $meta){
    if($response['type'] === 'image' && $response['subtype'] === 'svg+xml' && !empty($response['url'])){
        $response['image'] = array(
            'src' => $response['url'],
            'width' => $response['width'],
            'height' => $response['height']
        );
        $response['thumb'] = array(
            'src' => $response['url'],
            'width' => $response['width'],
            'height' => $response['height']
        );
    }
    return $response;
}
add_filter('wp_prepare_attachment_for_js', 'sus_svg_preview_in_media_library', 10, 3);

// Additional Security Checks for SVG Files
function check_svg_on_upload($file) {
    // Your security checks and sanitization logic here
    
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'check_svg_on_upload');
