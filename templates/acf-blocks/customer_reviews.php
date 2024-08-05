<?php
/**
 * Review Plan Block Template
 *
 */
$image = get_field('logo');
$item_rating = get_field('rating');

?>
<div class="wp-block-customer_reviews" id="<?= $block['id'] ?>">
    <div class="content">
        <div class="icon">
        <?php if ($image) {
            if ($image['mime_type'] == 'image/svg') {
                $dir = preg_replace('/wp-content.*/', '', __DIR__);
                $dir .= preg_replace('/^.*?wp-content/', '/wp-content', $image['url']);
                echo file_get_contents($dir);
            } else { ?>
                <img src="<?= $image['url'] ?>" alt="">
                <?php
            }
        } ?>
        </div>
        <p><?= get_field('title'); ?></p>
        <div class="rating">
            <div class="stars" style="background-image: linear-gradient(90deg, rgb(236,101,37) 0%, rgb(236,101,37) <?= $item_rating*20 ?>%, rgba(0,0,0,0) <?= $item_rating ?>%)">
                <img src="<?= IMG_PATH ?>/stars.png">
            </div>
        </div>
    </div>
    <ul>
        <?php foreach (get_field('advantages') as $item){ ?>
            <li class="<?= $item['side'] ? 'positive' : 'negative' ?>"><?= $item['text'] ?></li>
        <?php } ?>
    </ul>
</div>


