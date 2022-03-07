<?php
/**
 * Template Name: Side Pic
 * Template Post Type: post, page
 */

get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>

        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php the_content(); ?></p>
                        <p class="card-text"><small class="text-muted"><?php the_date(); ?></small></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
