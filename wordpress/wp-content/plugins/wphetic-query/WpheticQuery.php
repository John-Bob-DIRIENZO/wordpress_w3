<?php

class WpheticQuery
{
    public WP_Query $query;

    public function __construct(string|array $atts)
    {
        $this->buildQuery($this->mergeDefaultsAtts($atts));
    }

    public function mergeDefaultsAtts(string|array $atts): array
    {
        return shortcode_atts([
            'prix_max' => 1000000,
            'prix_min' => 0,
            'afficher' => 3
        ], $atts);
    }

    public function buildQuery(array $attributes): void
    {
        $this->query = new WP_Query([
            'post_type' => 'event',
            'posts_per_page' => $attributes['afficher'],
            'orderby' => 'rand',
            'meta_query' => [
                [
                    'key' => 'prix',
                    'value' => $attributes['prix_max'],
                    'compare' => "<",
                    'type' => 'NUMERIC'
                ],
                [
                    'key' => 'prix',
                    'value' => $attributes['prix_min'],
                    'compare' => ">",
                    'type' => 'NUMERIC'
                ]
            ]
        ]);
    }

    public function render(): bool|string
    {
        ob_start(); ?>
        <?php if ($this->query->have_posts()) : ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while ($this->query->have_posts()) : ?>
                <?php $this->query->the_post(); ?>

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
                            <p><small>Prix : <?= get_post_meta(get_the_ID(), 'prix', true) ?> €</small></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire plus</a>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
        <?php return ob_get_clean();
    }
}
