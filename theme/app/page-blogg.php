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
<section class="blog wrapper">
<?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array('post_type' => 'post', 'paged' => $paged);
    $loop = new WP_Query( $args );
    while($loop->have_posts()): $loop->the_post();
?>
    <article class="blog-article">
        <header class="blog-article-header">
            <a href="<?php the_permalink(); ?>" class="blog-article-header-link">
                <?php if(has_post_thumbnail()) : ?>
                <div class="featured-image" data-src="<?php the_post_thumbnail_url('large'); ?>"></div>
                <?php endif; ?>
                <h2 class="blog-article-heading"><?php the_title(); ?></h2>
            </a>
        </header>
        <div class="blog-article-content cms-content">
            <?php has_excerpt() ? the_excerpt() : the_content() ?>
        </div>
        <?php if(has_excerpt()) : ?>
        <footer class="blog-article-footer">
            <a href="<?php the_permalink(); ?>">Les hele artikkelen</a>
        </footer>
        <?php endif; ?>
    </article>
    <?php endwhile; ?>
    <nav class="blog-navigation">
        <div class="blog-navigation-previous"><?php previous_posts_link('Eldre artikler'); ?></div>
        <div class="blog-navigation-next"><?php next_posts_link('Nyere artikler'); ?></div>
    </nav>
    <?php wp_reset_postdata(); ?>
</section>

<?php include 'part-call-to-action.php'; ?>

<?php get_footer(); ?>
