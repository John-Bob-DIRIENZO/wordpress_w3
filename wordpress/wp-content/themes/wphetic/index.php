<?php get_header(); ?>

<div class="mt-3 mb-3">
    <h3>Categories</h3>
    <ul class="list-group list-group-horizontal text-center">
        <?php
        $terms = get_terms(['taxonomy' => 'style']);
        foreach ($terms as $term) {
            $active = get_query_var('style') === $term->slug ? 'active' : '';
            echo sprintf('<a href="%s" class="list-group-item list-groupe-item-action %s">%s</a>',
                get_term_link($term), $active, $term->name
            );
        }
        ?>
    </ul>
</div>

<?php if (have_posts()) : ?>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <div class="col">
                <div class="card">
                    <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">
                    <div class="card-body">

                        <?php if (get_post_meta(get_the_ID(), 'wphetic_sponso', true)) : ?>
                            <div class="alert alert-primary" role="alert">
                                Contenu Sponsorisé
                            </div>
                        <?php endif; ?>

                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p><small><?php the_terms(get_the_ID(), 'style'); ?></small></p>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire plus</a>
                    </div>
                </div>
            </div>


        <?php endwhile; ?>
    </div>

    <?= wpheticPaginateLinks() ?>

<?php endif; ?>

<?= do_shortcode('[francishuster]'); ?>

<?php get_footer(); ?>
