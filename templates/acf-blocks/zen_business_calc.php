<?php
$option = get_field('zenbusiness_calculator_group', 'option')['zenbusiness_calculator'];

?>

<div class="wp-block-calc wp-block-zenbusiness" id="<?= $block['id'] ?>">
    <h4><?= get_field('title'); ?></h4>
    <form>
        <p><label for="plan">Plan:</label></p>
        <div class="select">
        <select name="plan" id="plan" data-placeholder="Choose a plan">
            <option></option>
            <option value="<?= $option['starter_plan'] ?>,1">Starter Plan</option>
            <option value="<?= $option['pro_plan'] ?>,0">Pro Plan</option>
            <option value="<?= $option['premium_plan'] ?>,0">Premium Plan</option>
        </select>
        </div>
        <p><label for="la_carte ">A la Carte Service:</label></p>
        <div class="select">
        <select name="la_carte" id="la_carte" multiple="multiple" data-placeholder="Choose services">
            <option></option>
            <option value="<?= $option['expedited_filing'] ?>,1,expedited" class="expedited">Expedited filing</option>
            <option value="<?= $option['rush_filing'] ?>,1,rush" class="rush">Rush filing</option>
            <?php foreach ($option['other'] as $item){ ?>
            <option value="<?= $item['price'] ?>,<?= $item['payment']?1:0; ?>"><?= $item['service'] ?></option>
            <?php } ?>
        </select>
        </div>
        <p><label for="state ">State:</label></p>
        <div class="select">
        <select name="state" id="state" data-placeholder="Choose a state">
            <option></option>
            <?php foreach ($option['state_fees'] as $key => $item){ ?>
            <option value="<?= $item['state_fees_value'] ?>,<?= $item['expedited_filing_fees'] ?>" data-expedited="<?= $item['expedited_filing_fees'] ?>"><?= ucwords(str_replace('_',' ',$key)) ?></option>
            <?php } ?>
        </select>

        </div>
        <div class="note">
            Note: the Starter Plan the second year renews at $119
        </div>
        <div class="results">
            <div class="val">
                <p>State Fee</p>
                <p id="state_fee" class="res">$0</p>
            </div>
            <div class="val">
                <p>Annual Payment</p>
                <p id="annual" class="res">$0</p>
            </div>
            <div class="val">
                <p>One Time Payment</p>
                <p id="one_time" class="res">$0</p>
            </div>
            <div class="val total">
                <p>Total</p>
                <p id="total" class="res">$0</p>
            </div>
            <?php
            $button_link = get_field('button_link');
            if ($button_link){
                $nofollow = get_field('nofollow');
                $sponsored = get_field('sponsored');
                ?>
                <a href="<?= $button_link['url'] ?>" rel="<?= $nofollow ? 'nofollow ' : '' ?><?= $sponsored ? 'sponsored' : '' ?>" target="<?= $button_link['target'] ?>" class="btn" style="background: <?= get_field('button_background_color')?>"><?= $button_link['title'] ?></a>
            <?php } ?>
            <p class="calc-disclaimer"><?= $option['calculators_disclaimer'] ?> <?= get_field('disclaimer_text'); ?>.</p>
        </div>
    </form>
</div>