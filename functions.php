<?php
define('CSS_PATH', get_stylesheet_directory_uri() . '/assets/css');
define('JS_PATH', get_stylesheet_directory_uri() . '/assets/js');
define('IMG_PATH', get_stylesheet_directory_uri() . '/assets/img');

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
    if (function_exists('acf_register_block_type'))  {
        acf_register_block_type([
            'name' => 'comparison_scorecard',
            'title' => __('Review Comparison Scorecard'),
            'description' => __('Review Comparison Scorecard'),
            'render_template' => 'templates/acf-blocks/comparison_scorecard.php',
            'category' => 'formatting',
            'icon' => 'star-half',
            'keywords' => ['block', 'list', 'review', 'comparison', 'scorecard', 'custom'],
            'enqueue_assets' => function () {
                wp_enqueue_style('comparison_scorecard', CSS_PATH . CSS_PATH . '/gb-blocks/comparison_scorecard.css');
            },
        ]);

        acf_register_block_type([
            'name' => 'responsive_image',
            'title' => __('Responsive Image'),
            'description' => __('Responsive Image'),
            'render_template' => 'templates/acf-blocks/responsive_image.php',
            'category' => 'formatting',
            'icon' => 'format-gallery',
            'keywords' => ['responsive', 'image', 'img'],
            'enqueue_assets' => function () {
                wp_enqueue_style('responsive_image', CSS_PATH . '/gb-blocks/responsive_image.css');
            },
        ]);

        acf_register_block_type([
            'name' => 'customer_reviews',
            'title' => __('Customer Reviews Block'),
            'description' => __('Customer Reviews Block with image, rating and advantages'),
            'render_template' => 'templates/acf-blocks/customer_reviews.php',
            'category' => 'formatting',
            'icon' => 'editor-help',
            'keywords' => ['image', 'logo', 'text', 'button', 'plan', 'review', 'custom', 'rating'],
            'enqueue_assets' => function () {
                wp_enqueue_style('customer_reviews', CSS_PATH . '/gb-blocks/customer_reviews.css');
            },
        ]);

        acf_register_block_type([
            'name'              => 'zen_business_calc',
            'title'             => __('ZenBusiness Calculator'),
            'description'       => __('ZenBusiness Calculator'),
            'render_template'   => 'templates/acf-blocks/zen_business_calc.php',
            'category'          => 'formatting',
            'icon'              => 'calculator',
            'keywords'          => [ 'calc' ],
            'enqueue_assets' => function(){
                wp_enqueue_style( 'calc-custom-styles', CSS_PATH . '/gb-blocks/global_calcs.css' );
                wp_enqueue_script( 'calc-zenbusiness-js', JS_PATH . '/gb-blocks/zen_business_calc.js', ['jquery'], '', true );
            },
        ]);

        acf_register_block_type([
            'name'              => 'trusted_partner',
            'title'             => __('Trusted partner'),
            'render_template'   => 'templates/acf-blocks/trusted_partner.php',
            'category'          => 'formatting',
            'icon'              => 'yes',
            'keywords'          => [ 'Trusted','Partner','block','custom' ],
            'enqueue_assets' => function(){
                wp_enqueue_style( 'trusted-partner-styles', CSS_PATH . '/gb-blocks/trusted_partner.css' );
            },
        ]);

    }
}