<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>

        <div class="card mb-3">
            <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text">Prix : <?= get_post_meta(get_the_ID(), 'prix', true) ?></p>
                <a href="<?= get_post_meta(get_the_ID(), 'billet', true) ?>">Acheter</a>
                <p class="card-text"><small class="text-muted"><?php the_date(); ?></small></p>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>


<form action="<?= admin_url('admin-post.php'); ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">titre</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">prix</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="prix">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">image</label>
        <input type="file" class="form-control" id="exampleInputPassword1" name="image">
    </div>
    <input type="hidden" name="action" value="wphetic">
    <?php wp_nonce_field('form', 'form'); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php get_footer(); ?>
