<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <article>
        <?php if(has_post_thumbnail()) : ?>
            <div class="featured-image"
                data-src="<?php the_post_thumbnail_url('large'); ?>">
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
                        $src = wp_get_attachment_image_src(
                            get_post_thumbnail_id($page), 'small'
                        );
                    ?>

                    <div class="entrance" data-src="<?php echo $src[0]; ?>">
                        <a href="<?php echo get_permalink($page)?>"
                            class="entrance-link">
                            <h3 class="entrance-text">
                                <?php echo $page->post_title; ?>
                            </h3>
                        </a>
                    </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </article>

<?php endwhile; ?>

<section class="call-to-action">
    <div class="wrapper">
        <h2 class="call-to-action-heading">
            Er du ikke sikker på hva du trenger?
        </h2>
        <p class="lead">
            Å ha vondt et sted trenger ikke å bety at man vet hva slags
            behandling man trenger. Rådgivning om hva slags spesialist man
            trenger å besøke er alltid gratis!
        </p>
        <div class="button-group">
            <a href="/kontakt" class="button mod-inverted">
                Finn ut hva du trenger!
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
