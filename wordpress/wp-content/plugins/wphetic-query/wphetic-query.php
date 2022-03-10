<?php
/**
 * Plugin Name: Query de merde
 * Author: John Bob
 * Description: Un truc que je sais pas quoi dire
 * Author URI: https://www.google.fr
 */


add_shortcode('francishuster', 'wphetic_query');
function wphetic_query($atts)
{
    require_once 'WpheticQuery.php';
    $WpheticQuery = new WpheticQuery($atts);
    return $WpheticQuery->render()


//    $attributes = shortcode_atts([
//        'prix_max' => 1000000,
//        'prix_min' => 0,
//        'afficher' => 3
//    ], $atts);
//
//
//    $query = new WP_Query([
//        'post_type' => 'event',
//        'posts_per_page' => $attributes['afficher'],
//        'orderby' => 'rand',
//        'meta_query' => [
//            [
//                'key' => 'prix',
//                'value' => $attributes['prix_max'],
//                'compare' => "<",
//                'type' => 'NUMERIC'
//            ],
//            [
//                'key' => 'prix',
//                'value' => $attributes['prix_min'],
//                'compare' => ">",
//                'type' => 'NUMERIC'
//            ]
//        ]
//    ]);
//
//    ob_start();
//
//
//    ?>
<!---->
<!--    --><?php //if ($query->have_posts()) : ?>
<!--    <div class="row row-cols-1 row-cols-md-3 g-4">-->
<!--        --><?php //while ($query->have_posts()) : ?>
<!--            --><?php //$query->the_post(); ?>
<!---->
<!--            <div class="col">-->
<!--                <div class="card">-->
<!--                    <img src="--><?php //the_post_thumbnail_url(); ?><!--" class="card-img-top" alt="...">-->
<!--                    <div class="card-body">-->
<!---->
<!--                        --><?php //if (get_post_meta(get_the_ID(), 'wphetic_sponso', true)) : ?>
<!--                            <div class="alert alert-primary" role="alert">-->
<!--                                Contenu Sponsorisé-->
<!--                            </div>-->
<!--                        --><?php //endif; ?>
<!---->
<!--                        <h5 class="card-title">--><?php //the_title(); ?><!--</h5>-->
<!--                        <p><small>Prix : --><?//= get_post_meta(get_the_ID(), 'prix', true) ?><!-- €</small></p>-->
<!--                        <a href="--><?php //the_permalink(); ?><!--" class="btn btn-primary">Lire plus</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--        --><?php //endwhile; ?>
<!--    </div>-->
<!---->
<!--    --><?php //wp_reset_postdata(); ?>
<?php //endif;
//
//    return ob_get_clean();

}
