<?php

class Sponsobox
{
    private string $metakey;

    public function __construct(string $metakey)
    {
        $this->metakey = $metakey;
        $this->register();
    }

    public function register()
    {
        add_action('add_meta_boxes', [$this, 'wphetic_register_meta_boxes']);
        add_action('save_post', [$this, 'wphetic_save_meta_boxes']);
    }

    public function wphetic_register_meta_boxes()
    {
        add_meta_box(
            $this->metakey,
            'Contenu Sonso ?',
            [$this, 'wphetic_render_metabox'],
            'post',
            'side'
        );
    }

    public function wphetic_render_metabox()
    {
        $checked = get_post_meta(isset($_GET['post']) ?? 0, $this->metakey, true) ? 'checked' : '';

        ?>
        <input type="checkbox" value="true" name="sponso" id="sponso" <?= $checked; ?>>
        <label for="sponso">Contenu Sponso</label>
        <?php
    }

    public function wphetic_save_meta_boxes($postId)
    {
        if (isset($_POST['sponso']) && $_POST['sponso'] === 'true') {
            update_post_meta($postId, $this->metakey, 'true');
        } else {
            delete_post_meta($postId, $this->metakey);
        }
    }
}
