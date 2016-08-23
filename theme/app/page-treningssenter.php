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

<?php include 'part-call-to-action.php'; ?>

<section class="block-section mod-colored">
    <div class="block-section-inner">
        <div class="wrapper">
            <h2 class="hero"><?php the_field('price-title'); ?></h2>
            <p class="lead">
                <?php the_field('price-lead'); ?>
            </p>
            <?php the_field('price-content'); ?>
        </div>
    </div>
</section>

<section class="block-section">
    <div class="block-section-inner">
        <div class="wrapper">
            <h2 class="h1"><?php the_field('personal-trainer-title'); ?></h2>
            <p class="lead">
                <?php the_field('personal-trainer-lead'); ?>
            </p>
            <?php the_field('personal-trainer-content'); ?>
        </div>
    </div>
</section>

<section class="call-to-action">
    <div class="wrapper mod-narrow">
        <h2 class="hero">Meld deg inn</h2>
        <p class="lead">
            Å bli medlem på treningssenteret er enkelt som bare det. Det eneste
            du trenger er å fylle ut skjemaet under, så er du i gang!
        </p>
        <form class="form-fields mod-text-left js-signup-form"
            method="POST"
            action="<?php echo get_template_directory_uri() .'/send-mail.php'?>">
            <input type="hidden" name="type" value="signup" />
            <div class="form-fields js-form-fields">
                <div class="form-group">
                    <label class="form-label" for="name">Navn</label>
                    <input type="text" class="form-field mod-wide" name="name" id="name" />
                </div>
                <div class="form-group">
                    <label class="form-label" for="dob">Fødselsdato</label>
                    <input type="text" class="form-field mod-wide" name="dob" id="dob" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="address">Adresse</label>
                    <input type="text" class="form-field mod-wide" name="address" id="address" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="zip-city">Postnummer / poststed</label>
                    <input type="text" class="form-field mod-wide" name="zip-city" id="zip-city" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">E-post</label>
                    <input type="email" class="form-field mod-wide" name="email" id="email" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="phone">Telefonnummer</label>
                    <input type="tel" class="form-field mod-wide" name="phone" id="phone" required />
                </div>
                <div class="form-group">
                    <label class="form-label" for="extra-info">Utfyllende informasjon</label>
                    <p class="small-text">
                        Hvis du har spesielle behov eller om du vil referere til
                        en spesiell behandler kan du fortelle oss det her
                    </p>
                    <textarea class="form-field mod-textarea mod-wide" name="extra-info" id="extra-info"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="button js-submit">
                        Meld deg inn
                    </button>
                </div>
            </div>
            <div class="form-feedback js-form-feedback" data-email="<?php echo $email; ?>"></div>
        </form>
    </div>
</section>

<?php get_footer(); ?>
