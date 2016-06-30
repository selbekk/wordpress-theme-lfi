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
    <article class="employee">
        <a class="employee-link" href="<?php the_permalink(); ?>">
            <div class="employee-image" data-src="<?php the_post_thumbnail_url('medium'); ?>"></div>
            <div class="employee-details">
                <h2 class="employee-name"><?php the_title(); ?></h2>
                <p class="employee-title"><?php echo get_the_excerpt(); ?></p>
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
        <a href="/kontakt" class="button mod-inverted">Send oss en mail!</a>
    </div>
</section>

<?php get_footer(); ?>
