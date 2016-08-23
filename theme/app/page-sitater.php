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

<?php
    $args = array('post_type' => 'testimonial');
    $loop = new WP_Query( $args );
    while($loop->have_posts()): $loop->the_post();
?>
<section class="block-section">
    <div class="block-section-inner">
        <div class="wrapper">
            <blockquote class="testimonial">
                <?php the_content(); ?>
                <cite><?php the_title(); ?></cite>
            </blockquote>
        </div>
    </div>
</section>
<?php endwhile; ?>

<?php include 'part-call-to-action.php'; ?>

<?php get_footer(); ?>
