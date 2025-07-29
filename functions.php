<?php
// Enqueue theme styles and scripts
function inspirepress_enqueue_assets() {
    wp_enqueue_style('inspirepress-style', get_stylesheet_uri(), [], '1.0', 'all');
    wp_enqueue_script('inspirepress-script', get_template_directory_uri() . '/js/script.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'inspirepress_enqueue_assets');

// Inject dynamic accent color styles
function inspirepress_dynamic_styles() {
    $accent = get_theme_mod('accent_color', '#0073aa');
    $custom_css = "
        a, .inspire-btn {
            color: {$accent};
            border-color: {$accent};
        }
        .inspire-btn:hover {
            background-color: {$accent};
            color: white;
        }
        nav a::after {
            background-color: {$accent};
        }
    ";
    wp_add_inline_style('inspirepress-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'inspirepress_dynamic_styles');

// Theme setup
function inspirepress_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'gallery', 'caption']);
    register_nav_menus([
        'main-menu' => __('Main Menu', 'inspirepress'),
    ]);
}
add_action('after_setup_theme', 'inspirepress_theme_setup');

// Customizer settings
function inspirepress_customize_register($wp_customize) {
    $wp_customize->add_section('inspirepress_theme_options', array(
        'title'    => __('Theme Options', 'inspirepress'),
        'priority' => 30,
    ));

    // Accent Color
    $wp_customize->add_setting('accent_color', array(
        'default'           => '#0073aa',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label'    => __('Accent Color', 'inspirepress'),
        'section'  => 'inspirepress_theme_options',
        'settings' => 'accent_color',
    )));

    // Sidebar toggle
    $wp_customize->add_setting('show_sidebar', array(
        'default'           => true,
        'sanitize_callback' => 'inspirepress_sanitize_checkbox',
    ));
    $wp_customize->add_control('show_sidebar', array(
        'label'   => __('Show Sidebar', 'inspirepress'),
        'section' => 'inspirepress_theme_options',
        'type'    => 'checkbox',
    ));

    // Footer logo
    $wp_customize->add_setting('footer_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label'    => __('Footer Logo', 'inspirepress'),
        'section'  => 'inspirepress_theme_options',
        'settings' => 'footer_logo',
    )));

    // Footer copyright text
    $wp_customize->add_setting('footer_text', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_text', array(
        'label'   => __('Footer Copyright Text', 'inspirepress'),
        'section' => 'inspirepress_theme_options',
        'type'    => 'text',
    ));

    // Hero Image
    $wp_customize->add_setting('hero_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label'    => __('Hero Section Image', 'inspirepress'),
        'section'  => 'inspirepress_theme_options',
        'settings' => 'hero_image',
    )));
}
add_action('customize_register', 'inspirepress_customize_register');

// Sanitize checkbox input
function inspirepress_sanitize_checkbox($checked) {
    return ((isset($checked) && true === $checked) ? true : false);
}

// Shortcode: [inspire_button text="Click Me" url="#"]
function inspire_button_shortcode($atts) {
    $atts = shortcode_atts(array(
        'text' => 'Click Me',
        'url'  => '#',
    ), $atts);

    return '<a href="' . esc_url($atts['url']) . '" class="inspire-btn">' . esc_html($atts['text']) . '</a>';
}
add_shortcode('inspire_button', 'inspire_button_shortcode');

// Register Sidebar
function inspirepress_register_sidebars() {
    register_sidebar(array(
        'name'          => __('Blog Sidebar', 'inspirepress'),
        'id'            => 'blog-sidebar',
        'description'   => __('Widgets in this area will appear on blog and archive pages.', 'inspirepress'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'inspirepress_register_sidebars');

// Register Projects CPT
function inspire_register_projects_cpt() {
    $labels = array(
        'name'          => 'Projects',
        'singular_name' => 'Project',
        'add_new'       => 'Add New',
        'add_new_item'  => 'Add New Project',
        'edit_item'     => 'Edit Project',
        'view_item'     => 'View Project',
        'search_items'  => 'Search Projects',
        'not_found'     => 'No Projects found',
        'menu_name'     => 'Projects',
    );

    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'projects'),
        'supports'      => array('title', 'thumbnail', 'editor'),
        'menu_icon'     => 'dashicons-portfolio',
        'show_in_rest'  => true,
    );

    register_post_type('project', $args);
}
add_action('init', 'inspire_register_projects_cpt');

// Meta box for Project URL
function inspire_add_project_meta_box() {
    add_meta_box(
        'project_url_meta_box',
        'Project URL',
        'inspire_project_url_callback',
        'project',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'inspire_add_project_meta_box');

function inspire_project_url_callback($post) {
    $value = get_post_meta($post->ID, '_project_url', true);
    echo '<input type="url" name="project_url" value="' . esc_attr($value) . '" style="width:100%;" placeholder="https://example.com">';
}

function inspire_save_project_url($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (isset($_POST['project_url'])) {
        update_post_meta($post_id, '_project_url', esc_url_raw($_POST['project_url']));
    }
}
add_action('save_post', 'inspire_save_project_url');
