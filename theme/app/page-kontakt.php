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
            </div>
        </article>

<?php endwhile; ?>
    <div class="wrapper">
        <aside class="contact-information sidebar">
            <?php
            $address = get_theme_mod( 'contact_address' );
            $telephone = get_theme_mod( 'contact_phone_number' );
            $email = get_theme_mod( 'contact_email' );
            ?>
            <h2>Lillestrøm Fysikalske Institutt</h2>
            <p><?php echo str_replace(PHP_EOL, '<br />', get_theme_mod( 'contact_address' )); ?></p>
            <p>
                <a href="tel:+47<?php echo str_replace(' ', '', $telephone); ?>"><?php echo $telephone; ?></a>
                <br/>
                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            </p>

        </aside>

        <form
            class="contact-form js-contact-form"
            method="POST"
            action="<?php echo get_template_directory_uri() .'/send-mail.php'?>"
        >
            <input type="hidden" name="type" value="contact" />
            <div class="form-fields js-form-fields">
                <div class="form-group">
                    <label class="form-label" for="name">Navn</label>
                    <input type="text" class="form-field" name="name" id="name" autofocus />
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">E-post</label>
                    <input type="email" class="form-field" name="email" id="email" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="message">Melding</label>
                    <textarea class="form-field mod-textarea" name="message" id="message"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="button js-submit">
                        Send
                    </button>
                </div>
            </div>
            <div class="form-feedback js-form-feedback" data-email="<?php echo $email; ?>"></div>
        </form>
    </div>
    <?php include 'part-call-to-action.php'; ?>

<?php get_footer(); ?>
