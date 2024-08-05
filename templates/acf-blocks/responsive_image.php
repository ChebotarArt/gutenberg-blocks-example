<figure class="image-source wp-block-image size-large is-style-default">
    <picture>
        <?php $mobile_image = get_field('mobile_image');

        $desktop_image = get_field('desktop_image');
        $desktop_image_url = wp_get_attachment_url($desktop_image);
        $image_alt = get_post_meta($desktop_image, '_wp_attachment_image_alt', true);

        if ($mobile_image) {
            $mobile_image_url = wp_get_attachment_url($mobile_image); ?>
            <source srcset="<?= $mobile_image_url ?>" media="(max-width: 767px)">
        <?php } ?>
        <img src="<?= $desktop_image_url ?>" alt="<?= $image_alt; ?>">
    </picture>
    <?php $caption = get_field('source');
    if ($caption) { ?>
        <figcaption><span>Source:</span> <?= $caption ?></figcaption>
    <?php } ?>
</figure>