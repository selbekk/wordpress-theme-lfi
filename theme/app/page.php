<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

        <article>
            <?php if(has_post_thumbnail()) : ?>
                <div class="featured-image" data-src="<?php the_post_thumbnail_url('large'); ?>">
                    <h1 class="page-title wrapper"><?php the_title(); ?></h1>
                </div>
            <?php else : ?>
                <h1 class="page-title wrapper"><?php the_title(); ?></h1>
            <?php endif; ?>
            <div class="wrapper">
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>

<?php endwhile; ?>

<?php get_footer(); ?>
