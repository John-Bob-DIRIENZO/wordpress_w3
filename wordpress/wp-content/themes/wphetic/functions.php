<?php

if (current_user_can('subscriber') && !is_admin()) {
    add_filter('show_admin_bar', '__return_false');
}

add_action('after_setup_theme',
    function () {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        add_theme_support('menus');
        register_nav_menu('custom_header', "C'est le menu dans le header");

//        if (current_user_can('subscriber') && !is_admin()) {
//            show_admin_bar(false);
//        }


    });

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('wphetic-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_enqueue_script('wphetic-bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', [], false, true);
});

add_filter('login_headerurl',
    function ($header_url) {
        return 'https://www.google.fr';
    });

add_filter('nav_menu_css_class', function ($classes) {
    $classes[] = 'nav-item';
    return $classes;
});

add_filter('nav_menu_link_attributes', function ($atts) {
    $atts['class'] = "nav-link";
    return $atts;
});

function wpheticPaginateLinks()
{
    $paginateLink = paginate_links(['type' => 'array']);
    if ($paginateLink) {
        ob_start();
        echo '<nav aria-label="Page navigation example" class="mt-3">';
        echo '<ul class="pagination">';

        foreach ($paginateLink as $link) {
            echo sprintf('<li class="page-item %s">%s</li>',
                str_contains($link, 'current') ? 'active' : '',
                str_replace('page-numbers', 'page-link', $link));
        }

        echo "</ul>";
        echo "</nav>";

        return ob_get_clean();
    }
}

require_once __DIR__ . '/classes/Sponsobox.php';
$sponso = new Sponsobox('wphetic_sponso');


add_action('init', function () {
    register_taxonomy('style', ['event'], [
        'labels' => [
            'name' => 'Styles'
        ],
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'default_term' => [
            'name' => 'metôl',
            'slug' => 'metol'
        ]
    ]);

    register_post_type('event', [
        'label' => 'Events',
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-plugins-checked',
        'taxonomies' => ['style'],
        'supports' => ['thumbnail', 'custom-fields', 'title'],
        'has_archive' => true,
        'capabilities' => [
            'edit_post' => 'manage_events',
            'read_post' => 'manage_events',
            'delete_post' => 'manage_events'
        ]
    ]);


    flush_rewrite_rules();
});

add_action('after_switch_theme', function () {
    $admin = get_role('administrator');
    $admin->add_cap('manage_events');

    add_role('event_manager', 'Event Manager', [
        'manage_events' => true,
        'read' => true
    ]);

    wp_insert_user([
        'user_pass' => 'password',
        'user_login' => 'maurice',
        'user_email' => 'maurice@gmail.com',
        'role' => 'administrator'
    ]);
});

add_action('switch_theme', function () {
    $admin = get_role('administrator');
    $admin->remove_cap('manage_events');
    remove_role('event_manager');

   wp_delete_user(get_user_by('slug', 'maurice')->ID);

});


add_action('admin_post_nopriv_wphetic', function () {
    if (!wp_verify_nonce($_POST['form'], 'form')) {
        die('nonce invalide');
    }

    $args = [
        'post_type' => 'event',
        'post_title' => $_POST['title'],
        'meta_input' => [
            'prix' => $_POST['prix']
        ]
    ];

    $postId = wp_insert_post($args);

    $imageId = media_handle_upload('image', $postId);

    set_post_thumbnail($postId, $imageId);


    wp_redirect($_POST['_wp_http_referer'] . '?message=coucou');
});



