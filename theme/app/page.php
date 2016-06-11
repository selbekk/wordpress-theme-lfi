<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

        <article>
            <?php if(has_post_thumbnail()) : ?>
                <div class="featured-image" data-src="<?php the_post_thumbnail_url('large'); ?>">
                    <div class="wrapper">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </div>
                </div>
            <?php else : ?>
                <div class="wrapper">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </div>
            <?php endif; ?>
            <div class="wrapper">
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>

<?php endwhile; ?>

<?php get_footer(); ?>
