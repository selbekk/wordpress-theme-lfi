<?php if (get_field('call-to-action-title')) : ?>
<section class="call-to-action">
    <div class="wrapper">
        <h2 class="call-to-action-heading">
            <?php the_field('call-to-action-title'); ?>
        </h2>
        <?php if (get_field('call-to-action-lead')) : ?>
            <p class="lead">
                <?php the_field('call-to-action-lead'); ?>
            </p>
        <?php endif; ?>
        <?php if (get_field('call-to-action-lead')) : ?>
            <div class="cms-content"><?php the_field('call-to-action-content'); ?></div>
        <?php endif; ?>
        <?php if (get_field('call-to-action-button-text') && get_field('call-to-action-link')) : ?>
        <div class="button-group">
            <a href="<?php the_field('call-to-action-link') ?>" class="button mod-inverted">
                <?php the_field('call-to-action-button-text'); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
