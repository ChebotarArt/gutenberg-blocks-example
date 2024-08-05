<div class="trusted">
    <div class="trusted__block">
        <div class="trusted__image">
            <?php
            $image = get_field('image');
            if ($image) {
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
        <div class="trusted__title">
            <?= get_field('title'); ?>
        </div>
    </div>
    <div class="trusted__info">
        <?php $link = get_field('button_link');
        $nofollow = get_field('nofollow');
        $sponsored = get_field('sponsored');
        if ($link) { ?>
            <a href="<?= $link['url'] ?>" class="btn"
               rel="<?= $nofollow ? 'nofollow ' : '' ?><?= $sponsored ? 'sponsored' : '' ?>"
               target="<?= $link['target'] ?>"
               style="background-color:<?= get_field('button_color'); ?> "><?= $link['title'] ?></a>
        <?php } ?>
        <div class="trusted__icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                 id="Layer_1" x="0px" y="0px" viewBox="0 0 84.5 84" style="enable-background:new 0 0 84.5 84;"
                 xml:space="preserve">
                <g>
                    <path fill="#EB6526"
                          d="M37.3,55.4c-1.1,0-2.1-0.4-3-1.2l-8.5-8.5c-1.6-1.6-1.6-4.3,0-5.9c1.6-1.6,4.3-1.6,5.9,0l5.5,5.5l15.5-15.5   c1.6-1.6,4.3-1.6,5.9,0c1.6,1.6,1.6,4.3,0,5.9L40.2,54.2C39.4,55,38.3,55.4,37.3,55.4z"/>
                </g>
                <g>
                    <path fill="#EB6526"
                          d="M84.5,42c0-4-4.7-3.8-4.9-7.3c-0.2-3.5,2.9-5.8,2.1-8.3c-0.8-2.5-6.3-2.6-8.2-5.3c-1.8-2.6,0.5-6.2-1.3-8.3   c-1.7-2.1-6,0-8.9-1.7c-2.9-1.7-1.4-6.7-3.8-7.6c-2.4-0.9-5.4,1.8-8.6,1.6C47.6,4.9,46.7,0,42.2,0c-1.7,0-3.9,4.3-7.3,4.9   c-3.3,0.7-5.6-3.3-8.5-2s-1.6,5.6-5.1,7.7c-3.5,2.1-6.1-0.8-8.5,1.2c-2.4,2,1.2,5.9-1.6,9.3c-2.8,3.5-6.1,1.6-7.6,4.6   c-1.5,3,1.8,5.1,1.7,7.9C5.3,36.6,0,38.4,0,41.9c0,3.6,4,3.7,5.1,8.2s-2.6,5.8-1.7,8.4c0.9,2.6,4.9,1.6,7.3,4.4   c2.3,2.8-0.6,7.5,2.2,9.7c2.8,2.2,6.3-0.7,8.3,1.1c2,1.9,1.3,6.5,4.5,7.4c3.2,0.9,6.2-2.5,8.9-1.7c2.6,0.8,3.9,4.7,7.7,4.7   s4.1-3.8,7-4.6c2.9-0.8,6,3,9,1.8c3-1.2,2.3-5.9,5.3-7.6c3-1.7,5.6,0.3,8.5-1.5c2.9-1.7,0-6.4,1.7-8.6c1.7-2.2,5.3-1.3,7.1-4.9   c1.8-3.7-2.3-6-1.7-8.5C79.8,47.5,84.5,46,84.5,42z M42.2,68.3C27.7,68.3,16,56.5,16,42c0-14.5,11.7-26.2,26.2-26.2   S68.5,27.5,68.5,42C68.5,56.5,56.7,68.3,42.2,68.3z"/>
                </g>
            </svg>
            <span class="trusted-icon__text"><?= get_field('icon_text'); ?></span>
        </div>
    </div>

</div>