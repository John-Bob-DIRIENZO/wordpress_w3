<?php

add_action('after_setup_theme',
    function () {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        add_theme_support('menus');
        register_nav_menu('custom_header', "C'est le menu dans le header");
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

