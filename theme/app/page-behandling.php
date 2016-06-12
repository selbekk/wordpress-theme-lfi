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
                <div class="page-content cms-content">
                    <?php if (has_excerpt()): ?>
                        <p class="lead"><?php echo get_the_excerpt() ?></p>
                    <?php endif; ?>
                    <?php the_content(); ?>
                </div>

                <div class="treatment">
                    <div class="entrances">

                        <?php
                        $pages = get_pages(array( 'child_of' => get_the_id() ));
                        foreach ($pages as $page) :
                            $src = wp_get_attachment_image_src( get_post_thumbnail_id($page), 'small' )
                        ?>

                        <div class="entrance" data-src="<?php echo $src[0]; ?>">
                            <a href="<?php echo get_permalink($page)?>" class="entrance-link">
                                <h3 class="entrance-text"><?php echo $page->post_title; ?></h3>
                            </a>
                        </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </article>

<?php endwhile; ?>

<?php get_footer(); ?>
