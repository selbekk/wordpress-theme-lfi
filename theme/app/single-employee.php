<?php get_header(); ?>

<?php while(have_posts()) : the_post(); ?>
<div class="employee wrapper">
    <?php if(has_post_thumbnail()) : ?>
        <div class="employee-image" data-src="<?php the_post_thumbnail_url('large'); ?>"></div>
    <?php endif; ?>

    <h1 class="employee-name"><?php the_title(); ?></h1>
    <p class="lead employee-title"><?php echo get_the_excerpt(); ?></p>
    <div class="cms-content"><?php the_content(); ?></div>
    <?php
    $meta = get_post_meta(get_the_id());
    $email = isset($meta['e-mail']) ? $meta['e-mail'][0] : false;
    $phone = isset($meta['telefon']) ? $meta['telefon'][0] : false;
    $orderId = isset($meta['ordre-id']) ? $meta['ordre-id'][0] : false;
    ?>
    <?php echo $email ? '<a class="button" href="mailto:' . $email .'">Send meg en e-post</a>' : '' ?>
    <?php echo $phone ? '<a class="button" href="tel:' . $phone .'">Ring på '. $phone .'</a>' : '' ?>
    <?php echo $orderId ? '<a class="button" href="' . get_theme_mod( 'general_booking_base_url', '/' ) . 'p' . $orderId . '/services">Bestill time</a>' : '' ?>

</div>
<?php endwhile; ?>
<?php get_footer(); ?>
