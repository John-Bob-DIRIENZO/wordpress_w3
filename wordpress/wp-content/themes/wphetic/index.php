<?php get_header(); ?>

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
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire plus</a>
                    </div>
                </div>
            </div>


        <?php endwhile; ?>
    </div>

    <?= wpheticPaginateLinks() ?>

<?php endif; ?>

<?php get_footer(); ?>
