<div class="comparison_scorecard">
    <div class="products">

        <?php $first_product = get_field('product_1');
        $second_product = get_field('product_2'); ?>

        <div class="product">
            <div class="logo">
                <?= wp_get_attachment_image($first_product['logo'], 'full size') ?>
            </div>

            <?php $rating = 0;
            $score_items = get_field('score_items_1');
            if ($score_items) { ?>
                <div class="score_wrap">
                    <div class="score_items">
                        <?php foreach ($score_items as $item) {
                            $item_rating = $item['rating'] * 20;
                            $rating += $item_rating;
                            ?>
                            <div class="item">
                                <p><?= $item['title'] ?></p>
                                <div class="stars"
                                     style="background-image: linear-gradient(90deg, rgb(236,101,37) 0%, rgb(236,101,37) <?= $item_rating ?>%, rgba(0,0,0,0) <?= $item_rating ?>%)">
                                    <img src="<?= IMG_PATH ?>/stars_5.svg">
                                </div>
                            </div>
                        <?php }
                        $rating = $rating / count(get_field('score_items_1'));
                        ?>
                    </div>
                    <div class="rating-main">
                        <p>Overall Score: <?= round($rating / 20, 1) ?>/5</p>
                        <div class="stars"
                             style="background-image: linear-gradient(90deg, rgb(236,101,37) 0%, rgb(236,101,37) <?= $rating ?>%, rgba(0,0,0,0) <?= $rating ?>%)">
                            <img src="<?= IMG_PATH ?>/stars_5.svg">
                        </div>
                    </div>
                </div>

                <div class="text">
                    <?= get_field('text'); ?>
                </div>
                <?php
                $first_cta = get_field('cta_button_1');
                if ($first_cta) {
                    $nofollow_1 = get_field('nofollow_1');
                    $sponsored_1 = get_field('sponsored_1'); ?>
                    <a href="<?= $first_cta['url'] ?>"
                       rel="<?= $nofollow_1 ? 'nofollow ' : '' ?><?= $sponsored_1 ? 'sponsored' : '' ?>"
                       target="<?= $first_cta['target'] ?>"
                       style="background-color:<?= get_field('button_color_1') ?>;"
                       class="btn"><?= $first_cta['title'] ?></a>
                <?php } ?>
            <?php } ?>
        </div>


        <div class="product">
            <div class="logo">
                <?= wp_get_attachment_image($second_product['logo'], 'full size') ?>
            </div>

            <?php $rating = 0;
            $score_items = get_field('score_items_2');
            if ($score_items) { ?>
                <div class="score_wrap">
                    <div class="score_items">
                        <?php foreach ($score_items as $item) {
                            $item_rating = $item['rating'] * 20;
                            $rating += $item_rating;
                            ?>
                            <div class="item">
                                <p><?= $item['title'] ?></p>
                                <div class="stars"
                                     style="background-image: linear-gradient(90deg, rgb(236,101,37) 0%, rgb(236,101,37) <?= $item_rating ?>%, rgba(0,0,0,0) <?= $item_rating ?>%)">
                                    <img src="<?= IMG_PATH ?>/stars_5.svg">
                                </div>
                            </div>
                        <?php }
                        $rating = $rating / count(get_field('score_items_2'));
                        ?>
                    </div>
                    <div class="rating-main">
                        <p>Overall Score: <?= round($rating / 20, 1) ?>/5</p>
                        <div class="stars"
                             style="background-image: linear-gradient(90deg, rgb(236,101,37) 0%, rgb(236,101,37) <?= $rating ?>%, rgba(0,0,0,0) <?= $rating ?>%)">
                            <img src="<?= IMG_PATH ?>/stars_5.svg">
                        </div>
                    </div>
                </div>

                <div class="text">
                    <?= get_field('text'); ?>
                </div>
                <?php
                $second_cta = get_field('cta_button_2');
                if ($second_cta) {
                    $nofollow_2 = get_field('nofollow_2');
                    $sponsored_2 = get_field('sponsored_2'); ?>
                    <a href="<?= $second_cta['url'] ?>"
                       rel="<?= $nofollow_2 ? 'nofollow ' : '' ?><?= $sponsored_2 ? 'sponsored' : '' ?>"
                       target="<?= $second_cta['target'] ?>"
                       style="background-color:<?= get_field('button_color_2') ?>;"
                       class="btn"><?= $second_cta['title'] ?></a>
                <?php } ?>
            <?php } ?>
        </div>


    </div>
    <p class="description"><?= get_field('description'); ?></p>
</div>


