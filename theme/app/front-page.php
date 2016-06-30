<?php get_header(); ?>
<section class="image-section">
    <div class="image-section-background" data-src="<?php echo wp_get_attachment_image_src(get_theme_mod( 'front_page_image', 'Add your title here' ), 'large')[0]; ?>"></div>
    <div class="image-section-content">
        <div class="wrapper">
            <h1 class="hero">
                <?php echo get_theme_mod( 'front_page_heading', 'Add your title here' ); ?>
            </h1>
            <p class="lead">
                <?php echo get_theme_mod( 'front_page_lead', 'Add your lead here' ); ?>
            </p>
            <div class="button-group mod-centered">
                <a href="<?php echo get_theme_mod( 'company_booking_url', '/' ); ?>"
                    class="button mod-large">
                    Bestill time
                </a>
            </div>
        </div>
    </div>
</section>
<section class="block-section">
    <div class="block-section-inner">
        <div class="entrances">

            <div class="entrance" data-src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( 8 ), 'medium')[0]; ?>">
                <a href="<?php echo get_page_link(8); ?>" class="entrance-link">
                    <h3 class="entrance-text">Fysio&shy;terapi</h3>
                </a>
            </div>
            <div class="entrance" data-src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( 11 ), 'medium')[0]; ?>">
                <a href="<?php echo get_page_link(11); ?>" class="entrance-link">
                    <h3 class="entrance-text">Trenings&shy;senter</h3>
                </a>
            </div>
            <div class="entrance" data-src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( 14 ), 'medium')[0]; ?>">
                <a href="<?php echo get_page_link(14); ?>" class="entrance-link">
                    <h3 class="entrance-text">Personlig oppfølging</h3>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="block-section mod-colored">
    <div class="block-section-inner">
        <div class="wrapper">
            <h2><?php echo get_theme_mod( 'front_page_freetext_title', 'Add your title here' ); ?></h2>
            <p class="lead">
                <?php echo get_theme_mod( 'front_page_freetext_text', 'Add your text here' ); ?>
            </p>
            <div class="button-group">
                <a href="<?php echo get_permalink(get_theme_mod( 'front_page_freetext_cta_target' )); ?>" class="button">
                    <?php echo get_theme_mod( 'front_page_freetext_cta_text', 'Add button text' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="block-section">
    <div class="block-section-inner">
        <div class="wrapper">
            <?php
            rewind_posts();
            $args = array('post_type' => 'testimonial', 'orderby' => 'rand', 'posts_per_page' => 1);
            $loop = new WP_Query( $args );
            while($loop->have_posts()): $loop->the_post();
            ?>
            <blockquote class="testimonial">
                <?php echo wp_strip_all_tags(get_the_content()); ?>
                <cite><?php the_title(); ?></cite>
            </blockquote>
            <div class="button-group mod-centered">
                <a href="/sitater" class="button">Se hva folk sier om oss</a>
            </div>
            <?php endwhile ?>
        </div>
    </div>
</section>
<section class="block-section">
    <div class="embed-responsive embed-responsive-front-page js-map">
        <script>
            function initMap() {
                var mapDiv = document.querySelector('.js-map');
                var position = { lat: 59.9626819, lng: 11.0620008 };
                var map = new google.maps.Map(mapDiv, {
                    center: position,
                    zoom: 17,
                    scrollwheel: false,
                    mapTypeControl: false,
                    disableDefaultUI: true
                });
                var marker = new google.maps.Marker({
                    position: position,
                    map: map
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
            async defer></script>

    </div>
</section>
<?php get_footer(); ?>
