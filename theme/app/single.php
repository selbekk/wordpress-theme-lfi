<?php get_header(); ?>
<section class="blog wrapper">
<?php while(have_posts()) : the_post(); ?>
    <article class="blog-article">
        <header class="blog-article-header">
            <a href="<?php the_permalink(); ?>" class="blog-article-header-link">
                <?php if(has_post_thumbnail()) : ?>
                <div class="featured-image" data-src="<?php the_post_thumbnail_url('large'); ?>">
                    <h2 class="blog-article-heading center"><?php the_title(); ?></h2>
                </div>
                <?php else : ?>
                    <h2 class="blog-article-heading"><?php the_title(); ?></h2>
                <?php endif; ?>
            </a>
        </header>
        <div class="blog-article-content cms-content">
            <?php if(has_excerpt()) : ?>
                <p class="lead center"><?php echo get_the_excerpt(); ?></p>
            <?php endif; ?>
            <?php the_content(); ?>
        </div>
    </article>
    <?php endwhile; ?>
<?php get_footer(); ?>
