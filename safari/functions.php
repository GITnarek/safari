<?php
function my_theme_setup() {
    add_theme_support('post-thumbnails');
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'safari'),
            'footer-menu-1' => __('Footer Menu 1', 'safari'),
            'footer-menu-2' => __('Footer Menu 2', 'safari'),
            'footer-bottom-links' => __('Footer bottom links', 'safari'),
        )
    );
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'my_theme_setup');

function safari_enqueue_assets() {
    wp_enqueue_style('main-style', get_stylesheet_uri(), array(), '1.0.0', 'all');

    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css', array('main-style'), '1.0.0', 'all');

    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);
    wp_localize_script('custom-script', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'safari_enqueue_assets');

function safari_customize_register($wp_customize) {
    $wp_customize->add_section('book_a_tour_section', array(
        'title'      => __('Book a tour', 'safari'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('book_a_tour_text', array(
        'default'           => 'Book a tour',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('book_a_tour_text_control', array(
        'label'    => __('Button Text', 'safari'),
        'section'  => 'book_a_tour_section',
        'settings' => 'book_a_tour_text',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('book_a_tour_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('book_a_tour_url_control', array(
        'label'    => __('Button URL', 'safari'),
        'section'  => 'book_a_tour_section',
        'settings' => 'book_a_tour_url',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'safari_customize_register');

add_action('wp_ajax_calculate', 'handle_calculate');
add_action('wp_ajax_nopriv_calculate', 'handle_calculate');
function handle_calculate() {
    $number1 = isset($_POST['number1']) ? floatval($_POST['number1']) : 0;
    $number2 = isset($_POST['number2']) ? floatval($_POST['number2']) : 0;
    $operation = isset($_POST['operation']) ? sanitize_text_field($_POST['operation']) : '+';
    $result = 0;
    switch ($operation) {
        case '+':
            $result = $number1 + $number2;
            break;
        case '-':
            $result = $number1 - $number2;
            break;
        case '*':
            $result = $number1 * $number2;
            break;
        case '/':
            $result = $number2 != 0 ? $number1 / $number2 : 'Error: Division by zero';
            break;
        default:
            $result = 'Invalid operation';
            break;
    }
    echo $result;
    wp_die();
}