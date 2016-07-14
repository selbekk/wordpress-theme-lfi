<?php get_header(); ?>

<?php while(have_posts()) : the_post(); ?>
<?php if(has_post_thumbnail()) : ?>
    <div class="featured-image" data-src="<?php the_post_thumbnail_url('large'); ?>">
        <h1 class="page-title wrapper"><?php the_title(); ?></h1>
    </div>
<?php else : ?>
    <h1 class="page-title wrapper"><?php the_title(); ?></h1>
<?php endif; ?>
<div class="wrapper">
    <div class="page-content cms-content">
        <?php if (has_excerpt()): ?>
            <p class="lead"><?php echo get_the_excerpt() ?></p>
        <?php endif; ?>
        <?php the_content(); ?>
    </div>
</div>
<?php endwhile; ?>
<?php rewind_posts(); ?>
<section class="employees wrapper">
<?php
    $args = array('post_type' => 'employee');
    $loop = new WP_Query( $args );
    while($loop->have_posts()): $loop->the_post();
?>
    <article class="employees-item">
        <a class="employees-item--link" href="<?php the_permalink(); ?>">
            <div class="employees-item-image" data-src="<?php the_post_thumbnail_url('large'); ?>"></div>
            <div class="employees-item-details">
                <h2 class="employees-item-name"><?php the_title(); ?></h2>
                <p class="employees-item-title"><?php echo get_the_excerpt(); ?></p>
            </div>
        </a>
    </article>
<?php endwhile; ?>
</section>
<section class="call-to-action">
    <div class="wrapper">
        <h2 class="call-to-action-heading">Har du spørsmål?</h2>
        <p class="lead">
            Å finne riktig behandler trenger nemlig ikke være vanskelig.
        </p>
        <div class="button-group">
            <a href="/kontakt" class="button mod-inverted">Send oss en mail!</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
