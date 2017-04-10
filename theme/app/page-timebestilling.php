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
    $args = array(
        'post_type' => 'employee',
        'meta_key' => 'ordre-id'
    );
    $loop = new WP_Query( $args );
    while($loop->have_posts()): $loop->the_post();
?>
    <article class="employees-item">
        <a class="employees-item-link" href="<?php the_permalink(); ?>">
            <div class="employees-item-image" data-src="<?php the_post_thumbnail_url('large'); ?>"></div>
            <div class="employees-item-details">
                <h2 class="employees-item-name"><?php the_title(); ?></h2>
            </div>
        </a>
    </article>
<?php endwhile; ?>
</section>
<?php $loop->rewind_posts(); if (have_posts()) the_post(); ?>

<?php include 'part-call-to-action.php'; ?>

<?php get_footer(); ?>
