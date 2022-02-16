<?php
function true_localize_example()
{
    wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/script.js');
}

add_action('wp_enqueue_scripts', 'true_localize_example', 99);
function wpdocs_theme_name_scripts()
{
    wp_enqueue_style('style-name', get_stylesheet_uri());
    wp_enqueue_script('script-name', get_template_directory_uri() . '/assets/js/script.js', ['jquery'], time(), true);

    wp_enqueue_style('owl-style', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.min.css');
    wp_enqueue_style('app-style', get_template_directory_uri() . '/dest/app.css');
    wp_enqueue_style('owl-style-def', get_template_directory_uri() . '/assets/owl-carousel/owl.theme.default.min.css');
//    wp_enqueue_script('jq-script', get_template_directory_uri() . '/assets/js/jquery-3.6.0.js', [], time(), true);
    wp_enqueue_script('owl-script', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.min.js', [], time(), true);
    wp_enqueue_script('map-script', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAxQJF3YnkqZ2axnYWpCuyv5q4i5jnfiWw&callback=initMap', [], time(), true);
}

add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');
function ajaxUrl()
{
    wp_localize_script('scripts', 'filters_ajax',
        [
            'url'       => admin_url('admin-ajax.php'),
            'theme_uri' => get_template_directory_uri(),
        ]
    );
}

add_action('wp_enqueue_scripts', 'ajaxUrl', 100);
function new_menu()
{
    register_nav_menu('my-custom-menu', __('My Custom Menu'));
}

add_action('init', 'new_menu');
add_theme_support('custom-logo', [
    'height'               => 55,
    'width'                => 242,
    'flex-width'           => false,
    'flex-height'          => false,
    'header-text'          => '',
    'unlink-homepage-logo' => false, // WP 5.5
]);
function upload_allow_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    $mimes['json'] = 'application/application/json';

    return $mimes;
}

add_filter('upload_mimes', 'upload_allow_types');
function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_login_header');
function fields($fieldBlock, $key)
{
    $field = get_field($key);
    if (empty($field) && isset($field)) {
        return '';
    } else {
        return $field;
    }
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page([
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'Theme Footer Settings',
        'menu_title'  => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ]);
}

//function create_posttype()
//{
//    register_post_type('myPost',
//// CPT Options
//        [
//            'labels'      => [
//                'name'          => __('My post'),
//                'singular_name' => __('My post'),
//            ],
//            'public'      => true,
//            'has_archive' => false,
//            'rewrite'     => ['slug' => 'My post'],
//            'supports'    => ['title', 'editor', 'thumbnail'],
//            'taxonomies'  => ['category'],
//        ]
//    );
//}

add_theme_support('post-thumbnails');

// Hooking up our function to theme setup
add_action('init', 'create_posttype');


add_action('wp_ajax_portfolio', 'portfolio');
add_action('wp_ajax_nopriv_portfolio', 'portfolio');

function portfolio()
{
    $id = $_POST['cat_id'] ?? '';
    $args = [
        'posts_per_page' => 50,
        'post_type'      => 'mypost',
        'tax_query'      => [
            [
                'taxonomy' => 'category', //double check your taxonomy name in you dd
                'field'    => 'id',
                'terms'    => $id,
            ],
        ],
    ];
    $wp_query = new WP_Query($args);
    ob_start(); ?>
    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <?php $imageName = get_fields($wp_query->post->ID); ?>
    <div class="port-items <?php echo strtolower($imageName["image_name"]) ?>">
        <img class="port-img" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
        <span class="image-name"><?php echo $imageName["image_name"] ?? ''; ?></span>
        <span class="plus"><?php echo '+'; ?></span>
    </div>
<?php endwhile;
    wp_reset_postdata(); ?>
    <?php
    $html = ob_get_clean();
    wp_send_json(['content' => $html]);
}
